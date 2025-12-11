<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Pembayaran</title>
    <link rel="stylesheet" href="../assets/css/styleadopsi3.css">
</head>
<body>

    <div class="container">
        
        <div class="summary-section">
            <div class="summary-row"><span class="label">Nama</span><span class="separator">:</span><span class="value">Latifanika Nurafwi</span></div>
            <div class="summary-row"><span class="label">Email</span><span class="separator">:</span><span class="value">latifanika.nurafwi@gmail.com</span></div>
            <div class="summary-row"><span class="label">Lama Adopsi</span><span class="separator">:</span><span class="value">1 Bulan</span></div>
            <div class="summary-row"><span class="label">Mata Uang</span><span class="separator">:</span><span class="value">IDR</span></div>
            <div class="summary-row"><span class="label">Jumlah</span><span class="separator">:</span><span class="value">100000</span></div>
        </div>

        <div class="payment-card">
            <h2 class="payment-title">Cara Pembayaran</h2>

            <div class="payment-option" onclick="toggleOption(this)">
                <div class="option-header">
                    <div class="bank-logo bca">BCA</div>
                    <span class="bank-name">BCA VIRTUAL ACCOUNT</span>
                    <i class="fas fa-plus icon-plus"></i>
                </div>
                <div class="option-body bank-details">
                    <div class="bank-info-header">
                        <div class="bank-logo bca small">BCA</div>
                        <span class="bank-label">BCA</span>
                    </div>
                    <div class="va-details-grid">
                        <div class="va-item">
                            <span class="va-label">Rekening Virtual</span>
                            <span class="va-value">8571234567890</span>
                        </div>
                        <div class="va-item">
                            <span class="va-label">Pemilik Rekening</span>
                            <span class="va-value">SUMATROPIC Foundation</span>
                        </div>
                        <div class="va-item">
                            <span class="va-label">Jumlah Pembayaran</span>
                            <span class="va-value">Rp 100.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="payment-option" onclick="toggleOption(this)">
                <div class="option-header">
                    <div class="bank-logo bni">BNI</div>
                    <span class="bank-name">BNI VIRTUAL ACCOUNT</span>
                    <i class="fas fa-plus icon-plus"></i>
                </div>
                <div class="option-body bank-details">
                    <div class="bank-info-header">
                        <div class="bank-logo bni small">BNI</div>
                        <span class="bank-label">BNI</span>
                    </div>
                    <div class="va-details-grid">
                        <div class="va-item">
                            <span class="va-label">Rekening Virtual</span>
                            <span class="va-value">9881234567890</span>
                        </div>
                        <div class="va-item">
                            <span class="va-label">Pemilik Rekening</span>
                            <span class="va-value">SUMATROPIC Foundation</span>
                        </div>
                        <div class="va-item">
                            <span class="va-label">Jumlah Pembayaran</span>
                            <span class="va-value">Rp 100.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="payment-option" onclick="toggleOption(this)">
                <div class="option-header">
                    <div class="cc-logos">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <span class="atm-text">ATM Bersama</span>
                    </div>
                    <span class="bank-name">KARTU KREDIT</span>
                    <i class="fas fa-plus icon-plus"></i>
                </div>
                <div class="option-body cc-form">
                    <div class="form-grid-2">
                        <div class="form-group"><label>CARD NUMBER*</label><input type="text" placeholder="Masukkan di sini...."></div>
                        <div class="form-group"><label>CARD OWNER*</label><input type="text" placeholder="Masukkan di sini...."></div>
                    </div>
                    <div class="form-grid-3">
                        <div class="form-group"><label>EXPIRY MONTH*</label><input type="text" placeholder="Masukkan di sini...."></div>
                        <div class="form-group"><label>EXPIRY YEAR*</label><input type="text" placeholder="Masukkan di sini...."></div>
                        <div class="form-group"><label>CVV*</label><input type="text" placeholder="Masukkan di sini...."></div>
                    </div>
                </div>
            </div>

            <button class="finish-btn">Finish</button>

        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">Sumatropic</div>
            <div class="socials">
                <i class="fab fa-instagram"></i><i class="fab fa-twitter"></i><i class="fab fa-tiktok"></i><i class="fab fa-facebook-f"></i><i class="fab fa-youtube"></i>
            </div>
            <div class="copyright">Sumatropic 2025. All right reserved</div>
        </div>
    </footer>

    <script>
        function toggleOption(element) {
            // Tutup semua opsi dulu
            const allOptions = document.querySelectorAll('.payment-option');
            
            // Cek apakah elemen yang diklik sudah aktif
            const isActive = element.classList.contains('active');

            // Reset semua (tutup semua)
            allOptions.forEach(opt => {
                opt.classList.remove('active');
                opt.querySelector('.icon-plus').classList.remove('fa-minus');
                opt.querySelector('.icon-plus').classList.add('fa-plus');
            });

            // Jika tadi belum aktif, sekarang aktifkan (buka)
            if (!isActive) {
                element.classList.add('active');
                // Ubah icon plus jadi minus
                const icon = element.querySelector('.icon-plus');
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            }
        }
    </script>

</body>
</html>