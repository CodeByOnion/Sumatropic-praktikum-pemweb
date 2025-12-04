<?php
session_start();
require '../config/connect.php';

// Cek Admin
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

// QUERY BARU: Tabel florafauna
$query = "SELECT * FROM florafauna ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kelola Data</title>
</head>

<body>

    <div class="container">
        <a href="dashboard.php">← Kembali</a>
        <h2>Kelola Data Flora & Fauna</h2>
        <a href="tambah_flora_fauna.php">+ Tambah Data</a>

        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Status Konservasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <img src="../uploads/<?= $row['kategori']; ?>/<?= $row['gambar']; ?>" width="80">
                        </td>
                        <td>
                            <b><?= $row['nama_lokal']; ?></b><br>
                            <i><?= $row['nama_ilmiah']; ?></i>
                        </td>
                        <td><?= $row['kategori']; ?></td>
                        <td><?= $row['status_konservasi']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                            <a href="../actions/hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>