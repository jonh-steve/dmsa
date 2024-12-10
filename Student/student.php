<?php
$Stu_id = $_POST['Stu_id'];
$Name = $_POST['Name'];
$Department = $_POST['Department'];
$Session = $_POST['Session'];
$Hall = $_POST['hall'];
$Room_Number = $_POST['Room_Number'];
$Floor_Number = $_POST['Floor_Number'];

// Establish a connection to the database
$conn = new mysqli('localhost', 'root', '', 'DMS');

// Check the connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Check if Stu_id already exists
    $stmt = $conn->prepare("SELECT * FROM student WHERE Stu_id = ?");
    $stmt->bind_param("s", $Stu_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Student ID already exists!";
        header("Location: DisStudent.php");
        $stmt->close();
        $conn->close();
        exit();
    } else {
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO student (Stu_id, Name, Department, Session, hall, Room_Number, Floor_Number) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Use prepared statements correctly
        $stmt->bind_param("sssssss", $Stu_id, $Name, $Department, $Session, $Hall, $Room_Number, $Floor_Number);

        if ($stmt->execute()) {
            echo "Success: Record inserted!";
            header("Location: DispStudent.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>