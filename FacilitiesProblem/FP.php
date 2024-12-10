<?php
// Kiểm tra nếu dữ liệu được gửi qua POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra và lấy dữ liệu từ form
    $Room_Number = isset($_POST['Room_Number']) ? $_POST['Room_Number'] : null;
    $Damaged_Fan_Un = isset($_POST['Damaged_Fan_Un']) ? $_POST['Damaged_Fan_Un'] : 0;
    $Damaged_Fan_Pro = isset($_POST['Damaged_Fan_Pro']) ? $_POST['Damaged_Fan_Pro'] : 0;
    $Damaged_Fan_Sol = isset($_POST['Damaged_Fan_Sol']) ? $_POST['Damaged_Fan_Sol'] : 0;
    $Damaged_Light_Un = isset($_POST['Damaged_Light_Un']) ? $_POST['Damaged_Light_Un'] : 0;
    $Damaged_Light_Pro = isset($_POST['Damaged_Light_Pro']) ? $_POST['Damaged_Light_Pro'] : 0;
    $Damaged_Light_Sol = isset($_POST['Damaged_Light_Sol']) ? $_POST['Damaged_Light_Sol'] : 0;
    $Modified_Date = isset($_POST['Modified_Date']) ? $_POST['Modified_Date'] : null;

    // Kiểm tra các trường bắt buộc
    if ($Room_Number && $Modified_Date) {
        include 'connection.php';
        if ($conn->connect_error) {
            die("Connection Failed : " . $conn->connect_error);
        } else {
            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare("INSERT INTO Facility_problem(Room_Number, Damaged_Fan_Un, Damaged_Fan_Pro, Damaged_Fan_Sol, Damaged_Light_Un, Damaged_Light_Pro, Damaged_Light_Sol, Modified_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiiiiis", $Room_Number, $Damaged_Fan_Un, $Damaged_Fan_Pro, $Damaged_Fan_Sol, $Damaged_Light_Un, $Damaged_Light_Pro, $Damaged_Light_Sol, $Modified_Date);

            // Thực thi câu lệnh
            if ($stmt->execute()) {
//                echo "Thêm dữ liệu thành công!";
                header("Location:DispFP.php");
            } else {
                echo "Lỗi: " . $stmt->error;
            }

            // Đóng kết nối
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
} else {
    echo "Yêu cầu không hợp lệ!";
}
?>
