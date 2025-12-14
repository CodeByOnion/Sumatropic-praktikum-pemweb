<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Profile Saya</title>
    <link rel="stylesheet" href="assets/css/styleprofile.css">
    <link rel="stylesheet" href="assets/css/stylenavbar.css">
    <link rel="stylesheet" href="../assets/css/stylefooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="assets/image/Logo.png" alt="SUMATROPIC" class="logo-image">
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

    <main class="main-content">
        <div class="container">
            
            <h1 class="page-title">Profile Saya</h1>

            <div class="profile-card">
                
                <div class="avatar-section">
                    <i class="fas fa-user-circle avatar-icon"></i>
                </div>

                <div class="form-section">
                    <form>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="" readonly>
                        </div>

                        <div class="action-row">
                            <button type="button" class="btn-logout">Keluar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </main>

    <footer>
        <div class="container footer-container">
            <div class="footer-logo">Sumatropic</div>
            <div class="socials">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-tiktok"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-youtube"></i>
            </div>
            <div class="copyright">Sumatropic 2025. All right reserved</div>
        </div>
    </footer>

</body>
</html>