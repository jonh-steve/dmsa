<?php
include 'connection.php';

// Lấy số tầng từ POST
$Floor_Number = isset($_POST['Floor_Number']) ? mysqli_real_escape_string($conn, $_POST['Floor_Number']) : '';

// Thực hiện truy vấn
$result = mysqli_query($conn, "SELECT * FROM Floor WHERE Floor_Number='$Floor_Number'");
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
    <h2 class="text_content">Thông tin tầng</h2>
    <table class="center table table-striped">
        <thead>
        <tr>
            <th>Số Tầng</th>
            <th>Block</th>
            <th>Số Bếp</th>
            <th>Số Phòng</th>
            <th>Số Nhà vệ sinh</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Kiểm tra và hiển thị kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row1 = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row1['Floor_Number']}</td>
                        <td>{$row1['Block']}</td>
                        <td>{$row1['Num_of_Kitchen']}</td>
                        <td>{$row1['Num_of_Room']}</td>
                        <td>{$row1['Num_of_Washroom']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không có kết quả nào phù hợp yêu cầu.</td></tr>"; // Thông báo nếu không có kết quả
        }
        ?>
        </tbody>
    </table>
    <div class="center-buttons">
        <a href="DispFloor.php" class="button">Quay lại</a>
    </div>
</div>
</body>
</html>
