<?php
session_start();
require '../config/connect.php';

// Cek Admin
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

// QUERY: Ambil data dari tabel FLORA
$query = "SELECT * FROM flora ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kelola Flora</title>
    <link rel="stylesheet" href="../assets/css/styledashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php require_once "../template/sidebar_admin.php"; ?>


    <div class="container">

        <div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
            <div style="font-weight: bold; color: #2e4a1c; font-size: 18px;">
                <i class="fas fa-user-circle" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></i>
                Admin
            </div>
        </div>

        <div class="table-wrapper">

            <h2>Kelola Data Flora</h2>

            <div class="top-bar">
                <a href="../actions/tambah_flora.php" class="btn-add">Tambah Flora</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Foto</th>
                        <th width="20%">Nama</th>
                        <th width="30%">Deskripsi</th>
                        <th width="20%">Info (Asal & Status)</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>0<?= $no++; ?></td>
                            <td>
                                <img src="../uploads/flora/<?= $row['gambar']; ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td>
                                <div style="font-weight: bold; font-size: 14px;"><?= $row['nama_lokal']; ?></div>
                                <div style="font-style: italic; color: #ddd; font-size: 12px;"><?= $row['nama_ilmiah']; ?></div>
                            </td>
                            <td style="font-size: 11px; line-height: 1.4; color: #eee;">
                                <?= substr($row['deskripsi'], 0, 80); ?>...
                            </td>
                            <td style="font-size: 12px;">
                                <div><i class="fas fa-map-marker-alt"></i> <?= $row['asal_provinsi']; ?></div>
                                <div style="margin-top: 5px; background: rgba(255,255,255,0.2); padding: 2px 8px; border-radius: 10px; display: inline-block;">
                                    <?= $row['status_konservasi']; ?>
                                </div>
                            </td>
                            <td>
                                <a href="../actions/tambah_flora.php?id=<?= $row['id']; ?>" class="btn-edit">Ubah</a>
                                <a href="../actions/tambah_flora.php?hapus=<?= $row['id']; ?>"
                                    onclick="return confirm('Hapus data ini?');"
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