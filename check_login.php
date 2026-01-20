<?php
session_start();

// รับค่าจากฟอร์ม
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// กำหนด user / pass
$admin_user = "admin";
$admin_pass = "1234";

if ($username === $admin_user && $password === $admin_pass) {
    // Login สำเร็จ
    $_SESSION['admin'] = true;
    $_SESSION['username'] = $username;

    // ไปหน้า admin.html
    header("Location: admin.html");
    exit();
} else {
    // Login ผิด
    header("Location: login.php?error=1");
    exit();
}
