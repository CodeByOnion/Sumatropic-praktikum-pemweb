<?php
// PERBAIKAN: session_start() WAJIB di paling atas sebelum HTML apapun
session_start();

require 'config/connect.php';

// 1. Ambil Flora & Fauna
$query_bio = "SELECT * FROM florafauna ORDER BY created_at DESC LIMIT 3";
$result_bio = mysqli_query($conn, $query_bio);

// 2. Ambil Berita
$query_news = "SELECT * FROM news ORDER BY created_at DESC LIMIT 3";
$result_news = mysqli_query($conn, $query_news);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Keindahan Sumatera</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav>
        <h1>SUMATROPIC</h1>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="pages/berita.php">Berita</a></li>

            <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "login"): ?>
                <li><a href="admin/dashboard.php">Dashboard (<?= $_SESSION['username']; ?>)</a></li>
                <li><a href="actions/logout.php" style="color: red;">Logout</a></li>
            <?php else: ?>
                <li><a href="login_register.php">Masuk</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <section>
        <h2>Jelajahi Flora & Fauna</h2>
        <div style="display: flex; gap: 20px;">
            <?php while ($row = mysqli_fetch_assoc($result_bio)): ?>
                <div class="card">
                    <img src="uploads/<?= $row['kategori']; ?>/<?= $row['gambar']; ?>" width="100">
                    <h3><?= $row['nama_lokal']; ?></h3>
                    <p><i><?= $row['nama_ilmiah']; ?></i></p>
                    <span class="badge"><?= $row['status_konservasi']; ?></span>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section>
        <h2>Berita Terkini</h2>
        <div style="display: flex; gap: 20px;">
            <?php while ($news = mysqli_fetch_assoc($result_news)): ?>
                <div class="news-card">
                    <img src="uploads/berita/<?= $news['gambar']; ?>" width="100">
                    <small><?= date('d M Y', strtotime($news['tanggal_tayang'])); ?></small>
                    <h3><?= $news['judul']; ?></h3>
                    <p><?= $news['deskripsi_singkat']; ?></p>
                    <a href="<?= $news['url_sumber']; ?>" target="_blank">Baca Selengkapnya &rarr;</a>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

</body>

</html>