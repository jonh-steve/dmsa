<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin phòng</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="table-container">
    <h2 class="text_content">Dữ liệu phòng</h2>
    <table>
      <thead>
        <tr>
          <th>Số phòng</th>
          <th>Số lượng bảng</th>
          <th>Số lượng giường</th>
          <th>Số tầng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connection.php';
        $sql = "SELECT * FROM room";
        $query = mysqli_query($conn, $sql);
        while ($row1 = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?php echo $row1['Room_Number']; ?></td>
            <td><?php echo $row1['Num_of_Table']; ?></td>
            <td><?php echo $row1['Num_of_Bed']; ?></td>
            <td><?php echo $row1['Floor_Number']; ?></td>
            <td class="actions">
              <a id= "delete" href="Delete.php?Room_Number=<?php echo $row1['Room_Number']; ?>" >Xóa</a>
              <a id= "update" href="Update.php?Room_Number=<?php echo $row1['Room_Number']; ?>" >Cập nhật</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="center-container">
    <a href="Room.html" class="button">Thêm phòng mới</a>
    <a href="index.html" class="button">Tìm kiếm</a>
    <a href="../dashboard/home.php" class="button">Trang chủ</a>
  </div>
  <script src="../js/delete.js"></script>

</body>

</html>
