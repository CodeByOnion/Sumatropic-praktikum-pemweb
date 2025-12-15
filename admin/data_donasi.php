<?php
session_start();
require '../config/connect.php';

// 1. Cek Admin (Wajib)
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

// 2. Ambil Data Donasi (Urutkan dari yang terbaru)
$query = "SELECT * FROM donate ORDER BY tanggal_donasi DESC";
$result = mysqli_query($conn, $query); // Menggunakan mysqli_query agar konsisten
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Donasi - Admin</title>

    <link rel="stylesheet" href="../assets/css/styledashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Agar badge metode pembayaran terlihat rapi di background hijau */
        .badge-method {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            display: inline-block;
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        /* Agar nominal terlihat menonjol */
        .nominal-text {
            font-weight: bold;
            color: #a3e635;
            /* Hijau terang (Lime) agar kontras di bg hijau gelap */
            font-size: 1.1rem;
        }

        /* Foto Bukti Kecil */
        .img-thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: transform 0.2s;
        }

        .img-thumbnail:hover {
            transform: scale(1.5);
            /* Zoom saat hover */
            z-index: 10;
            position: relative;
            border-color: #fff;
        }
    </style>
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

            <h2>Data Masuk Donasi</h2>

            <div class="top-bar">
                <div style="color: #ddd; font-style: italic;">
                    Total Transaksi Masuk: <strong><?= mysqli_num_rows($result); ?></strong>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Tanggal & Waktu</th>
                        <th width="20%">Data Donatur</th>
                        <th width="15%">Nominal Donasi</th>
                        <th width="15%">Metode</th>
                        <th width="15%">Bukti Transfer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>0<?= $no++; ?></td>

                                <td style="font-size: 0.9rem; color: #eee;">
                                    <div style="font-weight: bold;"><?= date('d M Y', strtotime($row['tanggal_donasi'])); ?></div>
                                    <div style="font-size: 0.8rem; color: #bbb; margin-top: 4px;">
                                        <i class="far fa-clock"></i> <?= date('H:i', strtotime($row['tanggal_donasi'])); ?> WIB
                                    </div>
                                </td>

                                <td>
                                    <div style="font-weight: bold; font-size: 14px;"><?= htmlspecialchars($row['nama']); ?></div>
                                    <div style="font-style: italic; color: #bbb; font-size: 12px; margin-top: 2px;">
                                        <?= htmlspecialchars($row['email']); ?>
                                    </div>
                                </td>

                                <td class="nominal-text">
                                    Rp <?= number_format($row['jumlah_donasi'], 0, ',', '.'); ?>
                                </td>

                                <td>
                                    <span class="badge-method">
                                        <?= strtoupper($row['metode_pembayaran']); ?>
                                    </span>
                                </td>

                                <td>
                                    <?php if (!empty($row['gambar'])): ?>
                                        <a href="../uploads/bukti_donasi/<?= $row['gambar']; ?>" target="_blank" title="Klik untuk memperbesar">
                                            <img src="../uploads/bukti_donasi/<?= $row['gambar']; ?>" alt="Bukti TF" class="img-thumbnail">
                                        </a>
                                    <?php else: ?>
                                        <span style="color: #ccc; font-style: italic; font-size: 0.8rem;">(Tidak ada foto)</span>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: #ccc;">
                                <i class="fas fa-box-open" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
                                Belum ada data donasi yang masuk.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>