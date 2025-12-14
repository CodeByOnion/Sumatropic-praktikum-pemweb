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
</head>
<body>

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
                    <form id="donationForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Depan*</label>
                                <input type="text" id="input-fname" value="Latifanika" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang*</label>
                                <input type="text" id="input-lname" value="Nurafwi" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="email" id="input-email" value="latifanika.nurafwi@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" value="*********" required>
                            </div>
                        </div>
                        <button type="submit" class="submit-btn">Lanjut Pembayaran</button>
                    </form>
                </div>
            </div>
        </main>
        
        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-left">
                    Sumatropic
                </div>
                
                <div class="footer-center socials">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
                
                <div class="footer-right">
                    Sumatropic 2025. All right reserved
                </div>
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

                    <div class="method-item active">
                        <div class="method-header">
                            <div class="bank-logo bca">BCA</div> 
                            <span>BCA VIRTUAL ACCOUNT</span>
                            <span class="plus-icon">+</span>
                        </div>
                        <div class="method-content">
                            <div class="detail-row">
                                <span>No. Virtual Account</span>
                                <strong>8571234567890</strong>
                            </div>
                            <div class="detail-row">
                                <span>Total Tagihan</span>
                                <strong class="display-total-tagihan">Rp 0</strong>
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
                            <div class="detail-row">
                                <span>No. Virtual Account</span>
                                <strong>9981234567890</strong>
                            </div>
                            <div class="detail-row">
                                <span>Total Tagihan</span>
                                <strong class="display-total-tagihan">Rp 0</strong>
                            </div>
                        </div>
                    </div>

                    <div class="method-item">
                        <div class="method-header">
                            <div class="bank-logo qris">QRIS</div> 
                            <span>SCAN QRIS</span>
                            <span class="plus-icon">+</span>
                        </div>
                        <div class="method-content">
                            <div class="qr-area">
                                <i class="fa-solid fa-qrcode" style="font-size: 4rem;"></i>
                                <p>Scan kode di atas menggunakan e-wallet Anda</p>
                                <strong class="display-total-tagihan">Rp 0</strong>
                            </div>
                        </div>
                    </div>

                    <button class="btn-finish">Selesaikan Pembayaran</button>
                </div>
            </div>
            
            <footer class="site-footer">
                <div class="footer-container">
                    <div class="footer-left">
                        Sumatropic
                    </div>
                    
                    <div class="footer-center socials">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    
                    <div class="footer-right">
                        Sumatropic 2025. All right reserved
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div id="section-success">
        <div class="success-page-container">
            <div class="container success-content">
                
                <h1 class="success-title">TERIMA KASIH BANYAK ATAS DUKUNGANMU!</h1>
                
                <div class="success-card">
                    <p class="success-msg">Kami telah mengirim email konfirmasi pembayaran.</p>
                    
                    <p class="support-label">CARA LAIN MENDUKUNG KAMI</p>
                    
                    <div class="action-buttons">
                        <button class="btn-action">Menjadi Volunteer Bersama Kami</button>
                        <button class="btn-action">Adopsi Untuk Mendukung Kami</button>
                    </div>
                </div>

            </div>
        </div>

        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-left">
                    Sumatropic
                </div>
                
                <div class="footer-center socials">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
                
                <div class="footer-right">
                    Sumatropic 2025. All right reserved
                </div>
            </div>
        </footer>
    </div>

    <script>
        // --- VARIABLES ---
        let selectedAmount = 0;
        const amountBtns = document.querySelectorAll('.amount-btn');
        const customInput = document.getElementById('custom-amount');
        
        const sectionForm = document.getElementById('section-form');
        const sectionPayment = document.getElementById('section-payment');
        const sectionSuccess = document.getElementById('section-success');

        // --- 1. PILIH NOMINAL ---
        amountBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                amountBtns.forEach(b => b.classList.remove('selected'));
                btn.classList.add('selected');
                selectedAmount = parseInt(btn.getAttribute('data-value'));
                customInput.value = ""; 
            });
        });

        customInput.addEventListener('input', (e) => {
            amountBtns.forEach(b => b.classList.remove('selected'));
            selectedAmount = parseInt(e.target.value);
        });

        // --- 2. PINDAH HALAMAN 1 -> 2 ---
        document.getElementById('donationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!selectedAmount || selectedAmount < 10000) {
                alert("Mohon masukkan donasi minimal Rp 10.000");
                return;
            }

            // Ambil data
            const fname = document.getElementById('input-fname').value;
            const lname = document.getElementById('input-lname').value;
            const email = document.getElementById('input-email').value;
            const formattedMoney = "Rp " + selectedAmount.toLocaleString('id-ID');

            // Isi data ke halaman 2
            document.getElementById('disp-name').textContent = `: ${fname} ${lname}`;
            document.getElementById('disp-email').textContent = `: ${email}`;
            document.getElementById('disp-amount').textContent = `: ${formattedMoney}`;
            
            document.querySelectorAll('.display-total-tagihan').forEach(el => {
                el.textContent = formattedMoney;
            });

            // Ganti Tampilan
            sectionForm.style.display = 'none';
            sectionPayment.style.display = 'block';
            window.scrollTo(0,0);
        });

        // Tombol Kembali
        document.getElementById('btn-back').addEventListener('click', () => {
            sectionPayment.style.display = 'none';
            sectionForm.style.display = 'block';
        });

        // --- 3. ACCORDION LOGIC ---
        const methodHeaders = document.querySelectorAll('.method-header');
        methodHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const item = header.parentElement;
                // Tutup yang lain
                document.querySelectorAll('.method-item').forEach(i => {
                    if (i !== item) i.classList.remove('active');
                });
                // Toggle yang diklik
                item.classList.toggle('active');
            });
        });

        // --- 4. PINDAH HALAMAN 2 -> 3 (SUKSES) ---
        document.querySelector('.btn-finish').addEventListener('click', () => {
            sectionPayment.style.display = 'none';
            sectionSuccess.style.display = 'flex'; // Flex agar layout center vertikal
            window.scrollTo(0,0);
        });
    </script>
</body>
</html>