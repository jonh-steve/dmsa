<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dữ liệu tin nhắn</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="table-container">
    <h2 class="text_content">Dữ liệu tin nhắn</h2>
    <table>
      <thead>
        <tr>
          <th>Mã sinh viên</th>
          <th>Họ và tên</th>
          <th>Số phòng</th>
          <th>Tin nhắn</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connection.php';
        $sql = "SELECT * FROM message_table";
        $query = mysqli_query($conn, $sql);
        while ($row1 = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?php echo $row1['Stu_ID']; ?></td>
            <td><?php echo $row1['Name']; ?></td>
            <td><?php echo $row1['Room_Num']; ?></td>
            <td><?php echo $row1['Messages']; ?></td>

              <td class="actions">
                  <a id="delete" href="Delete.php?Stu_ID=<?php echo $row1['Stu_ID']; ?>"  <?php echo $row1['Name']; ?>">Xóa</a>
              </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <div class="center-buttons">
      <a href="../dashboard/home.php" class="button">Trang chủ</a>
    </div>
  </div>
  <script src="../js/delete.js"></script>

</body>

</html>
