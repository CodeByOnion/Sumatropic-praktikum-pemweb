<?php
session_start();
require '../config/connect.php';

if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM volunteers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Volunteer</title>
    <link rel="stylesheet" href="../assets/css/styledashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php require_once "../template/sidebar_admin.php"; ?>

    <div class="container">

        <div style="display:flex; justify-content:flex-end; margin-bottom:20px;">
            <b>Admin</b>
        </div>

        <div class="table-wrapper">

            <h2>Kelola Volunteer</h2>

            <div class="top-bar">
                <a href="../actions/tambah_volunteer.php" class="btn-add">Tambah Volunteer</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Judul</th>
                        <th width="30%">Deskripsi</th>
                        <th width="15%">URL</th>
                        <th width="15%">Cover</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>0<?= $no++; ?></td>

                            <td><b><?= $row['judul']; ?></b></td>

                            <td><?= substr($row['deskripsi_singkat'], 0, 100); ?>...</td>

                            <td>
                                <a href="<?= $row['url_sumber']; ?>" target="_blank" class="source-link">
                                    Sumber
                                </a>
                            </td>

                            <td>
                                <?php if ($row['gambar']): ?>
                                    <img src="../uploads/volunteer/<?= $row['gambar']; ?>">
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="../actions/tambah_volunteer.php?id=<?= $row['id']; ?>" class="btn-edit">Ubah</a>
                                <a href="../actions/tambah_volunteer.php?hapus=<?= $row['id']; ?>"
                                    onclick="return confirm('Hapus data ini?');"
                                    class="btn-delete">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
</body>

</html>