<?php
$S_ID = $_POST['S_ID'];
$Name = $_POST['Name'];
$Address = $_POST['Address'];
$Email = $_POST['Email'];
$Designation = $_POST['Designation'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'DMS');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

try {
    // Check if S_ID already exists
    $stmt = $conn->prepare("SELECT S_ID FROM staff WHERE S_ID = ?");
    $stmt->bind_param("s", $S_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->fetch_assoc()) {
        echo "S_ID already exists. Please choose a different ID.";
        exit;
    }
    $stmt->close();

    // Insert data into the table
    $stmt = $conn->prepare("INSERT INTO staff (S_ID, Name, Address, Email, Designation) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $S_ID, $Name, $Address, $Email, $Designation);

    if (!$stmt->execute()) {
        throw new Exception("Error inserting data: " . $stmt->error);
    }

    echo "Staff info is inserted successfully...";
    $stmt->close();
    $conn->close();
    header("Location: DispStaff.php");
    exit;
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
    $conn->close();
}
?>