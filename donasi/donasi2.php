<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Donasi Badak Sumatra</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styledonasi2.css">
</head>
<body>

    <div class="landing-page-container">
        
        <nav class="navbar">
            <div class="nav-container">
                <div class="logo-group">
                    <img src="../assets/image/Logo.png" alt="SUMATROPIC" class="logo-image">
                    <span class="logo-text">SUMATROPIC</span>
                </div>

                <div class="nav-links">
                    <a href="#">Beranda</a>
                    <a href="#">Berita</a>
                    <a href="#">Flora</a>
                    <a href="#">Fauna</a>
                </div>

                <div class="nav-right">
                    <div class="auth-buttons">
                        <a href="#" class="btn-login">Masuk</a>
                        <a href="#" class="btn-register">Daftar</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="hero" style="background-image: url('../assets/image/donasi.jpg');"> 
            <div class="hero-overlay"></div> 
            
            <div class="hero-content">
                <span class="subtitle">SPOTLIGHT ON</span>
                <h1>BADAK<br>SUMATRA</h1>
                <p class="description">the smallest and hairiest species<br>of rhino</p>
            </div>
        </header>

        <section class="title-strip">
            <div class="container">
                <div class="breadcrumb">Beranda > Donasi</div>
                <h2>Donasi</h2>
                <p class="strip-subtitle">Salurkan kepedulianmu hari ini untuk menyelamatkan spesies yang terancam punah, memulihkan habitat yang rapuh, dan menjaga paru-paru dunia demi generasi masa depan.</p>
            </div>
        </section>
    </div>

    <div class="payment-page-container">
        
        <div class="payment-wrapper">
            <div class="payment-info">
                <h2>Detail Pembayaran</h2>
                <div class="info-grid">
                    <div class="label">Nama Depan</div>
                    <div class="value">: Latifanika</div>
                    
                    <div class="label">Nama Belakang</div>
                    <div class="value">: Nurafwi</div>
                    
                    <div class="label">Email</div>
                    <div class="value">: latifanika.nurafwi@gmail.com</div>
                    
                    <div class="label">Jumlah Donasi</div>
                    <div class="value">: Rp300.000</div>
                </div>
            </div>

            <div class="payment-methods-box">
                <h2 class="method-title">Cara Pembayaran</h2>

                <div class="method-item active">
                    <div class="method-header">
                        <div class="bank-logo bca">BCA</div> 
                        <span>BCA VIRTUAL ACCOUNT</span>
                        <span class="plus-icon">+</span>
                    </div>
                    <div class="method-content">
                        <div class="bank-details-grid">
                            <div class="detail-row">
                                <span>Rekening Virtual</span>
                                <span>8571234567890</span>
                            </div>
                            <div class="detail-row">
                                <span>Pemilik Rekening</span>
                                <span>SUMATROPIC Foundation</span>
                            </div>
                            <div class="detail-row">
                                <span>Jumlah Pembayaran</span>
                                <span>Rp 100.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="method-item">
                    <div class="method-header">
                        <div class="bank-logo bni">BNI</div> 
                        <span>BNI VIRTUAL ACCOUNT</span>
                        <span class="plus-icon">+</span>
                    </div>
                    <div class="method-content">
                        <div class="bank-details-grid">
                            <div class="detail-row">
                                <span>Rekening Virtual</span>
                                <span>123456789012</span>
                            </div>
                            <div class="detail-row">
                                <span>Pemilik Rekening</span>
                                <span>SUMATROPIC Foundation</span>
                            </div>
                            <div class="detail-row">
                                <span>Jumlah Pembayaran</span>
                                <span>Rp 100.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="method-item">
                    <div class="method-header">
                        <div class="bank-logo qris">QRIS</div> 
                        <span>QRIS</span>
                        <span class="plus-icon">+</span>
                    </div>
                    <div class="method-content">
                        <div class="qr-details">
                            <div class="qr-code-placeholder">
                                <i class="fa-solid fa-qrcode"></i>
                            </div>
                            <div class="qr-text">
                                <strong>QRIS</strong>
                                <div class="qr-row">
                                    <span>Pemilik Akun</span>
                                    <span>Jumlah Pembayaran</span>
                                </div>
                                <div class="qr-row">
                                    <span>SUMATROPIC Foundation</span>
                                    <span>Rp 100.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn-finish">Finish</button>
            </div>
        </div>

        <footer class="footer">
            <div class="footer-left">Sumatropic</div>
            <div class="footer-center">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-tiktok"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-youtube"></i>
            </div>
            <div class="footer-right">Sumatropic 2025. All right reserved</div>
        </footer>
    </div>

    <script>
    // 1. Definisikan/Pilih elemennya terlebih dahulu
    const methodHeaders = document.querySelectorAll('.method-header');

    methodHeaders.forEach(header => {
        header.addEventListener('click', () => {
            // Ambil parent element (.method-item) dari header yang diklik
            const currentItem = header.parentElement;
            
            // LOGIKA ACCORDION (Hanya satu yang terbuka dalam satu waktu)
            // Loop semua item untuk menutup yang lain
            document.querySelectorAll('.method-item').forEach(item => {
                // Jika item ini bukan yang sedang diklik, hapus class 'active'
                if (item !== currentItem) {
                    item.classList.remove('active');
                }
            });

            // Toggle class 'active' pada item yang diklik (buka/tutup)
            currentItem.classList.toggle('active');
        });
    });
</script>

</body>
</html>