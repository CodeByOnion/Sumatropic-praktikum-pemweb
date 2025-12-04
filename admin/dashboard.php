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

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }

        /* Sidebar (Menu Kiri) */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 1px solid #34495e;
            padding-bottom: 10px;
        }

        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 15px;
            margin-bottom: 5px;
            border-radius: 4px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .sidebar .logout {
            margin-top: auto;
            background-color: #c0392b;
            text-align: center;
        }

        /* Main Content (Isi Kanan) */
        .content {
            flex: 1;
            /* Memenuhi sisa layar */
            padding: 30px;
            overflow-y: auto;
        }

        .welcome-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Grid Menu Cepat */
        .grid-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            color: #27ae60;
            margin-bottom: 10px;
        }

        .card a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <h2>SUMATROPIC <br><small style="font-size: 12px;">Admin Panel</small></h2>

        <a href="dashboard.php">Dashboard</a>
        <a href="kelola_flora_fauna.php">Data Flora & Fauna</a>
        <a href="kelola_berita.php">Data Berita</a>
        <a href="kelola_volunteer.php">Verifikasi Volunteer</a>

        <a href="../actions/logout.php" class="logout">Keluar</a>
    </aside>

    <main class="content">

        <div class="welcome-box">
            <h1>Selamat Datang, <?= htmlspecialchars($nama_admin); ?>! 👋</h1>
            <p>Ini adalah halaman kontrol utama website Sumatropic.</p>
        </div>

        <h3>Menu Cepat</h3>
        <br>

        <div class="grid-menu">
            <div class="card">
                <h3>Flora & Fauna</h3>
                <p>Tambah, Edit, Hapus data hewan dan tumbuhan.</p>
                <br>
                <a href="kelola_flora_fauna.php">Kelola Data →</a>
            </div>

            <div class="card">
                <h3>Berita</h3>
                <p>Update informasi berita lingkungan terkini.</p>
                <br>
                <a href="kelola_berita.php">Kelola Berita →</a>
            </div>

            <div class="card">
                <h3>Volunteer</h3>
                <p>Cek siapa saja yang mendaftar jadi relawan.</p>
                <br>
                <a href="kelola_volunteer.php">Cek Pendaftar →</a>
            </div>
        </div>

    </main>

</body>

</html>