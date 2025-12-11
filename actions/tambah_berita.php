<?php
session_start();
require '../config/connect.php';

// 1. Cek Keamanan
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

// --- LOGIC 1: HAPUS DATA (Jika ada parameter ?hapus=ID) ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Hapus gambar lama
    $q = mysqli_query($conn, "SELECT gambar FROM news WHERE id='$id'");
    $data = mysqli_fetch_assoc($q);
    $path = "../uploads/berita/" . $data['gambar'];

    if (file_exists($path) && $data['gambar']) {
        unlink($path);
    }

    // Hapus database
    mysqli_query($conn, "DELETE FROM news WHERE id='$id'");

    echo "<script>alert('Data Berhasil Dihapus!'); window.location='../admin/kelola_berita.php';</script>";
    exit; // Stop script
}

// --- LOGIC 2: SIAPKAN VARIABEL FORM (Default Kosong) ---
$id_berita = "";
$judul = "";
$tanggal = date('Y-m-d');
$sumber = "";
$deskripsi = "";
$gambar_lama = "";
$is_edit = false;

// --- LOGIC 3: AMBIL DATA LAMA (Jika Mode Edit ?id=ID) ---
if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];
    $is_edit = true; // Tandai ini mode edit

    $query = mysqli_query($conn, "SELECT * FROM news WHERE id='$id_berita'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $judul = $data['judul'];
        $tanggal = $data['tanggal_tayang'];
        $sumber = $data['url_sumber'];
        $deskripsi = $data['deskripsi_singkat'];
        $gambar_lama = $data['gambar'];
    }
}

// --- LOGIC 4: PROSES SIMPAN (Tambah / Update) ---
if (isset($_POST['simpan'])) {
    $judul_in = $_POST['judul'];
    $tanggal_in = $_POST['tanggal_tayang'];
    $sumber_in = $_POST['url_sumber'];
    $deskripsi_in = $_POST['deskripsi_singkat'];

    // Setup Gambar
    $gambar_db = $gambar_lama; // Default pakai gambar lama

    // Cek apakah upload gambar baru?
    if ($_FILES['gambar']['name'] != "") {
        $nama_file = $_FILES['gambar']['name'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
        $nama_baru = uniqid() . '.' . $ext;
        $tujuan = "../uploads/berita/" . $nama_baru;

        // Pindahkan file baru
        if (move_uploaded_file($tmp_file, $tujuan)) {
            $gambar_db = $nama_baru; // Pakai nama baru

            // Hapus gambar lama jika mode edit
            if ($is_edit && file_exists("../uploads/berita/" . $gambar_lama)) {
                unlink("../uploads/berita/" . $gambar_lama);
            }
        }
    }

    if ($is_edit) {
        // --- QUERY UPDATE ---
        $query = "UPDATE news SET 
                  judul='$judul_in', 
                  tanggal_tayang='$tanggal_in', 
                  url_sumber='$sumber_in', 
                  deskripsi_singkat='$deskripsi_in', 
                  gambar='$gambar_db' 
                  WHERE id='$id_berita'";
    } else {
        // --- QUERY INSERT ---
        // Kalau tambah baru tapi ga ada gambar, tolak
        if ($_FILES['gambar']['name'] == "") {
            echo "<script>alert('Wajib upload gambar untuk berita baru!');</script>";
            exit;
        }
        $query = "INSERT INTO news (judul, tanggal_tayang, url_sumber, deskripsi_singkat, gambar) 
                  VALUES ('$judul_in', '$tanggal_in', '$sumber_in', '$deskripsi_in', '$gambar_db')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='../admin/kelola_berita.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $is_edit ? 'Edit Berita' : 'Tambah Berita'; ?></title>
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
    <aside class="sidebar">
        <h2>SUMATROPIC <br><small style="font-size: 12px;">Admin Panel</small></h2>
        <a href="../admin/dashboard.php">Dashboard</a>
        <a href="../admin/kelola_flora.php">Data Flora</a>
        <a href="../admin/kelola_fauna.php">Data Fauna</a>
        <a href="../admin/kelola_berita.php" style="background-color: #34495e;">Data Berita</a>
        <a href="../admin/kelola_volunteer.php">Verifikasi Volunteer</a>

        <a href="logout.php" class="logout">Keluar</a>
    </aside>

    <div class="container">
        <a href="../admin/kelola_berita.php">← Kembali ke Daftar Berita</a>
        <h2><?= $is_edit ? 'Edit Data Berita' : '+ Tambah Berita Baru'; ?></h2>

        <div class="form-box">
            <form action="" method="POST" enctype="multipart/form-data">

                <label>Judul Berita</label>
                <input type="text" name="judul" value="<?= $judul ?>" required placeholder="Contoh: Gajah Sumatra...">

                <label>Tanggal Tayang</label>
                <input type="date" name="tanggal_tayang" value="<?= $tanggal ?>" required>

                <label>Link Sumber (URL)</label>
                <input type="url" name="url_sumber" value="<?= $sumber ?>" required placeholder="https://...">

                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi_singkat" rows="5" required><?= $deskripsi ?></textarea>

                <label>Gambar Cover</label>
                <?php if ($is_edit && $gambar_lama): ?>
                    <br>
                    <img src="../uploads/berita/<?= $gambar_lama ?>" class="preview">
                    <br><small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
                <?php endif; ?>

                <input type="file" name="gambar" <?= $is_edit ? '' : 'required' ?>>

                <button type="submit" name="simpan" class="btn-green" style="width: 100%; padding: 12px; border:none; cursor:pointer;">
                    <?= $is_edit ? 'Update Data' : 'Simpan Data'; ?>
                </button>

            </form>
        </div>
    </div>

</body>

</html>