<?php
// --- 1. BAGIAN LOGIC (DARI KODE 2) ---
require '../config/connect.php';

// Ambil Data Volunteer dari Database (Urutkan dari terbaru)
$query = "SELECT * FROM volunteers ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Volunteer</title>
<<<<<<< HEAD

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/stylenavbar.css">
    <link rel="stylesheet" href="../assets/css/stylevolunteer.css">
    <link rel="stylesheet" href="../assets/css/stylefooter.css">
=======
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/css/stylenavbar.css">    
    <link rel="stylesheet" href="../assets/css/stylevolunteer.css"> 
    <link rel="stylesheet" href="../assets/css/stylefooter.css">    
    
>>>>>>> 858ca18c9ceb4bb6fd27e1fbaca13c5477505c08
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="../assets/image/Logo.png" alt="SUMATROPIC" class="logo-image">
                <span class="logo-text">SUMATROPIC</span>
            </div>
            <div class="nav-links">
                <a href="../index.php">Beranda</a>
                <a href="berita.php">Berita</a>
<<<<<<< HEAD
                <a href="flora.php">Flora</a>
                <a href="fauna.php">Fauna</a>
=======
                <a href="#">Flora</a>
                <a href="#">Fauna</a>
>>>>>>> 858ca18c9ceb4bb6fd27e1fbaca13c5477505c08
            </div>
            <div class="auth-buttons">
                <a href="../login_register.php" class="btn-login">Masuk</a>
                <a href="../login_register.php" class="btn-register">Daftar</a>
            </div>
        </div>
    </nav>

    <main>
<<<<<<< HEAD

=======
        
<<<<<<< HEAD
        <div class="hero-wrapper">
            
            <div class="hero-image-area">
                <div class="spotlight-text">
                    <span>SPOTLIGHT ON</span>
                    <h2>GAJAH <br> SUMATRA</h2>
                    <p>contributing to a healthy forest ecosystem</p>
                </div>
                <img src="../assets/image/volunteer.jpg" alt="Gajah Sumatra">
=======
>>>>>>> 858ca18c9ceb4bb6fd27e1fbaca13c5477505c08
        <header class="hero" style="background-image: url('../assets/image/volunteer.jpg');">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <p class="breadcrumb">Beranda > Volunteer</p>
                <h1>Volunteer</h1>
<<<<<<< HEAD
                <p class="hero-desc">Help protect and restore nature near you, connect to our conservation work and build community.</p>
            </div>
            <div class="hero-spotlight">
                <span>SPOTLIGHT ON</span>
                <h2>GAJAH <br> SUMATRA</h2>
                <p>contributing to a healthy forest ecosystem</p>
            </div>
        </header>
=======
                <p class="hero-desc">Bergabunglah dengan komunitas penjaga alam. Dari menanam pohon hingga patroli hutan, setiap tetes keringatmu adalah napas baru bagi masa depan hutan Sumatera.</p>
>>>>>>> 24b5464aedca3cf76dd1b7fed737af79042b374f
            </div>

            <div class="hero-title-bar">
                <div class="hero-title-content">
                    <p class="breadcrumb">Beranda > Volunteer</p>
                    <h1>Volunteer</h1>
                    <p class="hero-desc">
                        Bergabunglah dengan komunitas penjaga alam. Dari menanam pohon hingga patroli hutan, setiap tetes keringatmu adalah napas baru bagi masa depan hutan Sumatera.
                    </p>
                </div>
            </div>
        </div>
>>>>>>> 858ca18c9ceb4bb6fd27e1fbaca13c5477505c08

        <div class="container">
            <section class="intro">
                <h2>Aksi kecil, dampak besar</h2>
                <p class="subtitle">Small action is matter.</p>
                <p class="description">
<<<<<<< HEAD
                    Setiap tangan yang terulur membawa harapan untuk bumi yang lebih sehat dan masa depan yang tetap hijau. Pilih program <em>volunteer</em> yang sesuai dengan minatmu dan mulai berkontribusi untuk alam Sumatra.
=======
                 Setiap tangan yang terulur membawa harapan untuk bumi yang lebih sehat dan masa depan yang tetap hijau. Pilih program volunteer yang sesuai dengan minatmu dan mulai berkontribusi untuk alam SumatraSetiap tangan yang terulur membawa harapan untuk bumi yang lebih sehat dan masa depan yang tetap hijau. Pilih program <em>volunteer</em> yang sesuai dengan minatmu dan mulai berkontribusi untuk alam Sumatra.
>>>>>>> 858ca18c9ceb4bb6fd27e1fbaca13c5477505c08
                </p>
            </section>

            <section class="card-list">
<<<<<<< HEAD

                <?php
                // Cek apakah ada data?
                if (mysqli_num_rows($result) > 0):
                    $counter = 1; // Variabel hitung untuk efek Zig-Zag

                    // Loop data dari database
                    while ($row = mysqli_fetch_assoc($result)):

                        // LOGIC ZIG-ZAG: Jika urutan Genap (2, 4, 6...), tambah class 'reverse'
                        $css_class = ($counter % 2 == 0) ? 'reverse' : '';
                ?>

                        <div class="card <?= $css_class; ?>">
                            <div class="card-text">
                                <h3><?= htmlspecialchars($row['judul']); ?></h3>

                                <p>
                                    <?= nl2br(htmlspecialchars($row['deskripsi_singkat'])); ?>
                                </p>

                                <a href="<?= htmlspecialchars($row['url_sumber']); ?>" target="_blank" style="text-decoration: none;">
                                    <button class="btn-action">Take action</button>
                                </a>
                            </div>

                            <div class="card-image">
                                <img src="../uploads/volunteer/<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['judul']); ?>">
                            </div>
                        </div>

                    <?php
                        $counter++; // Tambah hitungan
                    endwhile;
                else:
                    ?>
                    <div style="text-align: center; padding: 50px; color: #666;">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Belum ada program volunteer yang tersedia saat ini.</p>
                    </div>
                <?php endif; ?>
