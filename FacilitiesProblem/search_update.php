<?php
include 'connection.php';

// Lấy số phòng từ POST
$Room_Number = isset($_POST['Room_Number']) ? mysqli_real_escape_string($conn, $_POST['Room_Number']) : '';

// Thực hiện truy vấn
$result = mysqli_query($conn, "SELECT Room_Number, 
    SUM(Damaged_Fan_Un + Damaged_Light_Un) AS total_uv, 
    SUM(Damaged_Fan_Pro + Damaged_Light_Pro) AS total_pro, 
    SUM(Damaged_Fan_Sol + Damaged_Light_Sol) AS total_sol, 
    Modified_Date 
    FROM facility_problem 
    WHERE Room_Number='$Room_Number' 
    GROUP BY Room_Number");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Data</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background-color: darkslategray;">
<div class="table-container">
    <h2 class="text_content">Thông tin vấn đề cơ sở vật chất</h2>
    <table class="center table table-striped">
        <thead>
        <tr>
            <th>Số Phòng</th>
            <th>Tổng chưa giải quyết</th>
            <th>Tổng đang xử lý</th>
            <th>Tổng đã giải quyết</th>
            <th>Ngày sửa đổi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Kiểm tra và hiển thị kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row1 = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row1['Room_Number']}</td>
                        <td>{$row1['total_uv']}</td>
                        <td>{$row1['total_pro']}</td>
                        <td>{$row1['total_sol']}</td>
                        <td>{$row1['Modified_Date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không có kết quả nào phù hợp yêu cầu.</td></tr>"; // Thông báo nếu không có kết quả
        }
        ?>
        </tbody>
    </table>
    <div class="center-buttons">
        <a href="DispFP.php" class="button">Quay lại</a>
    </div>
</div>
</body>
</html>