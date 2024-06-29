<?php
// includes/db.php

// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "product_db";

// Tạo kết nối không bao gồm tên cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Tạo cơ sở dữ liệu nếu chưa có
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Lỗi khi tạo cơ sở dữ liệu: " . $conn->error);
}

// Kết nối lại với cơ sở dữ liệu vừa tạo
$conn->select_db($dbname);

// Tạo bảng sản phẩm nếu chưa có
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    discount INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    rating INT NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    die("Lỗi khi tạo bảng: " . $conn->error);
}

// Xóa dữ liệu cũ trong bảng sản phẩm
$sql = "DELETE FROM products";
if ($conn->query($sql) === FALSE) {
    die("Lỗi khi xóa dữ liệu cũ: " . $conn->error);
}

// Thêm dữ liệu mẫu vào bảng sản phẩm
$sql = "INSERT INTO products (name, price, discount, image, rating) VALUES
('iPhone 14 Pro Max 128GB', 29490000, 15, 'iphone_14_pro_max_128gb.jpg', 5),
('OPPO Reno8', 7850000, 12, 'oppo_reno8.jpg', 4),
('iPhone 11 64GB', 11190000, 25, 'iphone_11_64gb.jpg', 4),
('iPhone 13 128GB', 17990000, 20, 'iphone_13_128gb.jpg', 5),
('iPhone 13 Pro Max 128GB', 27190000, 22, 'iphone_13_pro_max_128gb.jpg', 5),
('iPhone 14 Pro Max 256GB', 31490000, 17, 'iphone_14_pro_max_256gb.jpg', 5),
('iPhone 14 128GB', 19990000, 20, 'iphone_14_128gb.jpg', 4),
('Samsung Galaxy S22 Ultra', 34900000, 25, 'samsung_galaxy_s22_ultra.jpg', 5),
('Samsung Galaxy Z Fold4', 34920000, 18, 'samsung_galaxy_z_fold4.jpg', 5),
('iPhone 11 128GB', 12790000, 25, 'iphone_11_128gb.jpg', 4)";
if ($conn->query($sql) === FALSE) {
    die("Lỗi khi thêm dữ liệu: " . $conn->error);
} else {
    echo "Dữ liệu đã được thêm thành công.";
}
?>
