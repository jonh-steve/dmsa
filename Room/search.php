<?php
include 'connection.php';

// Lấy số phòng từ POST
$Room_Number = isset($_POST['Room_Number']) ? mysqli_real_escape_string($conn, $_POST['Room_Number']) : '';

// Thực hiện truy vấn
$result = mysqli_query($conn, "SELECT * FROM Room WHERE Room_Number='$Room_Number'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Data</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="table-container">
    <h2 class="text_content">Thông tin phòng</h2>
    <table class="center table table-striped">
        <thead>
        <tr>
            <th>Số Phòng</th>
            <th>Số Bàn</th>
            <th>Số Giường</th>
            <th>Số Tầng</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Kiểm tra và hiển thị kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row1 = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row1['Room_Number']}</td>
                        <td>{$row1['Num_of_Table']}</td>
                        <td>{$row1['Num_of_Bed']}</td>
                        <td>{$row1['Floor_Number']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có kết quả nào phù hợp yêu cầu.</td></tr>"; // Thông báo nếu không có kết quả
        }
        ?>
        </tbody>
    </table>
    <div class="center-buttons">
        <a href="DispRoom.php" class="button">Quay lại</a>
    </div>
</div>
</body>
</html>