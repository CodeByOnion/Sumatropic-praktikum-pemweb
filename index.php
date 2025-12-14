<?php
session_start();
require 'config/connect.php';

// 1. Ambil 1 Fauna Terbaru untuk "Did You Know"
$query_spotlight = "SELECT * FROM fauna ORDER BY created_at DESC LIMIT 1";
$result_spotlight = mysqli_query($conn, $query_spotlight);
$spotlight = mysqli_fetch_assoc($result_spotlight);

// 2. Ambil 4 Berita Terbaru
$query_news = "SELECT * FROM news ORDER BY created_at DESC LIMIT 4";
$result_news = mysqli_query($conn, $query_news);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Hutan Sumatra</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display&family=Inter:wght@300;400;600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/stylenavbar.css"> <link rel="stylesheet" href="assets/css/style.css">       </head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="assets/image/Logo.png" alt="SUMATROPIC" class="logo-image">
                <span class="logo-text">SUMATROPIC</span>
            </div>

            <div class="nav-links">
                <a href="index.php" class="active">Beranda</a>
                <a href="pages/berita.php">Berita</a>
                <a href="#">Flora</a>
                <a href="#">Fauna</a>
            </div>

            <div class="auth-buttons">
                <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "login"): ?>
                    
                    <a href="admin/dashboard.php" class="btn-login" style="text-decoration:none;">Dashboard</a>
                    <a href="actions/logout.php" class="btn-register" style="text-decoration:none;">Logout</a>

                <?php else: ?>

                    <a href="login_register.php" class="btn-login" style="text-decoration:none;">Masuk</a>
                    <a href="login_register.php" class="btn-register" style="text-decoration:none;">Daftar</a>

                <?php endif; ?>
            </div>
        </div>
    </nav>

    <section class="hero" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('assets/image/bg.jpeg');">
        <div class="hero-content">
            <h1>SUMATROPIC</h1>
            <p>Dari lembah berkabut hingga punggung harimau, setiap jengkal hutan ini menyimpan cerita.</p>
            <div class="hero-buttons">
                <button class="btn btn-outline-white">JELAJAHI FLORA</button>
                <button class="btn btn-outline-white">KENALI FAUNA</button>
            </div>
        </div>
        <div class="hero-location">← Pulau Sumatra, Indonesia →</div>
    </section>

    <section class="intro">
        <h2>Introducing Sumatra and its beauty</h2>
        <div class="subtitle">Hutan Sumatra, Warisan yang Harus Dijaga</div>

        <div class="map-container">
            <div class="map-img">
                <img src="assets/image/sumatra.png" alt="Peta Sumatra">
            </div>
            <div class="intro-text">
                <p>Hutan hujan tropis Sumatra adalah salah satu paru-paru dunia yang tersisa. Rumah bagi ribuan spesies flora dan fauna yang tidak dapat ditemukan di tempat lain di bumi.</p>
                <br>
                <p>Mari bersama menjaga kelestarian alam ini demi masa depan yang lebih hijau dan berkelanjutan.</p>
            </div>
        </div>
    </section>

    <section class="did-you-know">
        <div class="dyk-header">Did You Know?</div>
        <div class="spotlight-container">
            <div class="spotlight-card">
                <h3>
                    <?= $spotlight ? $spotlight['nama_lokal'] : 'Data Kosong'; ?>
                </h3>

                <p>
                    <?= $spotlight ? substr($spotlight['deskripsi'], 0, 150) . '...' : 'Belum ada data.'; ?>
                </p>

                <button class="btn btn-outline-white">Selengkapnya</button>
            </div>
            <?php
            $gambar_spotlight = $spotlight ? "uploads/fauna/" . $spotlight['gambar'] : "assets/image/funfact.jpeg";
            ?>
            <img src="<?= $gambar_spotlight; ?>" class="spotlight-image" alt="Spotlight Image">
        </div>
    </section>

    <div class="section-separator">
        <h2>Ada apa aja di Hutan Tropis Sumatra?</h2>
        <p>Dukungan Anda membantu kami melindungi spesies yang terancam punah.</p>
    </div>

    <section class="features">
        <div class="feature-item">
            <div class="feature-text">
                <h3>Flora endemik</h3>
                <p>Jelajahi berbagai keindahan flora di Hutan tropis Sumatra</p>
                <button class="btn btn-dark">JELAJAHI FLORA</button>
            </div>
            <div class="feature-img">
                <img src="assets/image/rafflesia.jpg" alt="Rafflesia">
            </div>
        </div>

        <div class="feature-item reverse">
            <div class="feature-text">
                <h3>Fauna endemik</h3>
                <p>Kenali berbagai keunikan fauna di Hutan tropis Sumatra</p>
                <button class="btn btn-dark">KENALI FAUNA</button>
            </div>
            <div class="feature-img">
                <img src="assets/image/beo.jpg" alt="Burung Sumatra">
            </div>
        </div>
    </section>

    <section class="involvement">
        <h2>Nature Needs You</h2>
        <p>Banyak cara untuk berkontribusi menjaga kelestarian alam.</p>

        <div class="involvement-grid">
            <div class="involve-card">
                <img src="assets/image/monyet.jpg" alt="Volunteer">
                <h3>Volunteer</h3>
            </div>
            <div class="involve-card">
                <img src="assets/image/monyet.jpg" alt="Donasi">
                <h3>Donasi</h3>
            </div>
            <div class="involve-card">
                <img src="assets/image/monyet.jpg" alt="Adopsi">
                <h3>Adopsi</h3>
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="news-header">
            <div class="news-line"></div>
            <h2>Berita Terkini</h2>
        </div>

        <div class="news-grid">
            <?php while ($news = mysqli_fetch_assoc($result_news)): ?>
                <a href="<?= $news['url_sumber']; ?>" target="_blank" style="text-decoration: none; color: inherit; display: block;">
                    <div class="news-card">
                        <img src="uploads/berita/<?= $news['gambar']; ?>" alt="News Image">
                        <div class="news-content">
                            <div class="news-date">
                                <?= date('d F Y', strtotime($news['tanggal_tayang'])); ?>
                            </div>
                            <div class="news-title">
                                <?= $news['judul']; ?>
                            </div>
                            <div class="news-desc">
                                <?= $news['deskripsi_singkat']; ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
            
            <?php if (mysqli_num_rows($result_news) == 0): ?>
                <p style="text-align: center; width: 100%;">Belum ada berita terbaru.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <div class="footer-left">Sumatropic</div>
        <div class="social-icons">
            <span>IG</span>
            <span>TW</span>
            <span>FB</span>
            <span>YT</span>
        </div>
        <div class="footer-right">Sumatropic 2025. All right reserved</div>
    </footer>

</body>
</html>