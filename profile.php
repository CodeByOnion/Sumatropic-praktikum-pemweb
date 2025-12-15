<?php
session_start();
// (Opsional) Cek login user
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Profile Saya</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="assets/css/stylenavbar.css">    
    <link rel="stylesheet" href="assets/css/styleprofile.css">   
    <link rel="stylesheet" href="assets/css/stylefooter.css">    
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="assets/image/Logo.png" alt="SUMATROPIC" class="logo-image">
                <span class="logo-text">SUMATROPIC</span>
            </div>
            <div class="nav-links">
                <a href="index.php">Beranda</a>
                <a href="pages/berita.php">Berita</a>
                <a href="pages/flora.php">Flora</a>
                <a href="pages/fauna.php">Fauna</a>
            </div>
            <div class="auth-buttons">
                <a href="#" class="btn-register"><i class="fas fa-user"></i> Profile</a>
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
                    <form action="actions/logout.php" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="Yergi Sinaga" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="yergi.sinaga@gmail.com" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="********" readonly>
                        </div>

                        <div class="action-row">
                            <button type="submit" class="btn-logout">Keluar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </main>

    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-left">SUMATROPIC</div>
            <div class="footer-center">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="footer-right">Sumatropic 2025. All right reserved</div>
        </div>
    </footer>

</body>
</html>