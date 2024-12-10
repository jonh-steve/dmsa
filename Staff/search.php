<?php
include 'connection.php';

// Check if connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Validate and sanitize input
$S_ID = isset($_POST['S_ID']) ? mysqli_real_escape_string($conn, $_POST['S_ID']) : '';

// Prepare and execute the query
$result = mysqli_query($conn, "SELECT * FROM Staff WHERE S_ID='$S_ID'");

if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}
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
    <h2 class="text_content">Thông tin nhân viên</h2>
    <table>
        <thead>
        <tr>
            <th>Ma nha vien</th>
            <th>Ho va ten</th>
            <th>Dia chi</th>
            <th>Email</th>
            <th>Chuc vu</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            while ($row1 = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row1['S_ID']}</td>
                        <td>{$row1['Name']}</td>
                        <td>{$row1['Address']}</td>
                        <td>{$row1['Email']}</td>
                        <td>{$row1['Designation']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không có kết quả nào phù hợp yêu cầu.</td></tr>"; // Message for no results
        }
        ?>
        </tbody>
    </table>
    <div class="center-buttons">
        <a href="DispStaff.php" class="button">Quay lại</a>
    </div>
</div>
</body>
</html>