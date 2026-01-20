<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost","root","","wilasinee");
$conn->set_charset("utf8");

$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if ($name && $email && $message) {
    $stmt = $conn->prepare(
      "INSERT INTO messages (name,email,message) VALUES (?,?,?)"
    );
    $stmt->bind_param("sss",$name,$email,$message);
    $stmt->execute();
}

header("Location: contact.html");
