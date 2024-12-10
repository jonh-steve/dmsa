<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hồ Sơ Sinh Viên</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
      body {
          margin: 0;
          padding: 20px;
          font-family: Arial, sans-serif;

      }
    #box-search{
        position: relative;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        /*border: 1px solid #5bc0de;*/
        margin: 1rem auto;
    }
  </style>
</head>

<body>

  <div class="table-container">
    <h2 class="text_content">Hồ Sơ Sinh Viên</h2>
<!--    search-->
      <div id="box-search" >
            <form class="search" action="search.php" method="post">
                <input type="number" name="Stu_id"  placeholder="Tìm kiếm thông qua id sinh viên...">
                <button type="submit" name="save" class="button">Tìm kiếm </button>
            </form>
      </div>

    <table>
      <thead>
        <tr>
          <th>ID Sinh Viên</th>
          <th>Tên</th>
          <th>Khoa</th>
          <th>Học Kỳ</th>
          <th>Ký Túc Xá</th>
          <th>Số Phòng</th>
          <th>Số Tầng</th>
          <th>Thao Tác</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connection.php';
        $sql = "SELECT * FROM Student";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
          while ($row1 = mysqli_fetch_array($query)) {
        ?>
            <tr>
              <td><?php echo $row1['Stu_id']; ?></td>
              <td><?php echo $row1['Name']; ?></td>
              <td><?php echo $row1['Department']; ?></td>
              <td><?php echo $row1['Session']; ?></td>
              <td><?php echo $row1['hall']; ?></td>
              <td><?php echo $row1['Room_Number']; ?></td>
              <td><?php echo $row1['Floor_Number']; ?></td>
              <td class="actions">
                <a id="delete" href="Delete.php?Stu_id=<?php echo $row1['Stu_id']; ?>" aria-label="Xóa sinh viên <?php echo $row1['Name']; ?>">Xóa</a>
                <a id="update" href="Update.php?Stu_id=<?php echo $row1['Stu_id']; ?>" aria-label="Cập nhật thông tin <?php echo $row1['Name']; ?>">Cập Nhật</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='8'>Không tìm thấy bản ghi nào.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="center-container">
    <a href="student.html" class="button">Thêm Mới</a>
<!--    <a href="index.html" class="button">Tìm Kiếm</a>-->
    <a href="../dashboard/home.php" class="button">Trang Chủ</a>

  </div>
  <script src="../js/delete.js"></script>

</body>


</html>
