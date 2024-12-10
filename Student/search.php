<?php
include 'connection.php';
$Stu_id = $_POST['Stu_id'];
$result = mysqli_query($conn, "SELECT * FROM student WHERE Stu_id='$Stu_id'");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="table-container">
    <h1 class="text_content">Thông tin sinh viên</h1>
    <table>
        <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Khoa</th>
            <th>Học kỳ</th>
            <th>Số phòng</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row1 = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row1["Stu_id"]; ?></td>
                <td><?php echo $row1["Name"]; ?></td>
                <td><?php echo $row1["Department"]; ?></td>
                <td><?php echo $row1["Session"]; ?></td>
                <td><?php echo $row1["Room_Number"]; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="center-buttons">
        <a href="DispStudent.php" class="button">Quay lại</a>
    </div>
</div>
</body>
</html>