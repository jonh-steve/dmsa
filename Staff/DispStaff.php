<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Record</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
      body {
          margin: 0;
          padding: 20px;
          font-family: Arial, sans-serif;
      }

  </style>
</head>

<body>
  <div class="table-container">

    <h2 class="text_content">Hồ sơ nhân viên </h2>
<!--    search-->
      <div id="box-search" >
          <form class="search" action="search.php" method="post">
              <input type="number" name="S_ID"  placeholder="Tìm kiếm thông qua id nhan vien...">
              <button type="submit" name="save" class="button">Tìm kiếm </button>
          </form>
      </div>

      <table>
      <thead>
        <tr>
          <th>ID Nhân Viên</th>
          <th>Họ và Tên</th>
          <th>Địa Chỉ</th>
          <th>Email</th>
          <th>Chức Vụ</th>
          <th>Thao Tác</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connection.php'; // Kết nối cơ sở dữ liệu
        $sql = "SELECT * FROM Staff"; // Truy vấn dữ liệu
        $query = mysqli_query($conn, $sql);

        // Hiển thị dữ liệu từ cơ sở dữ liệu
        while ($row1 = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?php echo $row1['S_ID']; ?></td>
            <td><?php echo $row1['Name']; ?></td>
            <td><?php echo $row1['Address']; ?></td>
            <td><?php echo $row1['Email']; ?></td>
            <td><?php echo $row1['Designation']; ?></td>
            <td class="actions">
              <a href="Delete.php?S_ID=<?php echo $row1['S_ID']; ?>" id ="delete">Xóa</a>
              <a href="update.php?S_ID=<?php echo $row1['S_ID']; ?>" id ="update">Cập Nhật</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="center-container">
    <a href="staff.html" class="button">Thêm Mới</a>
<!--    <a href="index.html" class="button">Tìm Kiếm</a>-->
    <a href="../../dashboard/home.php" class="button">Trang Chủ</a>
  </div>
  <script src="../js/delete.js"></script>

</body>

</html>
