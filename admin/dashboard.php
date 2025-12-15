<?php
session_start();
require '../config/connect.php';

// --- LOGIKA KEAMANAN ---
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: ../login_register.php?pesan=belum_login");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    echo "<h1>Akses Ditolak!</h1>";
    echo "<p>Anda bukan Admin. <a href='../index.php'>Kembali ke Halaman Utama</a></p>";
    exit;
}

$nama_admin = $_SESSION['username'];

// FUNGSI HITUNG
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

// EKSEKUSI DATA
$jml_user     = hitungData($conn, 'users', "WHERE role != 'admin'");
$jml_flora    = hitungData($conn, 'flora');
$jml_fauna    = hitungData($conn, 'fauna');
$jml_berita   = hitungData($conn, 'news');
$jml_donatur  = hitungData($conn, 'donate');
$total_donasi = hitungDonasi($conn, 'donate', 'jumlah_donasi');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sumatropic</title>
    <link rel="stylesheet" href="../assets/css/styledashboard.css">
    <link rel="stylesheet" href="../assets/css/styledashboard2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php require_once "../template/sidebar_admin.php"; ?>

    <main class="content" style="flex: 1; overflow-y: auto;">
        <div class="container">

            <div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
                <div style="font-weight: bold; color: #2e4a1c; font-size: 18px;">
                    <i class="fas fa-user-circle" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></i>
                    Admin
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <h2 style="color: #2e4a1c; margin: 0;">Dashboard Overview</h2>
                <p style="color: #666; margin-top: 5px;">Ringkasan data Sumatropic hari ini.</p>
            </div>

            <div class="dashboard-grid">

                <div class="stat-card-theme">
                    <div class="card-content">
                        <h3>Member</h3>
                        <div class="card-number"><?= $jml_user; ?></div>
                        <p class="card-desc">User Terdaftar</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>

                <div class="stat-card-theme">
                    <div class="card-content">
                        <h3>Berita</h3>
                        <div class="card-number"><?= $jml_berita; ?></div>
                        <p class="card-desc">Artikel/Post</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                </div>

                <div class="stat-card-theme">
                    <div class="card-content">
                        <h3>Flora</h3>
                        <div class="card-number"><?= $jml_flora; ?></div>
                        <p class="card-desc">Total Spesies</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                </div>

                <div class="stat-card-theme">
                    <div class="card-content">
                        <h3>Fauna</h3>
                        <div class="card-number"><?= $jml_fauna; ?></div>
                        <p class="card-desc">Total Spesies</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-paw"></i>
                    </div>
                </div>

                <div class="stat-card-theme">
                    <div class="card-content">
                        <h3>Donatur</h3>
                        <div class="card-number"><?= $jml_donatur; ?></div>
                        <p class="card-desc">Total Transaksi</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                </div>

                <div class="stat-card-theme">
                    <div class="card-content">
                        <h3>Dana Terkumpul</h3>
                        <div class="card-number highlight-money">
                            Rp <?= number_format($total_donasi, 0, ',', '.'); ?>
                        </div>
                        <p class="card-desc">Total Rupiah</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>

</html>