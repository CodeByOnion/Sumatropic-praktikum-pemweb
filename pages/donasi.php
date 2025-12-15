<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header("Location: ../login_register.php");
    exit;
}
require '../config/connect.php';

// --- LOGIC PHP: PROSES DONASI ---
$success_msg = false;
$error_msg = "";

if (isset($_POST['selesaikan'])) {
    // 1. Ambil & Bersihkan Data
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nominal = $_POST['nominal']; // Angka (integer)
    $metode = $_POST['metode'];

    // 2. Logic Upload Gambar
    $gambar = "";

    // Cek apakah ada file yang dikirim
    if (isset($_FILES['bukti']) && $_FILES['bukti']['name'] != "") {
        $nama_file = $_FILES['bukti']['name'];
        $tmp_file = $_FILES['bukti']['tmp_name'];
        $ukuran_file = $_FILES['bukti']['size'];
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);

        // [SECURITY] Validasi Ekstensi File di Server
        $allowed_ext = ['jpg', 'jpeg', 'png', 'heic'];

        if (in_array(strtolower($ext), $allowed_ext)) {
            // [SECURITY] Cek Ukuran File (Backup Server Side Max 5MB)
            if ($ukuran_file <= 5000000) {
                // Rename file agar unik (mencegah bentrok nama)
                $nama_baru = uniqid() . "_bukti." . $ext;
                $tujuan = "../uploads/bukti_donasi/" . $nama_baru;

                // Buat folder otomatis jika belum ada
                if (!is_dir("../uploads/bukti_donasi/")) {
                    mkdir("../uploads/bukti_donasi/", 0777, true);
                }

                // Pindahkan file
                if (move_uploaded_file($tmp_file, $tujuan)) {
                    $gambar = $nama_baru;
                }
            } else {
                $error_msg = "Gagal: Ukuran file terlalu besar (Max 5MB).";
            }
        } else {
            $error_msg = "Gagal: Format file tidak valid. Harap upload JPG atau PNG.";
        }
    }

    // 3. Insert ke Database (Hanya jika tidak ada error upload)
    if ($error_msg == "") {
        $query = "INSERT INTO donate (nama, email, jumlah_donasi, metode_pembayaran, gambar) 
                  VALUES ('$nama', '$email', '$nominal', '$metode', '$gambar')";

        if (mysqli_query($conn, $query)) {
            $success_msg = true;
        } else {
            $error_msg = "Terjadi kesalahan database: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Donasi Badak Sumatra</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/styledonasi1.css">
    <link rel="stylesheet" href="../assets/css/stylenavbar.css">

    <style>
        /* Sembunyikan form asli (Hidden Form) karena kita pakai JS Bridge */
        #realForm {
            display: none;
        }

        /* --- LOGIC TAMPILAN (State Management via PHP) --- */
        <?php if ($success_msg): ?>

        /* Jika Sukses: Sembunyikan Form, Munculkan Pesan Sukses */
        #section-form,
        #section-payment {
            display: none !important;
        }

        #section-success {
            display: flex !important;
        }

        <?php else: ?>

        /* Default: Tampilkan Form Awal */
        #section-success {
            display: none;
        }

        #section-payment {
            display: none;
        }

        #section-form {
            display: block;
        }

        <?php endif; ?>

        /* --- CSS UI UPLOAD --- */
        .upload-area-wrapper {
            margin: 25px 0;
            text-align: center;
        }

        .upload-label {
            display: block;
            font-weight: 700;
            margin-bottom: 12px;
            color: #2F4F28;
            text-align: left;
            font-size: 1.1rem;
        }

        .upload-box-ui {
            border: 2px dashed #ccc;
            padding: 30px;
            border-radius: 10px;
            cursor: pointer;
            background: #fdfdfd;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #666;
        }

        .upload-box-ui:hover {
            border-color: #27ae60;
            background: #eafaf1;
            color: #27ae60;
        }

        .upload-box-ui i {
            font-size: 32px;
            margin-bottom: 5px;
        }

        .file-name-display {
            font-size: 14px;
            color: #27ae60;
            font-weight: bold;
            margin-top: 5px;
        }

        /* --- CSS BUTTON LOADING --- */
        .btn-finish:disabled {
            background-color: #999;
            cursor: not-allowed;
            opacity: 0.7;
        }
    </style>
