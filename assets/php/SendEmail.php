<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Do_AnCS1_QuanLyCuaHangThoiTrang\assets\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\Do_AnCS1_QuanLyCuaHangThoiTrang\assets\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Do_AnCS1_QuanLyCuaHangThoiTrang\assets\phpmailer\src\SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"]; // Lấy giá trị email từ form
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mt10102004@gmail.com';
        $mail->Password = 'mkaholnweoxojdun';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        // Cấu hình email
        $mail->setFrom('mt10102004@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Subject = '=?UTF-8?B?' . base64_encode('Your verification') . '?=';
        // Kết nối đến cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "1234567890";
        $dbname = "UserDacs1";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT * FROM User WHERE email = '$email'";
        $result = $conn->query($query);

        // Nếu có email trùng khớp
        if ($result->num_rows > 0) {
            // Nội dung email
            $random_number = mt_rand(100000, 999999); // Sinh số ngẫu nhiên có 6 chữ số
            $mail->Body = "Your verification code is: " . $random_number;
            // Gửi email
            $mail->send();
            $conn->close();
            session_start();
            $_SESSION['verification_code'] = $random_number;
            $_SESSION['email'] = $email;
            header("Location: ../../ForgotPass.html");
            exit();
        } else {
            echo "Không có email trùng khớp";
            $conn->close();
            header("Location: ../../SendEmail.html");
            exit();
        }
    } catch (Exception $e) {
        echo "Gửi email thất bại: {$mail->ErrorInfo}";
    }
}
?>