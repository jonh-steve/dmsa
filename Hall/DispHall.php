<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tìm nạp dữ liệu từ cơ sở dữ liệu</title>
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>

  <div class="table-container">
    <h2 class="text_content">Danh Sách khu Ký túc xa</h2>
    <table>
      <thead>
        <tr>
          <th>Mã KTX</th>
          <th>Tên KTX</th>
          <th>Tổng số chỗ </th>
          <th>Số chỗ còn trống</th>
          <th>Số sinh viên</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connection.php';
        $sql = "SELECT * FROM hall";
        $query = mysqli_query($conn, $sql);

        if ($query && mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
              <td><?php echo $row['H_ID']; ?></td>
              <td><?php echo $row['H_Name']; ?></td>
              <td><?php echo $row['T_Seat']; ?></td>
              <td><?php echo $row['A_Seat']; ?></td>
              <td><?php echo $row['N_Student']; ?></td>
              <td class="actions">
                <a id="delete" href="Delete.php?H_ID=<?php echo $row['H_ID']; ?>">Xóa</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='6'>Không tìm thấy bản ghi nào.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="center-container">
    <a href="Hall.html" class="button">Thêm</a>
    <a href="../dashboard/home.php" class="button">Trang chủ</a>
  </div>
  <script src="../js/delete.js"></script>

</body>

</html>
