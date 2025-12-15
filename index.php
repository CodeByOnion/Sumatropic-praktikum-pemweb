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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/stylenavbar.css">
    <link rel="stylesheet" href="assets/css/style.css">       
    <link rel="stylesheet" href="assets/css/stylefooter.css">
    
    <style>
    /* 1. ANIMASI SAAT WEB PERTAMA DIBUKA (Slide Down) */
    @keyframes slideInFromTop {
        0% { opacity: 0; transform: translateY(-50px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    body { animation: slideInFromTop 1s ease-out forwards; }

    /* 2. CLASS UNTUK SCROLL REVEAL */
    .reveal-hidden { opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(0.5, 0, 0, 1); }
    .appear { opacity: 1; transform: translateY(0); }

    /* Delay bertingkat untuk kartu berita */
    .news-card.reveal-hidden:nth-child(1) { transition-delay: 0.1s; }
    .news-card.reveal-hidden:nth-child(2) { transition-delay: 0.2s; }
    .news-card.reveal-hidden:nth-child(3) { transition-delay: 0.3s; }
    .news-card.reveal-hidden:nth-child(4) { transition-delay: 0.4s; }

    /* Container untuk efek 3D mouse */
    .spotlight-container { perspective: 1000px; }
    </style>
</head>

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
                <a href="pages/flora.php">Flora</a>
                <a href="pages/fauna.php">Fauna</a>
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

    <main>

        <section class="hero" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('assets/image/bg.jpeg');">
            <div class="hero-content">
                <h1>SUMATROPIC</h1>
                <p>Dari lembah berkabut hingga punggung harimau, setiap jengkal hutan ini menyimpan cerita.</p>
                <div class="hero-buttons">
                    <a href="pages/flora.php" class="btn btn-outline-white">JELAJAHI FLORA</a>
                    <a href="pages/fauna.php" class="btn btn-outline-white">KENALI FAUNA</a>
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
                <div class="spotlight-card">
                    <h3><?= $spotlight ? $spotlight['nama_lokal'] : 'Data Kosong'; ?></h3>
                    <p><?= $spotlight ? substr($spotlight['deskripsi'], 0, 150) . '...' : 'Belum ada data.'; ?></p>
                    <a href="pages/fauna.php" class="btn btn-outline-white">Selengkapnya</a>
                </div>

                <?php $gambar_spotlight = $spotlight ? "uploads/fauna/" . $spotlight['gambar'] : "assets/image/funfact.jpeg"; ?>
                <img src="<?= $gambar_spotlight; ?>" class="spotlight-image" alt="Spotlight Image">
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
                    <a href="pages/flora.php" class="btn btn-dark">JELAJAHI FLORA</a>
                </div>
                <div class="feature-img">
                    <img src="assets/image/rafflesia.jpg" alt="Rafflesia">
                </div>
            </div>

            <div class="feature-item reverse">
                <div class="feature-text">
                    <h3>Fauna endemik</h3>
                    <p>Kenali ragam satwa unik mulai dari raja hutan hingga burung-burung eksotis yang mewarnai langit Sumatera.</p>
                    <a href="pages/fauna.php" class="btn btn-dark">KENALI FAUNA</a>
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
                        <img src="assets/image/volunteer.jpg" alt="Volunteer">
                        <h3>Volunteer</h3>
                    </div>
                </a>
                <a href="pages/donasi.php">
                    <div class="involve-card">
                        <img src="assets/image/donasi.jpg" alt="Donasi">
                        <h3>Donasi</h3>
                    </div>
                </a>
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
                                <div class="news-date"><?= date('d F Y', strtotime($news['tanggal_tayang'])); ?></div>
                                <div class="news-title"><?= $news['judul']; ?></div>
                                <div class="news-desc"><?= $news['deskripsi_singkat']; ?></div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>

                <?php if (mysqli_num_rows($result_news) == 0): ?>
                    <p style="text-align: center; width: 100%;">Belum ada berita terbaru.</p>
                <?php endif; ?>
            </div>
        </section>

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

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // --- 1. SCROLL REVEAL ---
        const revealElements = document.querySelectorAll('.intro-text, .map-img, .spotlight-card, .spotlight-image, .feature-item, .involve-card, .news-card, h2');

        const revealOptions = {
            threshold: 0.15, 
            rootMargin: "0px 0px -50px 0px"
        };

        const revealOnScroll = new IntersectionObserver(function(entries, revealOnScroll) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                } else {
                    entry.target.classList.add('appear');
                    revealOnScroll.unobserve(entry.target); 
                }
            });
        }, revealOptions);

        revealElements.forEach(el => {
            el.classList.add('reveal-hidden'); 
            revealOnScroll.observe(el); 
        });

        // --- 2. 3D TILT EFFECT ---
        const spotlightContainer = document.querySelector('.spotlight-container');
        const spotlightCard = document.querySelector('.spotlight-card');
        
        if(spotlightContainer && spotlightCard) {
            spotlightContainer.addEventListener('mousemove', (e) => {
                const xAxis = (window.innerWidth / 2 - e.pageX) / 25; 
                const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
                spotlightCard.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
            });

            spotlightContainer.addEventListener('mouseleave', () => {
                spotlightCard.style.transform = `rotateY(0deg) rotateX(0deg)`;
                spotlightCard.style.transition = "all 0.5s ease";
            });
            
            spotlightContainer.addEventListener('mouseenter', () => {
                spotlightCard.style.transition = "none";
            });
        }
    });
    </script>

</body>
</html>