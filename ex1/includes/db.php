<?php
$servername = "localhost:4306";
$username = "root";
$password = "";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>