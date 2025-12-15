<?php
session_start();
require '../config/connect.php';

// --- LOGIC FILTERING ---
$where = "";
$search_query = "";

if (isset($_GET['cari'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['cari']);
    $where = "WHERE nama_lokal LIKE '%$search_query%' OR nama_ilmiah LIKE '%$search_query%'";
}

// Logic Sortir
$order = "ORDER BY created_at DESC";

// Ambil data
$query = "SELECT * FROM flora $where $order";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Flora</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/stylenavbar.css"> <link rel="stylesheet" href="../assets/css/styleflora.css">   <link rel="stylesheet" href="../assets/css/stylefooter.css">  </head>

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
                <a href="flora.php" class="active">Flora</a>
                <a href="fauna.php">Fauna</a>
            </div>

            <div class="auth-buttons">
                <a href="../login_register.php" class="btn-login" style="text-decoration:none;">Masuk</a>
                <a href="../login_register.php" class="btn-register" style="text-decoration:none;">Daftar</a>
            </div>
        </div>
    </nav>

    <main>
        
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

        <div class="container content-wrapper">
            <div class="search-section">
                
                <div class="search-header">
                    <span class="line"></span>
                    <h2 class="search-title">Jelajahi Flora</h2>
                    <span class="line"></span>
                </div>

                <form action="" method="GET" class="filter-bar">
                    <input type="text" name="cari" placeholder="Cari nama flora...." class="search-input" value="<?= htmlspecialchars($search_query) ?>">

                    <div class="filter-row">
                         <select class="filter-select">
                            <option><b>Status Konservasi</b></option>
                            <option>Critically Endangered</option>
                            <option>Endangered</option>
                            <option>Vulnerable</option>
                            <option>Near Threatened</option>
                            <option>Least Concern</option>
                        </select>
                        <select class="filter-select"> 
                            <option><b>Wilayah</b></option>
                            <option>Aceh</option>
                            <option>Sumatra Utara</option>
                            <option>Sumatra Barat</option>
                            <option>Riau</option>
                            <option>Jambi</option>
                            <option>Sumatra Selatan</option>
                            <option>Bengkulu</option>
                            <option>Lampung</option>
                        </select>
                    </div>
                </form>

                <div class="flora-list">
                    <?php
                    $counter = 1; 
                    if (mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                            // Logic Zig-Zag
                            $reverse_class = ($counter % 2 == 0) ? 'reverse' : '';
                    ?>

                            <article class="flora-card <?= $reverse_class; ?>">
                                <div class="card-image">
                                    <span class="status-badge"><?= $row['status_konservasi']; ?></span>
                                    <img src="../uploads/flora/<?= $row['gambar']; ?>" alt="<?= $row['nama_lokal']; ?>">
                                </div>

                                <div class="card-info">
                                    <h3 class="flora-name"><?= $row['nama_lokal']; ?></h3>

                                    <div class="scientific-row">
                                        <span class="sci-name"><?= $row['nama_ilmiah']; ?></span>
                                        <span class="location"><i class="fas fa-map-marker-alt"></i> <?= $row['asal_provinsi']; ?></span>
                                    </div>

                                    <div class="flora-desc">
                                        <p><?= nl2br(substr($row['deskripsi'], 0, 300)); ?>...</p>
                                    </div>
                                    
                                    <br>
                                    <a href="#" style="color: white; text-decoration: underline; font-size: 0.9rem;">Lihat Detail &rarr;</a>
                                </div>
                            </article>

                        <?php
                            $counter++; 
                        endwhile;
                    else:
                        ?>
                        <div style="text-align: center; padding: 50px; width: 100%;">
                            <p>Belum ada data flora ditemukan.</p>
                        </div>
                    <?php endif; ?>
                </div>
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