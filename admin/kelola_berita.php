<?php
session_start();
require '../config/connect.php';

// 1. Cek Admin (Logic Tetap)
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

// 2. Ambil Data (Logic Tetap)
$query = "SELECT * FROM news ORDER BY tanggal_tayang DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kelola Berita</title>
    <link rel="stylesheet" href="../assets/css/styledashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <aside class="sidebar">
        <h2>SUMATROPIC <br><small style="font-size: 12px;">Admin Panel</small></h2>
        <a href="../admin/dashboard.php">Dashboard</a>
        <a href="../admin/kelola_flora.php">Data Flora</a>
        <a href="../admin/kelola_fauna.php">Data Fauna</a>
        <a href="../admin/kelola_berita.php" style="background-color: #34495e;">Data Berita</a>
        <a href="../admin/kelola_volunteer.php">Verifikasi Volunteer</a>

        <a href="../actions/logout.php" class="logout">Keluar</a>
    </aside>

    <div class="container">

        <div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
            <div style="font-weight: bold; color: #2e4a1c; font-size: 18px;">
                <i class="fas fa-user-circle" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></i>
                Admin
            </div>
        </div>

        <div class="table-wrapper">

            <h2>Kelola Berita</h2>

            <div class="top-bar">
                <a href="../actions/tambah_berita.php" class="btn-add">Tambah Konten</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th width="5%">Id</th>
                        <th width="20%">Judul Berita</th>
                        <th width="30%">Deskripsi</th>
                        <th width="15%">Url Sumber</th>
                        <th width="15%">Tanggal Rilis</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>0<?= $no++; ?></td>

                            <td style="font-weight: bold;"><?= $row['judul']; ?></td>

                            <td style="font-size: 11px; line-height: 1.4; color: #ddd;">
                                <?= substr($row['deskripsi_singkat'], 0, 120); ?>...
                            </td>

                            <td>
                                <a href="<?= $row['url_sumber']; ?>" target="_blank" class="source-link">
                                    <?= substr($row['url_sumber'], 0, 20); ?>...
                                </a>
                            </td>

                            <td><?= date('d F Y', strtotime($row['tanggal_tayang'])); ?></td>

                            <td>
                                <a href="../actions/tambah_berita.php?id=<?= $row['id']; ?>" class="btn-edit">Ubah</a>
                                <a href="../actions/tambah_berita.php?hapus=<?= $row['id']; ?>"
                                    onclick="return confirm('Hapus berita ini?');"
                                    class="btn-delete">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>