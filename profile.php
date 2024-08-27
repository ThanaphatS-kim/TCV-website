<?php
// การเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับค่า student_id จาก URL
$student_id = $_GET['student_id'];

// ดึงข้อมูลนักเรียน
$sql = "SELECT * FROM std_dt WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    echo "ไม่พบนักเรียน";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์นักเรียน</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="container">
        <h1>ข้อมูลนักเรียน</h1>
        <p>ชื่อ: <?php echo $student['first_name']; ?></p>
        <p>นามสกุล: <?php echo $student['last_name']; ?></p>
        <p>ชั้น: <?php echo $student['class']; ?></p>
        <p>รหัส นศ.: <?php echo $student['student_id']; ?></p>
        <!-- สามารถเพิ่มข้อมูลอื่น ๆ ตามที่ต้องการ -->
    </div>
    <button class="button" onclick="document.location='check.php'">ย้อนกลับ</button>
</body>
</html>
