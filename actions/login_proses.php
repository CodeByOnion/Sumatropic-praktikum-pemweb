<?php
session_start();
require '../config/connect.php';

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek Email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // PERBAIKAN 1: Simpan data ke variabel $user
        $user = $result->fetch_assoc();

        // PERBAIKAN 2: Gunakan $user (BUKAN $row) untuk verifikasi
        if (password_verify($password, $user['password'])) {

            // Set Session pakai variabel $user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['status'] = "login";

            if ($user['role'] == 'admin') {
                header("Location: ../admin/dashboard.php");
                exit;
            } else {
                header("Location: ../index.php");
                exit;
            }
        } else {
            // Password hash tidak cocok
            echo "<script>alert('Password salah!'); window.location='../login_register.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak terdaftar!'); window.location='../login_register.php';</script>";
    }
}
