<?php
require_once __DIR__ . "/config.php";

$current = $_SERVER['REQUEST_URI'];
?>

<aside class="sidebar">
    <h2>
        SUMATROPIC <br>
        <small style="font-size:12px;">Admin Panel</small>
    </h2>

    <a href="<?= $base_url ?>/admin/dashboard.php"
        class="<?= str_contains($current, 'dashboard.php') ? 'active' : '' ?>">
        Dashboard
    </a>

    <a href="<?= $base_url ?>/admin/kelola_flora.php"
        class="<?= str_contains($current, 'kelola_flora.php') ? 'active' : '' ?>">
        Data Flora
    </a>

    <a href="<?= $base_url ?>/admin/kelola_fauna.php"
        class="<?= str_contains($current, 'kelola_fauna.php') ? 'active' : '' ?>">
        Data Fauna
    </a>

    <a href="<?= $base_url ?>/admin/kelola_berita.php"
        class="<?= str_contains($current, 'kelola_berita.php') ? 'active' : '' ?>">
        Data Berita
    </a>

    <a href="<?= $base_url ?>/admin/kelola_volunteer.php"
        class="<?= str_contains($current, 'kelola_volunteer.php') ? 'active' : '' ?>">
        Data Volunteer
    </a>

    <a href="<?= $base_url ?>/admin/data_donasi.php"
        class="<?= str_contains($current, 'data_donasi.php') ? 'active' : '' ?>">
        Data Donasi
    </a>

    <hr>

    <a href="<?= $base_url ?>/index.php">Lihat Website</a>

    <a href="<?= $base_url ?>/actions/logout.php" class="logout">
        Keluar
    </a>
</aside>