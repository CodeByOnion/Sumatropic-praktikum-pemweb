<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatropic - Masuk & Daftar</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <header>
        <div class="logo"><a href="index.php" style="text-decoration:none; color:inherit;">SUMATROPIC</a></div>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="pages/berita.php">Berita</a>
            <a href="#">Flora</a>
            <a href="#">Fauna</a>
        </nav>
        <div class="header-btns">
            <button class="nav-btn ghost" id="nav-login">Masuk</button>
            <button class="nav-btn filled" id="nav-register">Daftar</button>
        </div>
    </header>

    <div class="container" id="container">

        <div class="form-container sign-up-container">
            <form action="actions/register_proses.php" method="POST">
                <h1>Daftar</h1>
                <p class="subtitle">Bergabung menjadi Sobat Suma dan mulai jelajahi keindahan Flora dan Fauna Sumatra</p>

                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username..." required />

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan Email..." required />

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password..." required />

                <label>Konfirmasi Password</label>
                <input type="password" name="conf_password" placeholder="Konfirmasi Password..." />

                <button type="submit" name="register_btn" class="orange-btn">Daftar</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="actions/login_proses.php" method="POST">
                <h1>Masuk</h1>
                <p class="subtitle">Masuk ke akunmu dan lanjutkan menjelajahi keindahan Hutan Sumatra</p>

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan Email..." required />

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password..." required />

                <button type="submit" name="login_btn" class="orange-btn">Masuk</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Halo, Selamat Datang!</h1>
                    <p>Jika sudah punya akun, klik tombol "Masuk" di bawah ini ya!</p>
                    <button class="ghost" id="signIn">Masuk</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Halo, Sobat Suma!</h1>
                    <p>Jika belum punya akun, klik tombol "Daftar" di bawah ini ya!</p>
                    <button class="ghost" id="signUp">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-left">Sumatropic</div>
        <div class="footer-social">
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-tiktok"></i>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-youtube"></i>
        </div>
        <div class="footer-right">Sumatropic 2025. All right reserved</div>
    </footer>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        // Tombol di panel hijau
        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        // (Opsional) Tombol di Navbar agar berfungsi memicu geseran
        document.getElementById('nav-register').addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        document.getElementById('nav-login').addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>