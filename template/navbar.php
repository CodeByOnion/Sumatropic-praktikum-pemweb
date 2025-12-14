<?php
require_once __DIR__ . "/config.php";
$current = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar">
    <div class="nav-container">

        <!-- LOGO -->
        <div class="logo-group">
            <img src="<?= $base_url ?>/assets/image/Logo.png"
                class="logo-image" alt="Sumatropic">
            <span class="logo-text">SUMATROPIC</span>
        </div>

        <!-- MENU -->
        <div class="nav-links">
            <a href="/sumatropic/index.php" class="<?= str_contains($current, 'index.php') ? 'active' : '' ?>">Beranda</a>
            <a href="/sumatropic/pages/berita.php" class="<?= str_contains($current, 'berita.php') ? 'active' : '' ?>">Berita</a>
            <a href="/sumatropic/pages/flora.php" class="<?= str_contains($current, 'flora.php') ? 'active' : '' ?>">Flora</a>
            <a href="/sumatropic/pages/fauna.php" class="<?= str_contains($current, 'fauna.php') ? 'active' : '' ?>">Fauna</a>
        </div>

        <!-- AUTH -->
        <div class="auth-buttons">
            <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 'login'): ?>

                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="/sumatropic/admin/dashboard.php" class="btn-login">Dashboard</a>
                <?php endif; ?>

                <a href="/sumatropic/actions/logout.php" class="btn-register">Logout</a>

            <?php else: ?>
                <a href="/sumatropic/login_register.php" class="btn-login">Masuk</a>
                <a href="/sumatropic/login_register.php" class="btn-register">Daftar</a>
            <?php endif; ?>
        </div>

    </div>
</nav>