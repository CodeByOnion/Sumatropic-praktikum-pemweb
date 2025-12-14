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

// Logic Sortir (Opsional bisa dikembangkan nanti)
$order = "ORDER BY created_at DESC";

// Ambil data dari tabel FLORA
$query = "SELECT * FROM flora $where $order";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Flora</title>
    <link rel="stylesheet" href="../assets/css/stylenavbar.css">
    <link rel="stylesheet" href="../assets/css/styleflora.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<<<<<<< HEAD
<body>
    <?php require_once "../template/navbar.php"; ?>
=======
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="../assets/image/Logo.png" alt="SUMATROPIC" class="logo-image">
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
>>>>>>> 15157152e9db78071cb47e91f67466079b747638

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
                            <option>Status Konservasi</option>
                            <option>Dilindungi</option>
                            <option>Punah</option>
                        </select>
                        <select class="filter-select">
                            <option>Wilayah</option>
                            <option>Sumatra Utara</option>
                            <option>Sumatra Barat</option>
                        </select>
                    </div>
                </form>

                <div class="flora-list">

                    <?php
                    $counter = 1; // Untuk menghitung urutan kartu (Ganjil/Genap)

                    if (mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                            // Logic Zig-Zag: Jika angka genap, tambah class "reverse"
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
                                        <p><?= nl2br(substr($row['deskripsi'], 0, 700)); ?></p>
                                    </div>
                                </div>
                            </article>

                        <?php
                            $counter++; // Tambah hitungan setiap loop
                        endwhile;
                    else:
                        ?>
                        <p style="text-align: center; padding: 50px;">Belum ada data flora ditemukan.</p>
                    <?php endif; ?>
                </div>
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