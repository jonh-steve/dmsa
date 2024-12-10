<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truy Vấn Dữ Liệu Từ Cơ Sở Dữ Liệu</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  
  <body>
    <div class="table-container">
      <h2>Thông Tin Tầng</h2>
      
      <table>
        <thead>
          <tr>
            <th>Số Tầng</th>
            <th>Khối</th>
            <th>Số Nhà Bếp</th>
            <th>Số Phòng</th>
            <th>Số Phòng Tắm</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include 'connection.php';
            $sql = "SELECT * FROM floor";
            $query = mysqli_query($conn, $sql);
            while($row1 = mysqli_fetch_array($query)) { 
          ?>
          <tr>
            <td><?php echo $row1['Floor_Number']; ?></td>
            <td><?php echo $row1['Block']; ?></td>
            <td><?php echo $row1['Num_of_Kitchen']; ?></td>
            <td><?php echo $row1['Num_of_Room']; ?></td>
            <td><?php echo $row1['Num_of_Washroom']; ?></td>
          </tr> 
          <?php } ?>
        </tbody>
      </table>

      <div class="center-buttons">
        <a href="index.html" class="button">Tìm Kiếm</a>
        <a href="../home.php" class="button">Trang Chủ</a>
      </div>
    </div>
  </body>
</html>
