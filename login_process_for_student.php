<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['maSV'];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'DMS');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $conn->prepare("SELECT * FROM student WHERE Name = ? AND Stu_id = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra kết quả
    if ($result->num_rows > 0) {
        // Đăng nhập thành công, chuyển hướng đến trang quản trị
        header("Location: home.php");
        exit();
    } else {
        // Đăng nhập thất bại, hiển thị thông báo lỗi
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không hợp lệ');</script>";
        exit();
    }

    // Đóng statement và kết nối
    $stmt->close();
    $conn->close();
}
?>