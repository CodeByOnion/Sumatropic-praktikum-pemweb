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

    <link rel="stylesheet" href="assets/css/stylenavbar.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php require_once __DIR__ . '/template/navbar.php'; ?>


    <section class="hero" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('assets/image/bg.jpeg');">
        <div class="hero-content">
            <h1>S U M A T R O P I C</h1>
            <p>Dari lembah berkabut hingga punggung harimau, setiap jengkal hutan ini menyimpan cerita.</p>
            <div class="hero-buttons">
                <a href="pages/flora.php"><button class="btn btn-outline-white">JELAJAHI FLORA</button></a>
                <a href="pages/fauna.php"><button class="btn btn-outline-white">KENALI FAUNA</button></a>
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
                <p>Terbentang sepanjang 1.700 km, Sumatera adalah rumah bagi salah satu ekosistem paling kompleks dan kaya di dunia. Pulau ini menyajikan lanskap kontras yang memukau: deretan gunung berapi aktif, danau kaldera raksasa yang tenang, hingga hutan hujan tropis lebat yang menjadi paru-paru dunia.</p> <br>
                <p>Sumatera memegang predikat langka sebagai satu-satunya habitat di mana Harimau, Gajah, Orangutan, dan Badak hidup berdampingan secara liar. Menjelajahi Sumatera adalah sebuah perjalanan untuk menyaksikan, memahami, dan melindungi warisan alam yang tak tergantikan.</p>
            </div>
        </div>
    </section>

    <section class="did-you-know">
        <div class="dyk-header">Did You Know?</div>

        <div class="spotlight-container">

            <!-- CARD KIRI -->
            <div class="spotlight-card">
                <h3>
                    Monyet Kedih: Si Jambul Mohawk dari Leuser
                </h3>

                <p>
                    Sering dijuluki “Thomas Leaf Monkey”, primata endemik Aceh dan
                    Sumut ini punya ciri khas yang menakjubkan: gaya rambut mohawk alami!
                    Berbeda dengan monyet lain, Kedih memiliki pola warna wajah unik
                    yang menyerupai topeng. Mereka adalah akrobat ulung yang menghabiskan
                    hidupnya melompat di kanopi tinggi hutan hujan, memainkan peran vital
                    sebagai penyebar benih untuk menjaga kelestarian paru-paru Sumatera.
                </p>

                <a href="pages/fauna.php" class="btn btn-outline-white">
                    Selengkapnya
                </a>
            </div>

            <!-- GAMBAR KANAN -->
            <img
                src="assets/image/funfact.jpeg"
                class="spotlight-image"
                alt="Monyet Kedih di Hutan Leuser">

        </div>
    </section>


    <div class="section-separator">
        <h2>Ada apa aja di Hutan Tropis Sumatra?</h2>
        <p>Temukan keajaiban kehidupan yang tersembunyi di balik rimbunnya kanopi hutan hujan kita.</p>
    </div>

    <section class="features">
        <div class="feature-item">
            <div class="feature-text">
                <h3>Flora endemik</h3>
                <p>Dari bunga raksasa yang memikat hingga tanaman obat langka, hutan Sumatra menyimpan ribuan spesies botani yang tak tumbuh di tempat lain di bumi.</p>
                <a href="pages/flora.php"><button class="btn btn-dark">JELAJAHI FLORA</button></a>
            </div>
            <div class="feature-img">
                <img src="assets/image/rafflesia.jpg" alt="Rafflesia">
            </div>
        </div>

        <div class="feature-item reverse">
            <div class="feature-text">
                <h3>Fauna endemik</h3>
                <p>Kenali ragam satwa unik mulai dari raja hutan hingga burung-burung eksotis yang mewarnai langit Sumatera.</p>
                <a href="pages/fauna.php"><button class="btn btn-dark">KENALI FAUNA</button></a>
            </div>
            <div class="feature-img">
                <img src="assets/image/beo.jpg" alt="Burung Sumatra">
            </div>
        </div>
    </section>

    <section class="involvement">
        <h2>Nature Needs You</h2>
        <p>Ada banyak cara untuk terlibat. Pilih langkah kebaikanmu hari ini dan jadilah bagian dari solusi untuk masa depan bumi dan manusia yang lebih baik.</p>
        <div class="involvement-grid">
            <a href="pages/volunteer.php">
                <div class="involve-card">
                    <img src="assets/image/monyet.jpg" alt="Volunteer">
                    <h3>Volunteer</h3>
                </div>
            </a>
            <a href="pages/donasi.php">
                <div class="involve-card">
                    <img src="assets/image/monyet.jpg" alt="Donasi">
                    <h3>Donasi</h3>
                </div>
            </a>
            <a href="#">
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