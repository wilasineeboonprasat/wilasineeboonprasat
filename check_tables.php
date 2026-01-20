<?php
$conn = new mysqli("localhost", "root", "", "ชื่อฐานข้อมูลจริง");
$conn->set_charset("utf8");

$result = $conn->query("SHOW TABLES");

echo "<h3>ตารางทั้งหมด</h3>";
while ($row = $result->fetch_array()) {
    echo $row[0] . "<br>";
}
