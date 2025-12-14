<?php
session_start();
require '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='../login_register.php';</script>";
        exit;
    }

    $query = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')";
    $stmt  = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $email, $password_hashed);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='../login_register.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal!'); window.location='../login_register.php';</script>";
    }
}
