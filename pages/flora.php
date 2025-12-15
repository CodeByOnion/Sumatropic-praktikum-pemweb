<?php
session_start();
require '../config/connect.php';

// --- LOGIC PENCARIAN & FILTER MULTIPLE ---
$where_clauses = [];

// 1. Cek Pencarian Teks
if (isset($_GET['cari']) && !empty($_GET['cari'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['cari']);
    $where_clauses[] = "(nama_lokal LIKE '%$search_query%' OR nama_ilmiah LIKE '%$search_query%')";
} else {
    $search_query = "";
}

// 2. Cek Filter Status Konservasi
if (isset($_GET['status']) && !empty($_GET['status'])) {
    $status_filter = mysqli_real_escape_string($conn, $_GET['status']);
    $where_clauses[] = "status_konservasi = '$status_filter'";
}

// 3. Cek Filter Wilayah (Provinsi)
if (isset($_GET['provinsi']) && !empty($_GET['provinsi'])) {
    $provinsi_filter = mysqli_real_escape_string($conn, $_GET['provinsi']);
    $where_clauses[] = "asal_provinsi = '$provinsi_filter'";
}

// Gabungkan semua kondisi dengan AND
$where_sql = "";
if (count($where_clauses) > 0) {
    $where_sql = "WHERE " . implode(' AND ', $where_clauses);
}

// Order & Eksekusi
$order = "ORDER BY created_at DESC";
$query = "SELECT * FROM flora $where_sql $order";
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

    <link rel="stylesheet" href="../assets/css/stylenavbar.css">
    <link rel="stylesheet" href="../assets/css/styleflora.css">
    <link rel="stylesheet" href="../assets/css/stylefooter.css">

    <style>
        /* Awal: kartu transparan dan turun */
        .flora-card {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        
        /* Akhir: kartu muncul */
        .flora-card.muncul {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <?php require_once "../template/navbar.php"; ?>

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
                        <select name="status" class="filter-select" onchange="this.form.submit()">
                            <option value="">Status Konservasi</option>
                            <?php
                            $statuses = ['Tumbuhan dan Satwa Tidak Dilindungi', 'Tumbuhan dan Satwa Dilindungi', 'Tumbuhan dan Satwa Punah'];
                            foreach ($statuses as $st) {
                                $selected = (isset($_GET['status']) && $_GET['status'] == $st) ? 'selected' : '';
                                echo "<option value='$st' $selected>$st</option>";
                            }
                            ?>
                        </select>

                        <select name="provinsi" class="filter-select" onchange="this.form.submit()">
                            <option value="">Wilayah</option>
                            <?php
                            $provinsis = ['Aceh', 'Sumatra Utara', 'Sumatra Barat', 'Riau', 'Jambi', 'Sumatra Selatan', 'Bengkulu', 'Lampung'];
                            foreach ($provinsis as $pv) {
                                $selected = (isset($_GET['provinsi']) && $_GET['provinsi'] == $pv) ? 'selected' : '';
                                echo "<option value='$pv' $selected>$pv</option>";
                            }
                            ?>
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

    <script>
        // 1. JS INTERAKTIF NAVBAR
        const navbar = document.querySelector('.navbar');
        if(navbar) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.style.backgroundColor = '#1a3c34'; 
                    navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.3)';
                    navbar.style.transition = 'all 0.3s ease';
                    navbar.style.padding = '10px 0';
                } else {
                    navbar.style.backgroundColor = ''; // Reset CSS
                    navbar.style.boxShadow = '';
                    navbar.style.padding = '';
                }
            });
        }

        // 2. JS ANIMASI SCROLL REVEAL FLORA
        document.addEventListener("DOMContentLoaded", function() {
            // Target kartu flora
            const cards = document.querySelectorAll('.flora-card');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('muncul');
                        }, 100); 
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>

</body>
</html>