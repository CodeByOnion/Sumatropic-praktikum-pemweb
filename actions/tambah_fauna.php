<?php
session_start();
require '../config/connect.php';

// 1. Cek Keamanan
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

// --- LOGIC 1: HAPUS DATA ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Ambil gambar lama untuk dihapus
    $q = mysqli_query($conn, "SELECT gambar FROM fauna WHERE id='$id'");
    $data = mysqli_fetch_assoc($q);

    // Path gambar (Mundur satu folder karena file ini ada di actions/)
    $path = "../uploads/fauna/" . $data['gambar'];

    if (file_exists($path) && $data['gambar']) {
        unlink($path);
    }

    // Hapus data DB
    mysqli_query($conn, "DELETE FROM fauna WHERE id='$id'");

    // Redirect KEMBALI KE ADMIN
    echo "<script>alert('Data Fauna Dihapus!'); window.location='../admin/kelola_fauna.php';</script>";
    exit;
}

// --- VARIABEL DEFAULT (Agar form tidak error saat kosong) ---
$id_fauna = "";
$nama_lokal = "";
$nama_ilmiah = "";
$asal = "";
$status = "";
$deskripsi = "";
$gambar_lama = "";
$is_edit = false;

// --- LOGIC 2: AMBIL DATA LAMA (Mode Edit) ---
if (isset($_GET['id'])) {
    $id_fauna = $_GET['id'];
    $is_edit = true;

    $query = mysqli_query($conn, "SELECT * FROM fauna WHERE id='$id_fauna'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $nama_lokal = $data['nama_lokal'];
        $nama_ilmiah = $data['nama_ilmiah'];
        $asal = $data['asal_provinsi'];
        $status = $data['status_konservasi'];
        $deskripsi = $data['deskripsi'];
        $gambar_lama = $data['gambar'];
    }
}

// --- LOGIC 3: PROSES SIMPAN ---
if (isset($_POST['simpan'])) {
    $nama_lokal_in = $_POST['nama_lokal'];
    $nama_ilmiah_in = $_POST['nama_ilmiah'];
    $asal_in = $_POST['asal_provinsi'];
    $status_in = $_POST['status_konservasi'];
    $deskripsi_in = $_POST['deskripsi'];

    $gambar_db = $gambar_lama;

    // Cek Upload Gambar
    if ($_FILES['gambar']['name'] != "") {
        $nama_file = $_FILES['gambar']['name'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
        $nama_baru = uniqid() . '.' . $ext;
        $tujuan = "../uploads/fauna/" . $nama_baru;

        // Pastikan folder ada
        if (!is_dir("../uploads/fauna/")) {
            mkdir("../uploads/fauna/", 0777, true);
        }

        if (move_uploaded_file($tmp_file, $tujuan)) {
            $gambar_db = $nama_baru;

            // Hapus gambar lama jika mode edit
            if ($is_edit && file_exists("../uploads/fauna/" . $gambar_lama)) {
                unlink("../uploads/fauna/" . $gambar_lama);
            }
        }
    }

    if ($is_edit) {
        // UPDATE DATA
        $query = "UPDATE fauna SET 
                  nama_lokal='$nama_lokal_in', 
                  nama_ilmiah='$nama_ilmiah_in', 
                  asal_provinsi='$asal_in', 
                  status_konservasi='$status_in', 
                  deskripsi='$deskripsi_in', 
                  gambar='$gambar_db' 
                  WHERE id='$id_fauna'";
    } else {
        // INSERT DATA BARU
        if ($_FILES['gambar']['name'] == "") {
            echo "<script>alert('Wajib upload gambar!');</script>";
            exit;
        }
        $query = "INSERT INTO fauna (nama_lokal, nama_ilmiah, asal_provinsi, status_konservasi, deskripsi, gambar) 
                  VALUES ('$nama_lokal_in', '$nama_ilmiah_in', '$asal_in', '$status_in', '$deskripsi_in', '$gambar_db')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='../admin/kelola_fauna.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $is_edit ? 'Edit' : 'Tambah'; ?> Fauna</title>
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
        <a href="../admin/kelola_fauna.php">← Kembali ke Daftar Fauna</a>
        <h2><?= $is_edit ? 'Edit Data Fauna' : '+ Tambah Fauna Baru'; ?></h2>

        <div class="form-box">
            <form action="" method="POST" enctype="multipart/form-data">

                <label>Nama Lokal</label>
                <input type="text" name="nama_lokal" value="<?= $nama_lokal ?>" required placeholder="Contoh: Harimau Sumatra">

                <label>Nama Ilmiah</label>
                <input type="text" name="nama_ilmiah" value="<?= $nama_ilmiah ?>" placeholder="Contoh: Panthera tigris sumatrae">

                <label>Asal Provinsi / Persebaran</label>
                <input type="text" name="asal_provinsi" value="<?= $asal ?>" required placeholder="Contoh: Aceh, Sumatera Utara">

                <label>Status Konservasi</label>
                <select name="status_konservasi" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Tumbuhan dan Satwa Tidak Dilindungi" <?= ($status == 'Tidak Dilindungi') ? 'selected' : '' ?>>Tidak Dilindungi</option>
                    <option value="Tumbuhan dan Satwa Dilindungi" <?= ($status == 'Dilindungi') ? 'selected' : '' ?>>Dilindungi</option>
                    <option value="Tumbuhan dan Satwa Punah" <?= ($status == 'Punah') ? 'selected' : '' ?>>Punah</option>
                </select>

                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="5" required placeholder="Jelaskan ciri-ciri dan habitatnya..."><?= $deskripsi ?></textarea>

                <label>Gambar Fauna</label>
                <?php if ($is_edit && $gambar_lama): ?>
                    <br><img src="../uploads/fauna/<?= $gambar_lama ?>" class="preview">
                    <br><small>Biarkan kosong jika tidak ganti gambar.</small>
                <?php endif; ?>

                <input type="file" name="gambar" <?= $is_edit ? '' : 'required' ?>>

                <button type="submit" name="simpan" class="btn-green" style="width: 100%; padding: 12px; border:none; cursor:pointer; background-color:#27ae60; color:white; border-radius:4px;">
                    <?= $is_edit ? 'Update Data' : 'Simpan Data'; ?>
                </button>
            </form>
        </div>
    </div>

</body>

</html>