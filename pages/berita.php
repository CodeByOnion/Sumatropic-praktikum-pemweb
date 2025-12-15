<?php
session_start();
require '../config/connect.php';

// --- LOGIC PENCARIAN & FILTER ---
$where = "";
$keyword = "";

// Cek Input Pencarian
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['cari']);
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
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/stylenavbar.css"> <link rel="stylesheet" href="../assets/css/styleberita.css">  <link rel="stylesheet" href="../assets/css/stylefooter.css">  </head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="../assets/image/Logo.png" alt="SUMATROPIC" class="logo-image">
                <span class="logo-text">SUMATROPIC</span>
            </div>

            <div class="nav-links">
                <a href="../index.php">Beranda</a>
                <a href="berita.php" class="active">Berita</a>
                <a href="flora.php">Flora</a>
                <a href="fauna.php">Fauna</a>
            </div>

            <div class="auth-buttons">
                <a href="../login_register.php" class="btn-login" style="text-decoration:none;">Masuk</a>
                <a href="../login_register.php" class="btn-register" style="text-decoration:none;">Daftar</a>
            </div>
        </div>
    </nav>

    <main>
        
        <header class="hero" style="background-image: url('../assets/image/berita.jpg');">
            <div class="hero-overlay"></div>
            <div class="container hero-content">
                <div class="hero-text">
                    <p class="subtitle">SPOTLIGHT ON</p>
                    <h1>SUMATRAN<br>NEWS</h1>
                    <p class="small-desc">Kabar terbaru dari hutan tropis</p>
                </div>
            </div>
        </header>

        <section class="page-header-strip">
            <div class="container">
                <div class="breadcrumbs">Beranda > Berita</div>
                <h2>Berita</h2>
                <p>Ikuti perkembangan terbaru dari garis depan konservasi, kisah penyelamatan satwa, dan inisiatif pemulihan habitat di seluruh Sumatera.</p>
            </div>
        </section>

        <div class="container main-content">

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
                                <img src="../uploads/berita/<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>">
                            </div>

                            <div class="news-details">
                                <span class="news-date"><?= date('d F Y', strtotime($row['tanggal_tayang'])); ?></span>

                                <h4><a href="<?= $row['url_sumber']; ?>" target="_blank"><?= $row['judul']; ?></a></h4>

                                <p class="news-excerpt">
                                    <?= $row['deskripsi_singkat']; ?>
                                </p>

                                <a href="<?= $row['url_sumber']; ?>" target="_blank" class="read-more">Baca Selengkapnya &rarr;</a>
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
        </div>
    </main>

    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-left">SUMATROPIC</div>
            <div class="footer-center">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="footer-right">Sumatropic 2025. All right reserved</div>
        </div>
    </footer>

</body>
</html>