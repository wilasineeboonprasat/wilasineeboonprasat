<?php
session_start(); // เริ่มต้นใช้งาน session
session_destroy(); // ทำลาย session ทั้งหมด (สั่งให้ออกจากระบบจริงๆ)

// เมื่อล้างข้อมูลเสร็จ ให้เด้งไปหน้า index.html
header("Location: index.html");
exit();
?>