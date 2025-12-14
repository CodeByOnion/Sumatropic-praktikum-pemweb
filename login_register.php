<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Masuk & Daftar</title>
<<<<<<< HEAD
    
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
=======
>>>>>>> 1c08b057bdbd6349b21316a0810011a840f188cc
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <a href="#">Flora</a>
                <a href="#">Fauna</a>
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
<<<<<<< HEAD
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
=======
                <p class="subtitle">Bergabung menjadi Sobat Suma sekarang</p>
                <input type="text" name="username" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button class="orange-btn">Daftar</button>
>>>>>>> 1c08b057bdbd6349b21316a0810011a840f188cc
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="actions/login_proses.php" method="POST">
                <h1>Masuk</h1>
<<<<<<< HEAD
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
=======
                <p class="subtitle">Lanjutkan menjelajahi Hutan Sumatra</p>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button class="orange-btn">Masuk</button>
>>>>>>> 1c08b057bdbd6349b21316a0810011a840f188cc
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
<<<<<<< HEAD
                    <h1>Halo, Selamat Datang!</h1>
                    <p>Jika sudah punya akun, klik tombol “Masuk” di bawah ini ya!</p>
                    <button class="ghost1" id="signIn">Masuk</button>
=======
                    <h1>Halo, Sobat!</h1>
                    <p>Sudah punya akun? Login di sini.</p>
                    <button class="ghost-btn" id="signIn">Masuk</button>
>>>>>>> 1c08b057bdbd6349b21316a0810011a840f188cc
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Halo, Sobat Suma!</h1>
<<<<<<< HEAD
                    <p>Jika belum punya akun, klik tombol “Daftar” di bawah ini ya!</p>
                    <button class="ghost2" id="signUp">Daftar</button>
=======
                    <p>Belum punya akun? Daftar sekarang!</p>
                    <button class="ghost-btn" id="signUp">Daftar</button>
>>>>>>> 1c08b057bdbd6349b21316a0810011a840f188cc
                </div>
            </div>
        </div>
    </div>

    <footer>
<<<<<<< HEAD
        
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
=======
        <div class="footer-left">Sumatropic</div>
        <div class="footer-social">
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-youtube"></i>
        </div>
        <div class="footer-right">Sumatropic 2025. All right reserved</div>
    </footer>
>>>>>>> 1c08b057bdbd6349b21316a0810011a840f188cc

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
        const navRegister = document.getElementById('nav-register');
        const navLogin = document.getElementById('nav-login');

<<<<<<< HEAD
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
=======
        // Logic Slider
        if(signUpButton && signInButton && container) {
            signUpButton.addEventListener('click', () => container.classList.add("right-panel-active"));
            signInButton.addEventListener('click', () => container.classList.remove("right-panel-active"));
        }
        
        // Logic Tombol Navbar
        if(navRegister && navLogin) {
            navRegister.addEventListener('click', () => container.classList.add("right-panel-active"));
            navLogin.addEventListener('click', () => container.classList.remove("right-panel-active"));
        }
>>>>>>> 1c08b057bdbd6349b21316a0810011a840f188cc
    </script>
</body>

</html>