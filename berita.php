<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styleberita.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">SUMATROPIC</a>
            <ul class="nav-links">
                <li><a href="#">Beranda</a></li>
                <li><a href="#" class="active">Berita</a></li>
                <li><a href="#">Flora</a></li>
                <li><a href="#">Fauna</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="#" class="btn btn-outline">Masuk</a>
                <a href="#" class="btn btn-fill">Daftar</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-text">
                <p class="subtitle">SPOTLIGHT ON</p>
                <h1>HARIMAU<br>SUMATRA</h1>
                <p class="small-desc">smallest tigers in the world</p>
            </div>
            <div class="breadcrumbs">
                <span>Beranda > Berita</span>
            </div>
        </div>
    </header>

    <section class="page-header-strip">
        <div class="container">
            <h2>Berita</h2>
            <p>conservation good news stories and important updates from Fauna & Flora's projects.</p>
        </div>
    </section>

    <main class="container main-content">
        
        <div class="section-header">
            <h3 class="title-with-lines">Berita Terkini</h3>
        </div>

        <div class="filters">
            <input type="text" placeholder="Cari judul...." class="search-input">
            <div class="sort-wrapper">
                <select class="sort-select">
                    <option value="" disabled selected>Urutkan</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                    <option value="flora">Flora</option>
                    <option value="fauna">Fauna</option>
                </select>
            </div>
        </div>

        <div class="news-list">
            
            <article class="news-card">
                <div class="news-image">
                    <img src="https://placehold.co/600x400/gray/white?text=Gajah+Mati" alt="Gajah Sumatera">
                </div>
                <div class="news-details">
                    <span class="news-date">29 November 2025</span>
                    <h4><a href="#">Gajah Sumatera Ditemukan Mati Usai Banjir Aceh, Kondisi Terjepit Kayu Hutan</a></h4>
                    <p class="news-excerpt">
                        KOMPAS.com - Seekor gajah sumatera (Elephas maximus sumatranus) ditemukan dalam kondisi mati setelah Kabupaten Pidie Jaya, Aceh dilanda banjir.
                    </p>
                </div>
            </article>

            <article class="news-card">
                <div class="news-image">
                    <img src="https://placehold.co/600x400/gray/white?text=Gajah+Mati" alt="Gajah Sumatera">
                </div>
                <div class="news-details">
                    <span class="news-date">29 November 2025</span>
                    <h4><a href="#">Gajah Sumatera Ditemukan Mati Usai Banjir Aceh, Kondisi Terjepit Kayu Hutan</a></h4>
                    <p class="news-excerpt">
                        KOMPAS.com - Seekor gajah sumatera (Elephas maximus sumatranus) ditemukan dalam kondisi mati setelah Kabupaten Pidie Jaya, Aceh dilanda banjir.
                    </p>
                </div>
            </article>

            <article class="news-card">
                <div class="news-image">
                    <img src="https://placehold.co/600x400/gray/white?text=Gajah+Mati" alt="Gajah Sumatera">
                </div>
                <div class="news-details">
                    <span class="news-date">29 November 2025</span>
                    <h4><a href="#">Gajah Sumatera Ditemukan Mati Usai Banjir Aceh, Kondisi Terjepit Kayu Hutan</a></h4>
                    <p class="news-excerpt">
                        KOMPAS.com - Seekor gajah sumatera (Elephas maximus sumatranus) ditemukan dalam kondisi mati setelah Kabupaten Pidie Jaya, Aceh dilanda banjir.
                    </p>
                </div>
            </article>

             <article class="news-card">
                <div class="news-image">
                    <img src="https://placehold.co/600x400/gray/white?text=Gajah+Mati" alt="Gajah Sumatera">
                </div>
                <div class="news-details">
                    <span class="news-date">29 November 2025</span>
                    <h4><a href="#">Gajah Sumatera Ditemukan Mati Usai Banjir Aceh, Kondisi Terjepit Kayu Hutan</a></h4>
                    <p class="news-excerpt">
                        KOMPAS.com - Seekor gajah sumatera (Elephas maximus sumatranus) ditemukan dalam kondisi mati setelah Kabupaten Pidie Jaya, Aceh dilanda banjir.
                    </p>
                </div>
            </article>

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