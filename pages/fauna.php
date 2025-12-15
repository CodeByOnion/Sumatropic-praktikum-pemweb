<?php
session_start();
require '../config/connect.php';

// --- LOGIC PENCARIAN & FILTER ---
$where = "";
$search_query = "";

if (isset($_GET['cari'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['cari']);
    $where = "WHERE nama_lokal LIKE '%$search_query%' OR nama_ilmiah LIKE '%$search_query%'";
}

$order = "ORDER BY created_at DESC";
$query = "SELECT * FROM fauna $where $order";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Fauna</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/stylenavbar.css">
    <link rel="stylesheet" href="../assets/css/stylefauna.css">
    <link rel="stylesheet" href="../assets/css/stylefooter.css">
</head>

<body>

    <?php require_once "../template/navbar.php"; ?>

    <main>

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
                <p class="intro-desc" style="font-size: 1rem; opacity: 0.9;">
                    Kenali ragam satwa unik mulai dari raja hutan hingga burung-burung eksotis yang mewarnai langit Sumatra.
                </p>
            </div>
        </section>

        <div class="container main-content">

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
            </div>

            <div class="fauna-list">
                <?php
                $counter = 1;
                if (mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                        // Logic Zig-Zag
                        $reverse_class = ($counter % 2 == 0) ? 'reverse' : '';

                        // Logic Status Color (Merah jika Kritis/Punah)
                        $status_class = ($row['status_konservasi'] == 'Punah' || $row['status_konservasi'] == 'Kritis') ? 'critical' : '';
                ?>

                        <article class="fauna-card <?= $reverse_class ?>">
                            <div class="card-image-wrapper">
                                <span class="status-badge <?= $status_class ?>"><?= $row['status_konservasi'] ?></span>
                                <img src="../uploads/fauna/<?= $row['gambar'] ?>" alt="<?= $row['nama_lokal'] ?>">
                            </div>

                            <div class="card-info">
                                <h3 class="fauna-name"><?= $row['nama_lokal'] ?></h3>

                                <div class="meta-row">
                                    <span class="sci-name" style="font-style: italic; margin-right: 15px;"><?= $row['nama_ilmiah'] ?></span>
                                    <span class="location"><i class="fas fa-map-marker-alt"></i> <?= $row['asal_provinsi'] ?></span>
                                </div>



                                <div class="fauna-desc">
                                    <p><?= nl2br(substr($row['deskripsi'], 0, 300)) ?>...</p>
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
                    <p style="text-align: center; padding: 50px;">Belum ada data fauna ditemukan.</p>
                <?php endif; ?>
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