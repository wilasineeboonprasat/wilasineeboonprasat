<?php
session_start();

// ตรวจสอบว่าถ้าไม่มี Session แอดมิน ให้ดีดกลับไปหน้า Login ทันที
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ระบบจัดการหลังบ้าน</title>
</head>
<body>
    <h1>ยินดีต้อนรับคุณ <?php echo $_SESSION['username']; ?></h1>
    <p>นี่คือหน้าสำหรับแอดมินเท่านั้น</p>
    <hr>
    <a href="logout.php">ออกจากระบบ</a>
</body>
</html>