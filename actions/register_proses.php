<?php
// File: actions/register_process.php
session_start();
require '../config/connect.php';

if (isset($_POST['register_btn'])) {
    // 1. Tangkap input user
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // 2. Hash Password (WAJIB)
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // 3. Cek Email Kembar
    $check = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='../login_register.php';</script>";
        exit;
    }

    // 4. Simpan ke DB
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($query);
    // "sss" artinya 3 string (username, email, password_hashed)
    $stmt->bind_param("sss", $username, $email, $password_hashed);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='../login_register.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
