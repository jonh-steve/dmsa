<!DOCTYPE html>
<html>
<head>
    <title>Fetch Data From Database</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"> <!-- Liên kết đến file CSS -->
</head>
    <style>
        a {
            text-decoration: none;
        }
    </style>
<body>
<div class="table-container">
    <div class="text_content">
        <h2>Room Information</h2>
    </div>
    <table>
        <tr>
            <th colspan="4">Room</th>
        </tr>
        <tr>
            <th>Room Number</th>
            <th>Number of Table</th>
            <th>Number of Bed</th>
            <th>Floor Number</th>
        </tr>
        <?php
        include 'connection.php';
        $sql = "SELECT * FROM room";
        $query = mysqli_query($conn, $sql);
        while ($row1 = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row1['Room_Number']); ?></td>
                <td><?php echo htmlspecialchars($row1['Num_of_Table']); ?></td>
                <td><?php echo htmlspecialchars($row1['Num_of_Bed']); ?></td>
                <td><?php echo htmlspecialchars($row1['Floor_Number']); ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div class="center-container">
    <button class="button"><a href="index.html" style="color: white;">Search</a></button>
    <button class="button"><a href="../../" style="color: white;">Home Page</a></button>
</div>
</body>
</html>