</head>

<body>

    <?php require_once "../template/navbar.php"; ?>

    <?php if ($error_msg): ?>
        <div style="background: #ffebee; color: #c62828; padding: 15px; text-align: center; font-weight: bold; margin-bottom: 20px; border-bottom: 1px solid #ef9a9a;">
            <i class="fas fa-exclamation-circle"></i> <?= $error_msg; ?>
        </div>
    <?php endif; ?>

    <div id="section-form">
        <header class="hero" style="background-image: url('../assets/image/donasi.jpg');">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <span class="subtitle">SPOTLIGHT ON</span>
                <h1>BADAK<br>SUMATRA</h1>
                <p class="description">The smallest and hairiest species of rhino. Help us protect them before it's too late.</p>
            </div>
        </header>

        <section class="green-strip-banner">
            <div class="breadcrumb">Beranda > Donasi</div>
            <h2>Donasi</h2>
            <p>Help protect and restore nature near you, connect to our conservation work and build community.</p>
        </section>

        <main class="main-content">
            <div class="container">
                <div class="intro-text">
                    <h2 class="intro-title">Donasi</h2>
                    <p>Ancaman deforestasi dan perburuan liar bergerak lebih cepat dari kemampuan alam memulihkan diri.</p>
                    <p>Kami membutuhkan bantuanmu sekarang. Setiap Rupiah yang kamu donasikan akan langsung digunakan untuk aksi nyata.</p>
                </div>

                <div class="donation-card">
                    <h3 class="card-title">Jumlah Donasi</h3>

                    <div class="amount-grid">
                        <button type="button" class="amount-btn" data-value="100000">Rp100.000</button>
                        <button type="button" class="amount-btn" data-value="250000">Rp250.000</button>
                        <button type="button" class="amount-btn" data-value="500000">Rp500.000</button>
                        <button type="button" class="amount-btn" data-value="1000000">Rp1.000.000</button>
                        <button type="button" class="amount-btn" data-value="1500000">Rp1.500.000</button>
                    </div>

                    <div class="custom-amount-wrapper">
                        <input type="number" id="custom-amount" class="custom-amount-input" placeholder="Masukan jumlah lain (Min Rp 10.000)">
                    </div>

                    <h3 class="card-title mt-large">Saya Berdonasi Atas</h3>

                    <form id="donationFormUI">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Depan*</label>
                                <input type="text" id="input-fname" placeholder="Nama Depan" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang*</label>
                                <input type="text" id="input-lname" placeholder="Nama Belakang" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="width: 100%;">
                                <label>Email*</label>
                                <input type="email" id="input-email" placeholder="email@contoh.com" required>
                            </div>
                        </div>
                        <button type="submit" class="submit-btn">Lanjut Pembayaran</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-left">Sumatropic</div>
                <div class="footer-right">Sumatropic 2025. All right reserved</div>
            </div>
        </footer>
    </div>

    <div id="section-payment">
        <section class="green-strip-banner small">
            <div class="breadcrumb">Beranda > Donasi > Pembayaran</div>
            <h2>Selesaikan Pembayaran</h2>
        </section>

        <div class="payment-page-container">
            <div class="payment-wrapper">

                <div class="payment-info-box">
                    <h3>Ringkasan Donasi</h3>
                    <div class="info-grid">
                        <div class="label">Nama</div>
                        <div class="value" id="disp-name">-</div>
                        <div class="label">Email</div>
                        <div class="value" id="disp-email">-</div>
                        <div class="label">Total Donasi</div>
                        <div class="value total-highlight" id="disp-amount">Rp 0</div>
                    </div>
                    <button id="btn-back" class="text-link">&larr; Kembali Edit Data</button>
                </div>

                <div class="payment-methods-box">
                    <h2 class="method-title">Cara Pembayaran</h2>

                    <div class="method-item active" data-method="BCA">
                        <div class="method-header">
                            <div class="bank-logo bca">BCA</div>
                            <span>BCA VIRTUAL ACCOUNT</span> <span class="plus-icon">+</span>
                        </div>
                        <div class="method-content">
                            <div class="detail-row"><span>No. Virtual Account</span> <strong>8571234567890</strong></div>
                            <div class="detail-row"><span>Total Tagihan</span> <strong class="display-total-tagihan">Rp 0</strong></div>
                        </div>
                    </div>

                    <div class="method-item" data-method="BNI">
                        <div class="method-header">
                            <div class="bank-logo bni">BNI</div>
                            <span>BNI VIRTUAL ACCOUNT</span> <span class="plus-icon">+</span>
                        </div>
                        <div class="method-content">
                            <div class="detail-row"><span>No. Virtual Account</span> <strong>9981234567890</strong></div>
                            <div class="detail-row"><span>Total Tagihan</span> <strong class="display-total-tagihan">Rp 0</strong></div>
                        </div>
                    </div>

                    <div class="method-item" data-method="QRIS">
                        <div class="method-header">
                            <div class="bank-logo qris">QRIS</div>
                            <span>SCAN QRIS</span> <span class="plus-icon">+</span>
                        </div>
                        <div class="method-content">
                            <div class="qr-area">
                                <i class="fa-solid fa-qrcode" style="font-size: 4rem;"></i>
                                <p>Scan kode di atas menggunakan e-wallet Anda</p>
                                <strong class="display-total-tagihan">Rp 0</strong>
                            </div>
                        </div>
                    </div>

                    <div class="upload-area-wrapper">
                        <span class="upload-label">Bukti Pembayaran (Wajib)</span>
                        <div class="upload-box-ui" id="trigger-upload-btn">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span id="text-upload-status">Klik untuk upload foto bukti transfer</span>
                            <div class="file-name-display" id="file-name-show"></div>
                        </div>
                    </div>

                    <button class="btn-finish" id="btn-finish-payment">Selesaikan Pembayaran</button>
                </div>
            </div>

            <footer class="site-footer">
                <div class="footer-container">
                    <div class="footer-left">Sumatropic</div>
                    <div class="footer-right">Sumatropic 2025. All right reserved</div>
                </div>
            </footer>
        </div>
    </div>

    <div id="section-success">
        <div class="success-page-container">
            <div class="container success-content">
                <h1 class="success-title">TERIMA KASIH BANYAK ATAS DUKUNGANMU!</h1>
                <div class="success-card">
                    <p class="success-msg">Kami telah mencatat donasi Anda. Terima kasih telah menjadi pahlawan bagi alam Sumatra.</p>
                    <p class="support-label">CARA LAIN MENDUKUNG KAMI</p>
                    <div class="action-buttons">
                        <button class="btn-action">Menjadi Volunteer Bersama Kami</button>
                        <button class="btn-action">Adopsi Untuk Mendukung Kami</button>
                    </div>
                    <br>
                    <a href="../index.php" style="color: #27ae60; text-decoration: none;">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-left">Sumatropic</div>
                <div class="footer-right">Sumatropic 2025. All right reserved</div>
            </div>
        </footer>
    </div>

    <form id="realForm" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="nama" id="hidden-nama">
        <input type="hidden" name="email" id="hidden-email">
        <input type="hidden" name="nominal" id="hidden-nominal">
        <input type="hidden" name="metode" id="hidden-metode">
        <input type="hidden" name="selesaikan" value="1">

        <input type="file" name="bukti" id="hidden-file-input" accept="image/*" style="display: none;">
    </form>

    <script>
        // --- VARIABLES ---
        let selectedAmount = 0;
        let selectedMethod = "BCA";

        const amountBtns = document.querySelectorAll('.amount-btn');
        const customInput = document.getElementById('custom-amount');
        const sectionForm = document.getElementById('section-form');
        const sectionPayment = document.getElementById('section-payment');
        const triggerUploadBtn = document.getElementById('trigger-upload-btn');
        const hiddenFileInput = document.getElementById('hidden-file-input');
        const fileNameShow = document.getElementById('file-name-show');
        const textUploadStatus = document.getElementById('text-upload-status');
        const btnFinish = document.getElementById('btn-finish-payment');

        // --- 1. LOGIC PILIH NOMINAL ---
        amountBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                amountBtns.forEach(b => b.classList.remove('selected'));
                btn.classList.add('selected');
                selectedAmount = parseInt(btn.getAttribute('data-value'));
                customInput.value = ""; // Reset custom input
            });
        });

        customInput.addEventListener('input', (e) => {
            amountBtns.forEach(b => b.classList.remove('selected'));
            selectedAmount = parseInt(e.target.value) || 0;
        });

        // --- 2. TRANSISI LANGKAH 1 -> 2 ---
        document.getElementById('donationFormUI').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validasi Minimal
            if (!selectedAmount || selectedAmount < 10000) {
                alert("Mohon masukkan donasi minimal Rp 10.000");
                return;
            }

            // Ambil Data dari Form UI
            const fname = document.getElementById('input-fname').value;
            const lname = document.getElementById('input-lname').value;
            const email = document.getElementById('input-email').value;

            // Format Rupiah
            const formattedMoney = "Rp " + selectedAmount.toLocaleString('id-ID');

            // Isi Data ke Tampilan Langkah 2
            document.getElementById('disp-name').textContent = `: ${fname} ${lname}`;
            document.getElementById('disp-email').textContent = `: ${email}`;
            document.getElementById('disp-amount').textContent = `: ${formattedMoney}`;

            // Update semua display tagihan
            document.querySelectorAll('.display-total-tagihan').forEach(el => el.textContent = formattedMoney);

            // Ganti Halaman
            sectionForm.style.display = 'none';
            sectionPayment.style.display = 'block';
            window.scrollTo(0, 0);
        });

        // Tombol Kembali
        document.getElementById('btn-back').addEventListener('click', () => {
            sectionPayment.style.display = 'none';
            sectionForm.style.display = 'block';
        });

        // --- 3. PILIH METODE BAYAR ---
        const methodItems = document.querySelectorAll('.method-item');
        methodItems.forEach(item => {
            const header = item.querySelector('.method-header');
            header.addEventListener('click', () => {
                methodItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                selectedMethod = item.getAttribute('data-method');
            });
        });

        // --- 4. LOGIC UPLOAD GAMBAR (DENGAN CEK 5MB) ---
        triggerUploadBtn.addEventListener('click', () => hiddenFileInput.click());

        hiddenFileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const myFile = this.files[0];
                const sizeInMB = myFile.size / 1024 / 1024; // Byte -> MB

                // CEK UKURAN: Maksimal 5MB
                if (sizeInMB > 5) {
                    alert("Maaf, ukuran file terlalu besar (Max 5MB). Silakan pilih foto lain atau kompres dulu.");
                    this.value = ""; // Batalkan upload

                    // Reset UI
                    fileNameShow.textContent = "";
                    textUploadStatus.style.display = 'block';
                    triggerUploadBtn.style.borderColor = '#ccc';
                    triggerUploadBtn.style.backgroundColor = '#fdfdfd';
                    return;
                }

                // JIKA VALID
                fileNameShow.textContent = "File terpilih: " + myFile.name + " (" + sizeInMB.toFixed(2) + " MB)";
                textUploadStatus.style.display = 'none';
                triggerUploadBtn.style.borderColor = '#27ae60';
                triggerUploadBtn.style.backgroundColor = '#eafaf1';

            } else {
                fileNameShow.textContent = "";
                textUploadStatus.style.display = 'block';
            }
        });

        // --- 5. SUBMIT FINAL KE SERVER ---
        btnFinish.addEventListener('click', () => {
            // Validasi: Wajib Upload
            if (hiddenFileInput.files.length === 0) {
                alert("Mohon upload bukti pembayaran terlebih dahulu!");
                return;
            }

            // UX: Kunci tombol (Loading State) agar tidak klik ganda
            btnFinish.textContent = "Sedang Memproses...";
            btnFinish.disabled = true;
            btnFinish.style.backgroundColor = "#999";

            // Siapkan Data untuk Hidden Form
            const fname = document.getElementById('input-fname').value;
            const lname = document.getElementById('input-lname').value;
            const fullName = fname + " " + lname;
            const email = document.getElementById('input-email').value;

            document.getElementById('hidden-nama').value = fullName;
            document.getElementById('hidden-email').value = email;
            document.getElementById('hidden-nominal').value = selectedAmount;
            document.getElementById('hidden-metode').value = selectedMethod;

            // KIRIM FORM ASLI!
            document.getElementById('realForm').submit();
        });
    </script>
</body>

</html>