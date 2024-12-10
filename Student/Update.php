<?php
include_once 'connection.php';
if(count($_POST) > 0) {
    mysqli_query($conn, "UPDATE student SET 
        Name='" . $_POST['Name'] . "', 
        Department='" . $_POST['Department'] . "', 
        Session='" . $_POST['Session'] . "', 
        Room_Number='" . $_POST['Room_Number'] . "', 
        Floor_Number='" . $_POST['Floor_Number'] . "' 
        WHERE Stu_id='" . $_POST['Stu_id'] . "'");
    include "DispStudent.php";
}

$result = mysqli_query($conn, "SELECT * FROM Student WHERE Stu_id='" . $_GET['Stu_id'] . "'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Thông Tin Sinh Viên</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>

<body>
<div class="container">
    <div class="form-wrapper">
        <div class="panel">
            <div class="panel-header">
                <h1>Cập Nhật Thông Tin Sinh Viên</h1>
            </div>
            <div class="panel-body">
                <form name="frmUser " method="post" action="">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                    <section class="sec">
                        <div class="form-group">
                            <label for="Stu_id">Mã Sinh Viên:</label>
                            <input type="hidden" name="Stu_id" value="<?php echo $row['Stu_id']; ?>">
                            <input type="text" name="Stu_id_display" class="txtField" value="<?php echo $row['Stu_id']; ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label for="Name">Họ và Tên:</label>
                            <input type="text" name="Name" class="txtField" value="<?php echo $row['Name']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="Department">Khoa:</label>
                            <input type="text" name="Department" class="txtField" value="<?php echo $row['Department']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="Session">Niên Khóa:</label>
                            <input type="text" name="Session" class="txtField" value="<?php echo $row['Session']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="Room_Number">Số Phòng:</label>
                            <input type="number" name="Room_Number" class="txtField" value="<?php echo $row['Room_Number']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="Floor_Number">Số Tầng:</label>
                            <input type="text" name="Floor_Number" class="txtField" value="<?php echo $row['Floor_Number']; ?>" required />
                        </div>
                        <input type="submit" name="submit" value="Cập Nhật" class="btn submit-btn" />
                    </section>
                </form>
            </div>
            <div class="panel-footer">
                <button><a href="DispStudent.php" class="btn back-btn">Quay lại</a></button>
                <small>&copy; Hệ thống Quản lý Ký Túc Xá</small>
            </div>
        </div>
    </div>
</div>
</body>

</html>