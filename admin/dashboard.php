<?php
session_start();
require '../config/connect.php';
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


function hitungData($conn, $tabel, $where = "")
{
    $query = "SELECT COUNT(*) as total FROM $tabel $where";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

function hitungDonasi($conn, $tabel, $kolom = "")
{
    $query = "SELECT SUM($kolom) as total_donasi FROM $tabel";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total_donasi'] ? $data['total_donasi'] : 0;
}

$jml_user = hitungData($conn, 'users', "WHERE role != 'admin'");
$jml_flora = hitungData($conn, 'flora');
$jml_fauna = hitungData($conn, 'fauna');
$jml_berita = hitungData($conn, 'news');

$jml_donatur = hitungData($conn, 'donate');
$total_donasi = hitungDonasi($conn, 'donate', 'jumlah_donasi');
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
    <?php require_once "../template/sidebar_admin.php"; ?>

    <main class="content">

        <div class="container">

            <div style="display: flex; justify-content: flex-end; align-items: right; margin-bottom: 20px;">
                <div style="font-weight: bold; color: #2e4a1c; font-size: 18px;">
                    <i class="fas fa-user-circle" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></i>
                    Admin
                </div>
            </div>

            <div class="stats-grid">

                <div class="stat-card">
                    <div class="icon-box red"><i class="fas fa-users"></i></div>
                    <div class="stat-info">
                        <h3>Member Terdaftar</h3>
                        <p><?= $jml_user; ?> User</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon-box blue"><i class="fas fa-newspaper"></i></div>
                    <div class="stat-info">
                        <h3>Berita/Artikel</h3>
                        <p><?= $jml_berita; ?> Post</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon-box green"><i class="fas fa-leaf"></i></div>
                    <div class="stat-info">
                        <h3>Data Flora</h3>
                        <p><?= $jml_flora; ?> Spesies</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon-box orange"><i class="fas fa-paw"></i></div>
                    <div class="stat-info">
                        <h3>Data Fauna</h3>
                        <p><?= $jml_fauna; ?> Spesies</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon-box purple"><i class="fas fa-hand-holding-heart"></i></div>
                    <div class="stat-info">
                        <h3>Total Donatur</h3>
                        <p><?= $jml_donatur; ?> Orang</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon-box gold"><i class="fas fa-wallet"></i></div>
                    <div class="stat-info">
                        <h3>Dana Terkumpul</h3>
                        <p>Rp <?= number_format($total_donasi, 0, ',', '.'); ?></p>
                    </div>
                </div>

            </div>

        </div>

</body>


</html>