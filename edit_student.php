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

$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : 0;

if ($student_id > 0) {
    $sql = "SELECT std_dt.id, std_dt.first_name, std_dt.last_name, std_dt.class, std_dt.student_id, 
                   COALESCE(COUNT(DISTINCT attendance.date), 0) as total_present, 
                   (SELECT COUNT(DISTINCT date) FROM attendance WHERE date IS NOT NULL) as total_days
            FROM std_dt
            LEFT JOIN attendance ON std_dt.student_id = attendance.student_id
            WHERE std_dt.student_id = ?
            GROUP BY std_dt.student_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_days = $row['total_days'] > 0 ? $row['total_days'] : 1; // ป้องกันการหารด้วย 0
        $percentage = ($row['total_present'] / $total_days) * 100;
    } else {
        die("ข้อมูลนักเรียนไม่พบ");
    }
} else {
    die("รหัสนักเรียนไม่ถูกต้อง");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit_student.css">
    <title>แก้ไขข้อมูลนักเรียน</title>
</head>
<body>
    <div class="container">
        <h1>แก้ไขข้อมูลนักเรียน</h1>
        <form action="update_student.php" method="POST">
            <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>">
            <label for="first_name">ชื่อ:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required><br>
            <label for="last_name">นามสกุล:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required><br>
            <label for="class">ชั้น:</label>
            <input type="text" id="class" name="class" value="<?php echo htmlspecialchars($row['class']); ?>" required><br>
            <button type="submit">บันทึก</button>
        </form>
        <button class="button" onclick="document.location='rpstatus.php'">กลับ</button>
    </div>
</body>
</html>

<?php
$conn->close();
?>

