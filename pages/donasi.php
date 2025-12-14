<?php
session_start();
require '../config/connect.php';

// --- LOGIC PHP: PROSES DONASI ---
$success_msg = false;
$error_msg = "";

if (isset($_POST['selesaikan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];

    // Upload Gambar Bukti
    $gambar = "";
    if ($_FILES['bukti']['name'] != "") {
        $nama_file = $_FILES['bukti']['name'];
        $tmp_file = $_FILES['bukti']['tmp_name'];
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
        $nama_baru = uniqid() . "_bukti." . $ext;
        $tujuan = "../uploads/bukti_donasi/" . $nama_baru;

        // Buat folder jika belum ada
        if (!is_dir("../uploads/bukti_donasi/")) {
            mkdir("../uploads/bukti_donasi/", 0777, true);
        }

        if (move_uploaded_file($tmp_file, $tujuan)) {
            $gambar = $nama_baru;
        }
    }

    // Insert ke Database
    $query = "INSERT INTO donate (nama, email, jumlah_donasi, metode_pembayaran, gambar) 
              VALUES ('$nama', '$email', '$nominal', '$metode', '$gambar')";

    if (mysqli_query($conn, $query)) {
        $success_msg = true;
    } else {
        $error_msg = "Gagal memproses donasi: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi - Sumatropic</title>
    <link rel="stylesheet" href="../assets/css/stylenavbar.css">
</head>

<body>
    <?php require_once "../template/navbar.php"; ?>

    <hr>

    <div class="main-container">

        <?php if ($success_msg): ?>

            <div class="success-message-box">
                <h2>Terima Kasih!</h2>
                <p>Donasi Anda telah berhasil kami terima.</p>
                <p>Dukungan Anda sangat berarti bagi kelestarian alam Sumatra.</p>
                <a href="../index.php" class="btn btn-primary">Kembali ke Beranda</a>
            </div>

        <?php else: ?>

            <div class="donation-form-wrapper">

                <?php if ($error_msg): ?>
                    <p style="color: red;"><?= $error_msg; ?></p>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data" id="formDonasi">

                    <div id="step1" class="form-step">
                        <h3>Langkah 1: Data Donatur</h3>

                        <div class="form-group">
                            <label for="inputNama">Nama Lengkap:</label><br>
                            <input type="text" name="nama" id="inputNama" class="form-control" placeholder="Nama Anda" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="inputEmail">Email:</label><br>
                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="email@contoh.com" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="inputNominal">Nominal Donasi (Rp):</label><br>
                            <input type="number" name="nominal" id="inputNominal" class="form-control" placeholder="50000" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="inputMetode">Metode Pembayaran:</label><br>
                            <select name="metode" id="inputMetode" class="form-control">
                                <option value="qris">QRIS (Scan Barcode)</option>
                                <option value="bca">Bank BCA</option>
                                <option value="bri">Bank BRI</option>
                                <option value="mandiri">Bank Mandiri</option>
                            </select>
                        </div>
                        <br>

                        <button type="button" onclick="lanjutPembayaran()" class="btn btn-next">Lanjut Pembayaran &rarr;</button>
                    </div>

                    <div id="step2" class="form-step" style="display: none;">
                        <h3>Langkah 2: Pembayaran</h3>

                        <div id="infoBayar" class="payment-info-box" style="border: 1px solid black; padding: 10px; margin-bottom: 20px;">
                        </div>

                        <div class="form-group">
                            <label for="inputBukti">Upload Bukti Transfer:</label><br>
                            <input type="file" name="bukti" id="inputBukti" class="form-control-file" accept="image/*" required>
                        </div>
                        <br>

                        <div class="button-group">
                            <button type="submit" name="selesaikan" class="btn btn-submit">Selesaikan Donasi</button>
                            <button type="button" onclick="kembaliKeStep1()" class="btn btn-back">Kembali</button>
                        </div>
                    </div>

                </form>
            </div>

        <?php endif; ?>

    </div>

    <script src="../assets/js/donasi.js"></script>
</body>

</html>