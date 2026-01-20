<?php
$conn = new mysqli("localhost", "root", "", "xapp");
$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ใช้ real_escape_string ป้องกัน SQL Injection
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['comments']);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if($conn->query($sql)) {
        echo "<script>alert('ส่งข้อมูลสำเร็จ'); window.location='Contact.html';</script>";
    }
}
?>