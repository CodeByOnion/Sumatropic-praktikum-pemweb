<?php
session_start();
require '../config/conncet.php';

// 1. Cek Admin (Logic Tetap)
if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login_register.php");
    exit;
}

// 2. Ambil Data (Logic Tetap)
$query = "SELECT * FROM volunteer ORDER BY id_volunteer DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            <h2>Kelola Volunteer</h2>

            <div class="top-bar">
                <a href="../actions/tambah_volunteer.php" class="btn-add">Tambah Volunteer</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th width="5%">Id</th>
                        <th width="20%">Judul Volunteer</th>
                        <th width="30%">Deskripsi</th>
                        <th width="15%">Email</th>
                        <th width="15%">No. Telepon</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
</body>

</html>