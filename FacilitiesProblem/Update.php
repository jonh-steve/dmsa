<?php
include_once 'connection.php';

if (count($_POST) > 0) {
  mysqli_query($conn, "UPDATE facility_problem SET 
    Damaged_Fan_Un='" . $_POST['Damaged_Fan_Un'] . "',
    Damaged_Fan_Pro='" . $_POST['Damaged_Fan_Pro'] . "',
    Damaged_Fan_Sol='" . $_POST['Damaged_Fan_Sol'] . "',
    Damaged_Light_Un='" . $_POST['Damaged_Light_Un'] . "',
    Damaged_Light_Pro='" . $_POST['Damaged_Light_Pro'] . "',
    Damaged_Light_Sol='" . $_POST['Damaged_Light_Sol'] . "',
    Modified_Date='" . $_POST['Modified_Date'] . "' 
    WHERE Room_Number='" . $_POST['Room_Number'] . "'");
  include "DispFP.php";
}

$result = mysqli_query($conn, "SELECT * FROM facility_problem WHERE Room_Number='" . $_GET['Room_Number'] . "'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập Nhật Vấn Đề Cơ Sở Vật Chất</title>
  <style>
    body {
      background-image: url(../images/sea2.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      font-family: Arial, sans-serif;
    }

    .form-container {
      max-width: 600px;
      margin: 100px auto;
      padding: 20px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="number"],
    .form-group input[type="date"],
    .form-group input[type="text"] {
      width: 96%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      font-size: 18px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h2>Cập Nhật Vấn Đề Cơ Sở Vật Chất</h2>
    <form name="frmUser" method="post" action="">
      <!-- Số Phòng -->
      <div class="form-group">
        <label for="Room_Number">Số Phòng</label>
        <input type="hidden" name="Room_Number" value="<?php echo $row['Room_Number']; ?>">
        <input type="number" id="Room_Number" name="Room_Number" value="<?php echo $row['Room_Number']; ?>" readonly>
      </div>
      <!-- Quạt Hỏng (Chưa Xử Lý) -->
      <div class="form-group">
        <label for="Damaged_Fan_Un">Quạt Hỏng (Chưa Xử Lý)</label>
        <input type="number" id="Damaged_Fan_Un" name="Damaged_Fan_Un" value="<?php echo $row['Damaged_Fan_Un']; ?>">
      </div>
      <!-- Quạt Hỏng (Đang Xử Lý) -->
      <div class="form-group">
        <label for="Damaged_Fan_Pro">Quạt Hỏng (Đang Xử Lý)</label>
        <input type="number" id="Damaged_Fan_Pro" name="Damaged_Fan_Pro" value="<?php echo $row['Damaged_Fan_Pro']; ?>">
      </div>
      <!-- Quạt Hỏng (Đã Xử Lý) -->
      <div class="form-group">
        <label for="Damaged_Fan_Sol">Quạt Hỏng (Đã Xử Lý)</label>
        <input type="number" id="Damaged_Fan_Sol" name="Damaged_Fan_Sol" value="<?php echo $row['Damaged_Fan_Sol']; ?>">
      </div>
      <!-- Đèn Hỏng (Chưa Xử Lý) -->
      <div class="form-group">
        <label for="Damaged_Light_Un">Đèn Hỏng (Chưa Xử Lý)</label>
        <input type="number" id="Damaged_Light_Un" name="Damaged_Light_Un" value="<?php echo $row['Damaged_Light_Un']; ?>">
      </div>
      <!-- Đèn Hỏng (Đang Xử Lý) -->
      <div class="form-group">
        <label for="Damaged_Light_Pro">Đèn Hỏng (Đang Xử Lý)</label>
        <input type="number" id="Damaged_Light_Pro" name="Damaged_Light_Pro" value="<?php echo $row['Damaged_Light_Pro']; ?>">
      </div>
      <!-- Đèn Hỏng (Đã Xử Lý) -->
      <div class="form-group">
        <label for="Damaged_Light_Sol">Đèn Hỏng (Đã Xử Lý)</label>
        <input type="number" id="Damaged_Light_Sol" name="Damaged_Light_Sol" value="<?php echo $row['Damaged_Light_Sol']; ?>">
      </div>
      <!-- Ngày Chỉnh Sửa Cuối -->
      <div class="form-group">
        <label for="Modified_Date">Ngày Chỉnh Sửa Cuối</label>
        <input type="date" id="Modified_Date" name="Modified_Date" value="<?php echo $row['Modified_Date']; ?>">
      </div>
      <!-- Nút Gửi -->
      <div class="form-group">
        <input type="submit" name="submit" value="Cập Nhật">
      </div>
    </form>
  </div>
</body>

</html>
