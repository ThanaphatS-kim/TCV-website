<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงค่า student_code จาก URL
$student_code = $_GET['student_code'];

// ดึงข้อมูลนักเรียนจากฐานข้อมูลโดยใช้ student_code
$sql = "SELECT * FROM students WHERE student_code = '$student_code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // แสดงข้อมูลนักเรียน
    echo "<h1>โปรไฟล์นักเรียน</h1>";
    echo "<p>ชื่อ: " . $row['first_name'] . "</p>";
    echo "<p>นามสกุล: " . $row['last_name'] . "</p>";
    echo "<p>ชั้น: " . $row['class'] . "</p>";
    echo "<p>รหัสนักเรียน: " . $row['student_code'] . "</p>";
} else {
    echo "ไม่พบข้อมูลนักเรียน";
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
