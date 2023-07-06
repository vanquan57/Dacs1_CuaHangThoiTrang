<?php
$servername = "localhost";
$username = "root";
$password = "1234567890";
$dbname = "UserDacs1";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form Sign Up
$username = $_POST['regUser'];
$email = $_POST['regEmail'];
$password = $_POST['regPassword'];

// Insert dữ liệu vào bảng User
$sql = "INSERT INTO User (username, passwords, email) VALUES ('$username', '$password', '$email')";
if ($conn->query($sql) === TRUE) {
    header("Location: ../../index.html");
} else {
    $error_message = "Lỗi: " . $sql . "<br>" . $conn->error;
    echo "<script>alert('$error_message');</script>";
}

// Đóng kết nối
$conn->close();
?>