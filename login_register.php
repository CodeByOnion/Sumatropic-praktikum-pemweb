<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="login-container">
        <h2>Masuk Sumatropic</h2>

        <form action="actions/login_proses.php" method="POST">

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="Masukkan email...">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Masukkan password...">
            </div>

            <button type="submit" name="login_btn">Masuk</button>
        </form>

        <form action="actions/register_proses.php" method="POST">
            <h3>Daftar Akun Baru</h3>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="register_btn">Daftar Sekarang</button>
        </form>

        <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
    </div>
</body>

</html>