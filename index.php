<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

<div class="container">
    <div class="heading">Đăng Nhập</div>
    <form action="login_process_for_student.php" class="form" method="post">
        <input required class="input" type="text" name="username" id="username" placeholder="Họ và tên">
        <input required class="input" type="text" name="maSV" id="password" placeholder="Mã sinh viên">
        <input class="login-button" type="submit" value="Đăng Nhập">
    </form>
    <div class="social-account-container">
        <span class="agreement title">
            <a href="admin.html" target="_blank">Bạn là Admin? click here!</a>
        </span>
    </div>

</div>
</body>

</html>