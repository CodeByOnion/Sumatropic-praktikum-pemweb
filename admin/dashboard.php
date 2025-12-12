<?php
session_start();

// --- 1. LOGIKA KEAMANAN ---
// Cek apakah user sudah login?
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: ../login_register.php?pesan=belum_login");
    exit;
}

// Cek apakah user adalah ADMIN?
if ($_SESSION['role'] != 'admin') {
    echo "<h1>Akses Ditolak!</h1>";
    echo "<p>Anda bukan Admin. <a href='../index.php'>Kembali ke Halaman Utama</a></p>";
    exit; // Stop script agar HTML di bawah tidak dimuat
}

// Ambil nama user dari session untuk menyapa
$nama_admin = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sumatropic</title>

    <link rel="stylesheet" href="../assets/css/styledashboard.css">
</head>

<body>
    <aside class="sidebar">
        <h2>SUMATROPIC <br><small style="font-size: 12px;">Admin Panel</small></h2>
        <a href="../admin/dashboard.php" style="background-color: #34495e;">Dashboard</a>
        <a href="../admin/kelola_flora.php">Data Flora</a>
        <a href="../admin/kelola_fauna.php">Data Fauna</a>
        <a href="../admin/kelola_berita.php">Data Berita</a>
        <a href="../admin/kelola_volunteer.php">Verifikasi Volunteer</a>
        <a href="../index.php">Lihat Website</a>


        <a href="../actions/logout.php" class="logout">Keluar</a>
    </aside>

    <main class="content">
</body>

</html>