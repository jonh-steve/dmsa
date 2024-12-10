<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

include "database_connection.php";

    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $con->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra kết quả
    if ($result->num_rows > 0) {
        // Đăng nhập thành công, chuyển hướng đến trang quản trị
        header("Location: dashboard/home.php");
        exit();
    } else {
        // Đăng nhập thất bại, hiển thị thông báo lỗi
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không hợp lệ');</script>";

        header("Location: ../");
    }

    // Đóng statement và kết nối
    $stmt->close();
    $conn->close();
}
?>