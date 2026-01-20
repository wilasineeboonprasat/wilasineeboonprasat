<?php
session_start();

// ถ้า login แล้ว ให้ไปหน้า admin.html ทันที
if (isset($_SESSION['admin'])) {
    header("Location: admin.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบแอดมิน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width:400px;">
    <div class="card p-4">
        <h4 class="text-center">🔐 Admin Login</h4>
        <hr>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center">
                ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
            </div>
        <?php endif; ?>

        <form action="check_login.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-success btn-block">เข้าสู่ระบบ</button>
        </form>
    </div>
</div>

</body>
</html>