=======
                
                <div class="card">
                    <div class="card-text">
                        <h3>Perlindungan Gajah Sumatra</h3>
<<<<<<< HEAD
                        <p>
                            Gajah Sumatra terus kehilangan habitat karena perambahan dan konflik dengan manusia. Bergabunglah dalam aksi perlindungan, mulai dari pemantauan populasi, edukasi warga, hingga restorasi kawasan.
                            Setiap relawan membantu membuka jalan bagi masa depan yang lebih aman bagi spesies ikonik ini.
                        </p>
                        <button class="btn-action">Take action</button>
=======
                        <p>Gajah Sumatra terus kehilangan habitat karena perambahan dan konflik dengan manusia. Bergabunglah dalam aksi perlindungan, mulai dari pemantauan populasi, edukasi warga, hingga restorasi kawasan. Setiap relawan membantu membuka jalan bagi masa depan yang lebih aman bagi spesies ikonik ini.</p>                        
                        <button class="btn-action" a href="Bergabung Menjadi Relawan - Greenpeace Indonesia - Greenpeace Indonesia">Take action</button>
>>>>>>> 24b5464aedca3cf76dd1b7fed737af79042b374f
                    </div>
                    <div class="card-image">
                        <img src="../assets/image/volunteer.jpg" alt="Gajah">
                    </div>
                </div>

                <div class="card">
                    <div class="card-text">
                        <h3>Perlindungan Gajah Sumatra</h3>
<<<<<<< HEAD
                        <p>
                            Gajah Sumatra terus kehilangan habitat karena perambahan dan konflik dengan manusia. Bergabunglah dalam aksi perlindungan, mulai dari pemantauan populasi, edukasi warga, hingga restorasi kawasan.
                            Setiap relawan membantu membuka jalan bagi masa depan yang lebih aman bagi spesies ikonik ini.
                        </p>
                        <button class="btn-action">Take action</button>
=======
                        <p>Gajah Sumatra terus kehilangan habitat karena perambahan dan konflik dengan manusia. Bergabunglah dalam aksi perlindungan, mulai dari pemantauan populasi, edukasi warga, hingga restorasi kawasan. Setiap relawan membantu membuka jalan bagi masa depan yang lebih aman bagi spesies ikonik ini.</p>                        
                        <button class="btn-action" a href="Bergabung Menjadi Relawan - Greenpeace Indonesia - Greenpeace Indonesia">Take action</button>
>>>>>>> 24b5464aedca3cf76dd1b7fed737af79042b374f
                    </div>
                    <div class="card-image">
                        <img src="../assets/image/volunteer.jpg" alt="Gajah">
                    </div>
                </div>

                 <div class="card">
                    <div class="card-text">
                        <h3>Perlindungan Gajah Sumatra</h3>
<<<<<<< HEAD
                        <p>
                            Gajah Sumatra terus kehilangan habitat karena perambahan dan konflik dengan manusia. Bergabunglah dalam aksi perlindungan, mulai dari pemantauan populasi, edukasi warga, hingga restorasi kawasan.
                            Setiap relawan membantu membuka jalan bagi masa depan yang lebih aman bagi spesies ikonik ini.
                        </p>
                        <button class="btn-action">Take action</button>
                    </div>
                    <div class="card-image">
                        <img src="../assets/image/volunteer.jpg" alt="Gajah">
=======
                        <p>Gajah Sumatra terus kehilangan habitat karena perambahan dan konflik dengan manusia. Bergabunglah dalam aksi perlindungan, mulai dari pemantauan populasi, edukasi warga, hingga restorasi kawasan. Setiap relawan membantu membuka jalan bagi masa depan yang lebih aman bagi spesies ikonik ini.</p>                        
                        <button class="btn-action" a href="Bergabung Menjadi Relawan - Greenpeace Indonesia - Greenpeace Indonesia">Take action</button>
                    </div>
                    <div class="card-image">
                        <img src="../assets/image/volunteer.jpg" alt="Gajah">
                    </div>
                </div>

                <div class="card">
                    <div class="card-text">
                        <h3>Perlindungan Gajah Sumatra</h3>
                        <p>Gajah Sumatra terus kehilangan habitat karena perambahan dan konflik dengan manusia. Bergabunglah dalam aksi perlindungan, mulai dari pemantauan populasi, edukasi warga, hingga restorasi kawasan. Setiap relawan membantu membuka jalan bagi masa depan yang lebih aman bagi spesies ikonik ini.</p>                        
                        <button class="btn-action" a href="Bergabung Menjadi Relawan - Greenpeace Indonesia - Greenpeace Indonesia">Take action</button>
                    </div>
                    <div class="card-image">
                        <img src="../assets/image/volunteer.jpg" alt="Gajah">
>>>>>>> 24b5464aedca3cf76dd1b7fed737af79042b374f
                    </div>
                </div>
>>>>>>> 858ca18c9ceb4bb6fd27e1fbaca13c5477505c08

            </section>
        </div>
    </main>

    <footer class="site-footer">
        <div class="footer-container">
<<<<<<< HEAD
            <div class="footer-left">SUMATROPIC</div>
=======
            <div class="footer-left">Sumatropic</div>
>>>>>>> 858ca18c9ceb4bb6fd27e1fbaca13c5477505c08
            <div class="footer-center">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
            <div class="footer-right">Sumatropic 2025. All right reserved</div>
        </div>
    </footer>

</body>

</html>