<?php
session_start();
require '../config/connect.php';

/* ================= CEK ADMIN ================= */
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $q = mysqli_query($conn, "SELECT gambar FROM volunteers WHERE id='$id'");
    $data = mysqli_fetch_assoc($q);

    if ($data && $data['gambar']) {
        $path = "../uploads/volunteer/" . $data['gambar'];
        if (file_exists($path)) {
            unlink($path);
        }
    }

    mysqli_query($conn, "DELETE FROM volunteers WHERE id='$id'");
    echo "<script>alert('Data berhasil dihapus'); window.location='../admin/kelola_volunteer.php';</script>";
    exit;
}

/* ================= DEFAULT FORM ================= */
$id_volunteer = "";
$judul = "";
$sumber = "";
$deskripsi = "";
$gambar_lama = "";
$is_edit = false;

/* ================= MODE EDIT ================= */
if (isset($_GET['id'])) {
    $id_volunteer = $_GET['id'];
    $is_edit = true;

    $q = mysqli_query($conn, "SELECT * FROM volunteers WHERE id='$id_volunteer'");
    $data = mysqli_fetch_assoc($q);

    if ($data) {
        $judul = $data['judul'];
        $sumber = $data['url_sumber'];
        $deskripsi = $data['deskripsi_singkat'];
        $gambar_lama = $data['gambar'];
    }
}

/* ================= SIMPAN DATA ================= */
if (isset($_POST['simpan'])) {
    $judul_in = $_POST['judul'];
    $sumber_in = $_POST['url_sumber'];
    $deskripsi_in = $_POST['deskripsi_singkat'];

    $gambar_db = $gambar_lama;

    if ($_FILES['gambar']['name'] != "") {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $nama_baru = uniqid() . '.' . $ext;
        $tujuan = "../uploads/volunteer/" . $nama_baru;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $tujuan)) {
            $gambar_db = $nama_baru;

            if ($is_edit && $gambar_lama && file_exists("../uploads/volunteer/" . $gambar_lama)) {
                unlink("../uploads/volunteer/" . $gambar_lama);
            }
        }
    }

    if ($is_edit) {
        $query = "UPDATE volunteers SET
                    judul='$judul_in',
                    url_sumber='$sumber_in',
                    deskripsi_singkat='$deskripsi_in',
                    gambar='$gambar_db'
                  WHERE id='$id_volunteer'";
    } else {
        if ($_FILES['gambar']['name'] == "") {
            echo "<script>alert('Wajib upload gambar volunteer!');</script>";
            exit;
        }

        $query = "INSERT INTO volunteers (judul, url_sumber, deskripsi_singkat, gambar)
                  VALUES ('$judul_in', '$sumber_in', '$deskripsi_in', '$gambar_db')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil disimpan'); window.location='../admin/kelola_volunteer.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $is_edit ? 'Edit Volunteer' : 'Tambah Volunteer'; ?></title>
    <link rel="stylesheet" href="../assets/css/styledashboard.css">
    <style>
        .form-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .preview {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            padding: 5px;
            width: 100px;
        }
    </style>
</head>

<body>
    <?php require_once "../template/sidebar_admin.php"; ?>

    <div class="container">
        <a href="../admin/kelola_volunteer.php">← Kembali</a>
        <h2><?= $is_edit ? 'Edit Data Volunteer' : '+ Tambah Volunteer'; ?></h2>

        <div class="form-box">
            <form method="POST" enctype="multipart/form-data">

                <label>Judul Kegiatan</label>
                <input type="text" name="judul" value="<?= $judul ?>" required>

                <label>Link Sumber</label>
                <input type="url" name="url_sumber" value="<?= $sumber ?>" required>

                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi_singkat" rows="5" required><?= $deskripsi ?></textarea>

                <label>Gambar</label>
                <?php if ($is_edit && $gambar_lama): ?>
                    <br>
                    <img src="../uploads/volunteer/<?= $gambar_lama ?>" width="120">
                    <br><small>Kosongkan jika tidak mengganti gambar</small>
                <?php endif; ?>

                <input type="file" name="gambar" <?= $is_edit ? '' : 'required' ?>>

                <button type="submit" name="simpan" class="btn-green">
                    <?= $is_edit ? 'Update Data' : 'Simpan Data'; ?>
                </button>
            </form>
        </div>
    </div>
</body>

</html>