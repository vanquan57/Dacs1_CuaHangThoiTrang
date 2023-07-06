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

// Lấy dữ liệu từ form Sign In
$email = $_POST['logEmail'];
$password = $_POST['logPassword'];

// Truy vấn CSDL để kiểm tra dữ liệu
$sql = "SELECT * FROM User WHERE email='$email'";
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // Người dùng tồn tại trong CSDL
    $row = $result->fetch_assoc();
    if ($row['passwords'] == $password) {
        header("Location: ../../home.html");
        exit();
    } else {
        echo "<script>alert('Email Hoặc Mật Khẩu Không Chính Xác!');</script>";
    }
} else {
    // Người dùng không tồn tại trong CSDL
    echo "Người dùng không tồn tại!";
}


// Đóng kết nối
$conn->close();
?>
