<?php
include 'includes/db.php';

// Chọn cơ sở dữ liệu
$conn->select_db('employee_management');

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    // Sử dụng Prepared Statement để tránh lỗi cú pháp và SQL Injection
    $stmt = $conn->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute() === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
