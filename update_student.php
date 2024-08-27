<?php
// การเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อผิดพลาด: " . $conn->connect_error);
}

$student_id = isset($_POST['student_id']) ? intval($_POST['student_id']) : 0;
$first_name = isset($_POST['first_name']) ? $conn->real_escape_string($_POST['first_name']) : '';
$last_name = isset($_POST['last_name']) ? $conn->real_escape_string($_POST['last_name']) : '';
$class = isset($_POST['class']) ? $conn->real_escape_string($_POST['class']) : '';

// ตรวจสอบว่า ID ของนักเรียนถูกต้อง
if ($student_id > 0) {
    $sql = "UPDATE std_dt 
            SET first_name = ?, last_name = ?, class = ?
            WHERE student_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $first_name, $last_name, $class, $student_id);
    
    if ($stmt->execute()) {
        echo "<p>ข้อมูลนักเรียนถูกอัปเดตสำเร็จ</p>";
    } else {
        echo "<p>เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . $stmt->error . "</p>";
    }
} else {
    echo "<p>รหัสนักเรียนไม่ถูกต้อง</p>";
}

$stmt->close();
$conn->close();
?>

<a href="rpstatus.php">กลับไปยังหน้ารายงาน</a>
