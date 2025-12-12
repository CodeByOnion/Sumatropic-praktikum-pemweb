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
    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav>
        <div class="logo"><a href="index.php" style="text-decoration:none; color:inherit;">SUMATROPIC</a></div>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="pages/berita.php">Berita</a></li>
            <li><a href="#">Flora</a></li>
            <li><a href="#">Fauna</a></li>
        </ul>
        <div class="auth-buttons">
            <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "login"): ?>

                <?php if ($_SESSION['role'] == 'admin'): ?>
                    <!-- Tombol Admin Member -->
                    <a href="admin/dashboard.php" class="btn btn-dark"
                        style="margin-right:10px;">Dashboard</a>
                <?php endif; ?>
                <a href="actions/logout.php" class="btn btn-orange"
                    style="text-decoration:none; display:inline-block; text-align:center;">Logout</a>

            <?php else: ?>

                <a href="login_register.php" class="btn btn-outline"
                    style="text-decoration:none; display:inline-block; text-align:center;">Masuk</a>
                <a href="login_register.php" class="btn btn-orange"
                    style="text-decoration:none; display:inline-block; text-align:center;">Daftar</a>

            <?php endif; ?>
        </div>
    </nav>

    <section class="hero"
        style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.3), rgba(0,0,0,0.4)), url('assets/image/bg.jpeg');">
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</p>
                <br>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit.</p>
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
            // Cek gambar, jika tidak ada pakai gambar default
            $gambar_spotlight = $spotlight ? "uploads/fauna/" . $spotlight['gambar'] : "assets/image/funfact.jpeg";
            ?>
            <img src="<?= $gambar_spotlight; ?>" class="spotlight-image" alt="Spotlight Image"
                style="object-fit: cover;">
        </div>
    </section>

    <div class="section-separator">
        <h2>Ada apa aja di Hutan Tropis Sumatra?</h2>
        <p>Your support helps us protect endangered species and preserve their habitats for future generations.</p>
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
        <p>There are so many ways you can get involved and do your part to support a world where people and nature
            thrive together.</p>

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

                <a href="<?= $news['url_sumber']; ?>" target="_blank"
                    style="text-decoration: none; color: inherit; display: block;">

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