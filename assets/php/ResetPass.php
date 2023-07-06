<?php
session_start();

// Kiểm tra xem mã code có được truyền từ file SendEmail.php hay không
if (isset($_SESSION['verification_code']) && isset($_SESSION['email'])) {
    $verification_code = $_SESSION['verification_code'];
    $email = $_SESSION['email'];

    // Lấy dữ liệu từ form HTML
    $new_password = $_POST['NewPassword'];
    $confirm_password = $_POST['ConfirmNewPassword'];
    $user_code = $_POST['VerificationCode'];

    // Kiểm tra mã code có trùng khớp hay không
    if ($user_code == $verification_code) {
        // Mã code trùng khớp
        // Kiểm tra mật khẩu mới và xác nhận mật khẩu có khớp nhau hay không
        if ($new_password == $confirm_password) {
            // Kết nối đến CSDL
            $servername = "localhost";
            $username = "root";
            $password = "1234567890";
            $dbname = "UserDacs1";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
            }
            $sql = "UPDATE User SET passwords = '$new_password' WHERE email = '$email'"; // Sử dụng giá trị 'email' trong câu truy vấn

            if ($conn->query($sql) === TRUE) {
                echo "Thay đổi mật khẩu thành công!";
                header("Location: ../../index.html");
            } else {
                echo "Lỗi: " . $conn->error;
            }
        } else {
            echo "Xác nhận mật khẩu không khớp!";
            header("Location: ../../SendEmail.html");
        }
    } else {
        echo "Mã xác thực không trùng khớp!";
    }

    // Sau khi hoàn thành xử lý, hãy xóa biến session
    unset($_SESSION['verification_code']);
    unset($_SESSION['email']);
} else {
    echo "Không có mã xác thực hoặc email!";
}

?>