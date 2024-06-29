<?php
// index.php

// Bao gồm file kết nối cơ sở dữ liệu
include 'includes/db.php';

// Bao gồm header và liên kết với Bootstrap
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <header class="bg-dark text-white text-center py-3">
            <h1>Product Grid</h1>
        </header>
        <main class="container my-4 flex-grow-1">';

// Truy vấn dữ liệu từ bảng sản phẩm
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

echo '<div class="row">';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="images/' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["name"] . '</h5>';
        echo '<p class="card-text">Giá: ' . number_format($row["price"], 0, ',', '.') . ' VND</p>';
        echo '<p class="card-text">Giảm: ' . $row["discount"] . '%</p>';
        echo '<p class="card-text">Rating: ' . str_repeat('★', $row["rating"]) . str_repeat('☆', 5 - $row["rating"]) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="col-12"><p class="text-center">Không có sản phẩm nào.</p></div>';
}
echo '</div>';

// Bao gồm footer và liên kết với Bootstrap JS
echo '</main>
        <footer class="bg-dark text-white text-center py-3 mt-auto">
            <p>&copy; 2024 Product Grid</p>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>';

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
