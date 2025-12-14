<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Masuk & Daftar</title>
    
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <header>
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

            <div class="nav-right">
                <div class="header-btns">
                    <button class="nav-btn ghost" id="nav-login">Masuk</button>
                    <button class="nav-btn filled" id="nav-register">Daftar</button>
                </div>
            </div>
        </div>
    </header>

    <div class="container" id="container">

        <div class="form-container sign-up-container">
            <form action="actions/register_proses.php" method="POST">
                <h1>Daftar</h1>
                <p class="subtitle">Bergabung menjadi Sobat Suma dan mulai jelajahi keindahan Flora dan Fauna Sumatra</p>

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Masukkan Username...." required />
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan Email...." required />
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan Password..." required />
                </div>

                <div class="input-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="conf_password" placeholder="Konfirmasi password..." required />
                </div>

                <button type="submit" name="register_btn" class="daftar-btn">Daftar</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="actions/login_proses.php" method="POST">
                <h1>Masuk</h1>
                <p class="subtitle">Masuk ke akunmu dan lanjutkan menjelajahi keindahan Hutan Sumatra</p>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan Email...." required />
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan Password...." required />
                </div>

                <button type="submit" name="login_btn" class="masuk-btn">Masuk</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Halo, Selamat Datang!</h1>
                    <p>Jika sudah punya akun, klik tombol “Masuk” di bawah ini ya!</p>
                    <button class="ghost1" id="signIn">Masuk</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Halo, Sobat Suma!</h1>
                    <p>Jika belum punya akun, klik tombol “Daftar” di bawah ini ya!</p>
                    <button class="ghost2" id="signUp">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        
    <div class="footer-container">
        
        <div class="footer-brand">Sumatropic</div>
        
        <div class="footer-socials">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>

        <div class="footer-copy">
            Sumatropic 2025. All rights reserved.
        </div>

    </div>
</footer>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        document.getElementById('nav-register').addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        
        document.getElementById('nav-login').addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>