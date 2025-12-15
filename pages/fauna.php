<?php
session_start();
require '../config/connect.php';

// --- LOGIC PENCARIAN & FILTER ---
$where = "";
$search_query = "";

// Jika ada input pencarian
if (isset($_GET['cari'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['cari']);
    // Mencari berdasarkan nama lokal atau nama ilmiah
    $where = "WHERE nama_lokal LIKE '%$search_query%' OR nama_ilmiah LIKE '%$search_query%'";
}

// Logic Sortir (Default terbaru)
$order = "ORDER BY created_at DESC";

// Ambil data dari tabel FAUNA
$query = "SELECT * FROM fauna $where $order";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Fauna</title>
    <link rel="stylesheet" href="../assets/css/stylenavbar.css">
    <link rel="stylesheet" href="../assets/css/stylefauna.css">
    <link rel="stylesheet" href="../assets/css/stylefooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php require_once "../template/navbar.php"; ?>

    <header class="hero-fauna" style="background-image: url('../assets/image/beo.jpg');">
        <div class="hero-overlay">
            <div class="container hero-content">
                <span class="spotlight-text">SPOTLIGHT ON</span>
                <h1 class="hero-title">BEO NIAS</h1>
                <p class="hero-subtitle">known for its striking appearance<br>and vocal abilities</p>
            </div>
        </div>
    </header>

    <section class="fauna-intro-strip">
        <div class="container">
            <div class="breadcrumb">Beranda > Fauna</div>
            <h2>Fauna</h2>
            <p class="intro-desc">
                Kenali ragam satwa unik mulai dari raja hutan hingga burung-burung eksotis yang mewarnai langit Sumatra.
            </p>
        </div>
    </section>

    <main class="main-content">
        <div class="container">

            <div class="search-section">
                <div class="search-header">
                    <span class="line"></span>
                    <h2 class="section-title">Kenali Fauna</h2>
                    <span class="line"></span>
                </div>

                <form action="" method="GET" class="filter-bar">
                    <input type="text" name="cari" placeholder="Cari nama fauna...." class="search-input" value="<?= htmlspecialchars($search_query) ?>">

                    <div class="filter-row">
                        <select class="filter-select">
                            <option><b>Status Konservasi</b></option>
                            <option>Extinct</option>
                            <option>Extinct in the Wild</option>
                            <option>Critically Endangered</option>
                            <option>Vulnerable</option>
                            <option>Near Threatened</option>
                            <option>Least Concern</option>
                            <option>Data Deficient</option>
                            <option>Not Evaluated</option>
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
                            <option>Kepulauan Riau</option>
                            <option>Bangka Belitung</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="fauna-list">

                <?php
                $counter = 1; // Untuk menghitung urutan ganjil/genap

                if (mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                        // Logic Zig-Zag: Jika angka genap, tambah class "reverse"
                        $reverse_class = ($counter % 2 == 0) ? 'reverse' : '';

                        // Logic warna badge status (opsional)
                        $status_class = ($row['status_konservasi'] == 'Punah' || $row['status_konservasi'] == 'Kritis') ? 'critical' : '';
                ?>

                        <article class="fauna-card <?= $reverse_class ?>">
                            <div class="card-image-wrapper" style="flex: 0 0 45%; position: relative;">
                                <span class="status-badge <?= $status_class ?>"><?= $row['status_konservasi'] ?></span>
                                <img src="../uploads/fauna/<?= $row['gambar'] ?>" alt="<?= $row['nama_lokal'] ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;">
                            </div>

                            <div class="card-info">
                                <div class="info-header">
                                    <h3 class="fauna-name"><?= $row['nama_lokal'] ?></h3>

                                    <div class="meta-row"> <span class="sci-name" style="font-style: italic; margin-right: 15px;"><?= $row['nama_ilmiah'] ?></span>
                                        <span class="location"><i class="fas fa-map-marker-alt"></i> <?= $row['asal_provinsi'] ?></span>
                                    </div>
                                    <div class="underline"></div>
                                </div>

                                <div class="fauna-desc">
                                    <p><?= nl2br(substr($row['deskripsi'], 0, 700)) ?>...</p>
                                </div>
                            </div>
                        </article>

                    <?php
                        $counter++; // Tambah counter
                    endwhile;
                else:
                    ?>
                    <p style="text-align: center; padding: 50px;">Belum ada data fauna ditemukan.</p>
                <?php endif; ?>
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