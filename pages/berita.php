<?php
session_start();
require '../config/connect.php';

// --- LOGIC PENCARIAN & FILTER (VERSI AMAN) ---
$where = "";
$keyword = "";

// 1. Cek apakah ada input pencarian?
if (isset($_GET['cari'])) {
    // SECURITY: Sanitize input untuk mencegah SQL Injection
    $keyword = mysqli_real_escape_string($conn, $_GET['cari']);

    // Baru dimasukkan ke query
    $where = "WHERE judul LIKE '%$keyword%'";
}

// Logic Sortir
$order = "ORDER BY tanggal_tayang DESC";
if (isset($_GET['sort'])) {
    if ($_GET['sort'] == 'terlama') {
        $order = "ORDER BY tanggal_tayang ASC";
    }
}

// Eksekusi Query
$query = "SELECT * FROM news $where $order";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/styleberita.css">
    <link rel="stylesheet" href="../assets/css/stylenavbar.css">
    <link rel="stylesheet" href="../assets/css/stylefooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php require_once "../template/navbar.php"; ?>

    <header class="hero" style="background-image :url('../assets/image/berita.jpg');'>
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-text">
                <p class="subtitle">SPOTLIGHT ON</p>
                <h1>SUMATRAN<br>NEWS</h1>
                <p class="small-desc">Kabar terbaru dari hutan tropis</p>
            </div>
            <div class="breadcrumbs">
                <span>Beranda > Berita</span>
            </div>
        </div>
    </header>

    <section class="page-header-strip">
        <div class="container">
            <h2>Berita</h2>
            <p>Berita konservasi dan pembaruan penting dari proyek Sumatropic.</p>
        </div>
    </section>

    <main class="container main-content">

        <div class="section-header">
            <h3 class="title-with-lines">Berita Terkini</h3>
        </div>

        <form class="filters" method="GET" action="">
            <input type="text" name="cari" placeholder="Cari judul...." class="search-input" value="<?= htmlspecialchars($keyword) ?>">
            <div class="sort-wrapper">
                <select class="sort-select" name="sort" onchange="this.form.submit()">
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama" <?= (isset($_GET['sort']) && $_GET['sort'] == 'terlama') ? 'selected' : '' ?>>Terlama</option>
                </select>
            </div>
        </form>

        <div class="news-list">

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <article class="news-card">
                        <div class="news-image">
                            <img src="../uploads/berita/<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>" style="object-fit: cover; height: 100%;">
                        </div>

                        <div class="news-details">
                            <span class="news-date"><?= date('d F Y', strtotime($row['tanggal_tayang'])); ?></span>

                            <h4><a href="<?= $row['url_sumber']; ?>" target="_blank"><?= $row['judul']; ?></a></h4>

                            <p class="news-excerpt">
                                <?= $row['deskripsi_singkat']; ?>
                            </p>

                            <a href="<?= $row['url_sumber']; ?>" target="_blank" style="color: #27ae60; font-weight: bold; margin-top: 10px; display: inline-block;">Baca Selengkapnya &rarr;</a>
                        </div>
                    </article>

                <?php endwhile; ?>
            <?php else: ?>
                <p style="text-align: center; padding: 50px; width: 100%;">Belum ada berita yang ditemukan.</p>
            <?php endif; ?>
        </div>

        <div class="pagination">
            <a href="#" class="arrow"><i class="fas fa-chevron-left"></i></a>
            <span class="dot active"></span>
            <span class="dot"></span>
            <a href="#" class="arrow"><i class="fas fa-chevron-right"></i></a>
            <a href="#" class="view-all">Semua Berita <i class="fas fa-chevron-right"></i></a>
        </div>
    </main>

    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-left">
                <h3>Sumatropic</h3>
            </div>
            <div class="footer-center">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="footer-right">
                <p>Sumatropic 2025. All right reserved</p>
            </div>
        </div>
    </footer>

</body>

</html>