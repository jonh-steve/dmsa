<!DOCTYPE html> 
<html lang="vi"> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truy xuất dữ liệu từ cơ sở dữ liệu</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body> 
    <section class="main">
        <table>
            <thead>
                <tr>
                    <th colspan="8"><h2>Vấn đề Cơ sở vật chất</h2></th> <!-- Tiêu đề của bảng -->
                </tr>
                <tr>
                    <th>Số phòng</th> <!-- Cột số phòng -->
                    <th>Quạt hỏng chưa xử lý</th> <!-- Cột quạt hỏng chưa xử lý -->
                    <th>Quạt hỏng đang xử lý</th> <!-- Cột quạt hỏng đang xử lý -->
                    <th>Quạt hỏng đã xử lý</th> <!-- Cột quạt hỏng đã xử lý -->
                    <th>Đèn hỏng chưa xử lý</th> <!-- Cột đèn hỏng chưa xử lý -->
                    <th>Đèn hỏng đang xử lý</th> <!-- Cột đèn hỏng đang xử lý -->
                    <th>Đèn hỏng đã xử lý</th> <!-- Cột đèn hỏng đã xử lý -->
                    <th>Ngày sửa đổi cuối cùng</th> <!-- Cột ngày sửa đổi -->
                </tr>
            </thead>
            <tbody>
                <?php 
                    include 'connection.php'; // Kết nối cơ sở dữ liệu
                    $sql = "SELECT * FROM Facility_Problem"; // Câu truy vấn SQL lấy tất cả dữ liệu
                    $query = mysqli_query($conn, $sql); // Thực thi câu truy vấn

                    // Duyệt qua tất cả các bản ghi trong cơ sở dữ liệu
                    while($row1 = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $row1['Room_Number']; ?></td> <!-- Hiển thị số phòng -->
                        <td><?php echo $row1['Damaged_Fan_Un']; ?></td> <!-- Hiển thị quạt hỏng chưa xử lý -->
                        <td><?php echo $row1['Damaged_Fan_Pro']; ?></td> <!-- Hiển thị quạt hỏng đang xử lý -->
                        <td><?php echo $row1['Damaged_Fan_Sol']; ?></td> <!-- Hiển thị quạt hỏng đã xử lý -->
                        <td><?php echo $row1['Damaged_Light_Un']; ?></td> <!-- Hiển thị đèn hỏng chưa xử lý -->
                        <td><?php echo $row1['Damaged_Light_Pro']; ?></td> <!-- Hiển thị đèn hỏng đang xử lý -->
                        <td><?php echo $row1['Damaged_Light_Sol']; ?></td> <!-- Hiển thị đèn hỏng đã xử lý -->
                        <td><?php echo $row1['Modified_Date']; ?></td> <!-- Hiển thị ngày sửa đổi -->
                    </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </section>

    <div style="text-align: center;">
        <!-- Các nút chức năng -->
        <button class="button"><a href="index.html">Tìm kiếm theo ngày</a></button>
        <button class="button"><a href="search_update.html">Tìm kiếm theo phòng</a></button>
        <button class="button"><a href="../dashboard/home.php">Trang chủ</a></button>
    </div>
</body>
</html>
