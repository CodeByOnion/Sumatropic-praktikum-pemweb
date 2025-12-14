<?php
session_start();
require '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt  = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            $_SESSION['status']   = 'login';

            if ($user['role'] === 'admin') {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../index.php");
            }
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location='../login_register.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak terdaftar!'); window.location='../login_register.php';</script>";
    }
}
