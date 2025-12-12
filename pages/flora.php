<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Flora</title>
    <link rel="stylesheet" href="../assets/css/styleflora.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="../assets/image/logosumatropic.jpg" alt="SUMATROPIC" class="logo-image">
                <span class="logo-text">SUMATROPIC</span>
            </div>
            <div class="nav-links">
                <a href="#">Beranda</a>
                <a href="#">Berita</a>
                <a href="#" class="active">Flora</a>
                <a href="#">Fauna</a>
            </div>
            <div class="nav-right">
                <div class="auth-buttons">
                    <a href="#" class="btn-login">Masuk</a>
                    <a href="#" class="btn-register">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="hero-flora" style="background-image: url('../assets/image/rafflesia.jpg');">
        <div class="hero-overlay">
            <div class="container hero-content">
                <span class="spotlight-text">SPOTLIGHT ON</span>
                <h1 class="hero-title">RAFFLESIA<br>HASSELTII</h1>
                <p class="hero-subtitle">a plant seen more by tigers<br>than people</p>
            </div>
        </div>
    </header>

    <section class="flora-intro-strip">
        <div class="container">
            <div class="breadcrumb">Beranda > Flora</div>
            <h2>Flora</h2>
            <p class="intro-desc">
                Dari bunga raksasa yang memikat hingga tanaman obat langka, hutan Sumatra menyimpan ribuan spesies botani yang tak tumbuh di tempat lain di bumi.
            </p>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            
            <div class="search-header">
                <span class="line"></span>
                <h2 class="search-title">Jelajahi Flora</h2>
                <span class="line"></span>
            </div>

            <div class="filter-bar">
                <input type="text" placeholder="Cari judul...." class="search-input">
                <div class="filter-row">
                    <select class="filter-select">
                        <option>Status Konservasi</option>
                        <option>Vulnerable</option>
                        <option>Endangered</option>
                    </select>
                    <select class="filter-select">
                        <option>Wilayah</option>
                        <option>Sumatra Utara</option>
                        <option>Sumatra Barat</option>
                    </select>
                </div>
            </div>

            <div class="flora-list">

                <article class="flora-card">
                    <div class="card-image">
                        <span class="status-badge">Vulnerable</span>
                        <img src="../assets/image/anggrek.jpeg" alt="Anggrek Hartinah">
                    </div>
                    
                    <div class="card-info">
                        <h3 class="flora-name">Anggrek Hartinah</h3>
                        <div class="scientific-row">
                            <span class="sci-name">Cymbidium hartinahianum</span>
                            <span class="location"><i class="fas fa-map-marker-alt"></i> Sumatra Utara</span>
                        </div>
                        
                        <div class="flora-desc">
                            <p>Ditemukan pertama kali pada tahun 1976 di Desa Baniara Tele Kecamatan Harian Kabupaten Samosir, Sumatera Utara.</p>
                            <ul>
                                <li>Daun berukuran 50–60 cm dengan bentuk yang meruncing seperti pita.</li>
                                <li>Kelopak bunga didominasi dengan warna kuning, disertai corak yang khas berupa bibir bunga berwarna putih dan totol berwarna merah kecoklatan.</li>
                            </ul>
                        </div>
                    </div>
                </article>

                <article class="flora-card reverse">
                    <div class="card-image">
                        <span class="status-badge">Vulnerable</span>
                        <img src="../assets/image/anggrek.jpeg" alt="Anggrek Lain">
                    </div>
                    <div class="card-info">
                        <h3 class="flora-name">Anggrek Hartinah</h3>
                        <div class="scientific-row">
                            <span class="sci-name">Cymbidium hartinahianum</span>
                            <span class="location"><i class="fas fa-map-marker-alt"></i> Sumatra Utara</span>
                        </div>
                        <div class="flora-desc">
                            <p>Ditemukan pertama kali pada tahun 1976 di Desa Baniara Tele Kecamatan Harian Kabupaten Samosir, Sumatera Utara.</p>
                            <ul>
                                <li>Daun berukuran 50–60 cm dengan bentuk yang meruncing seperti pita.</li>
                                <li>Kelopak bunga didominasi dengan warna kuning.</li>
                            </ul>
                        </div>
                    </div>
                </article>

                <article class="flora-card">
                    <div class="card-image">
                        <span class="status-badge">Vulnerable</span>
                        <img src="../assets/image/anggrek.jpeg" alt="Anggrek 3">
                    </div>
                    
                    <div class="card-info">
                        <h3 class="flora-name">Anggrek Padang</h3>
                        <div class="scientific-row">
                            <span class="sci-name">Cymbidium padangense</span>
                            <span class="location"><i class="fas fa-map-marker-alt"></i> Sumatra Barat</span>
                        </div>
                        
                        <div class="flora-desc">
                            <p>Contoh deskripsi singkat untuk varietas anggrek di Sumatra Barat.</p>
                            <ul>
                                <li>Bentuk daun memanjang dan kuat.</li>
                                <li>Bunga berwarna krem dengan bintik merah.</li>
                            </ul>
                        </div>
                    </div>
                </article>

                <article class="flora-card reverse">
                    <div class="card-image">
                        <span class="status-badge">Endangered</span>
                        <img src="../assets/image/anggrek.jpeg" alt="Anggrek 4">
                    </div>
                    <div class="card-info">
                        <h3 class="flora-name">Anggrek Bukit</h3>
                        <div class="scientific-row">
                            <span class="sci-name">Cymbidium bukitensis</span>
                            <span class="location"><i class="fas fa-map-marker-alt"></i> Sumatra Selatan</span>
                        </div>
                        <div class="flora-desc">
                            <p>Contoh deskripsi singkat untuk varietas anggrek yang lebih langka.</p>
                            <ul>
                                <li>Populasi terancam akibat kehilangan habitat.</li>
                                <li>Perlu upaya konservasi lokal.</li>
                            </ul>
                        </div>
                    </div>
                </article>

            </div>

        </div>
    </main>

    <footer>
        <div class="container footer-container">
            <div class="footer-logo">Sumatropic</div>
            <div class="socials">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-tiktok"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-youtube"></i>
            </div>
            <div class="copyright">Sumatropic 2025. All right reserved</div>
        </div>
    </footer>

</body>
</html>