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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['student_id']) && isset($_POST['new_student_id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['class']) && isset($_POST['total_attendance'])) {
        $student_id = $_POST['student_id'];
        $new_student_id = $_POST['new_student_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $class = $_POST['class'];
        $total_attendance = $_POST['total_attendance'];

        // ตรวจสอบว่ารหัสนักศึกษาใหม่มีอยู่แล้วในฐานข้อมูลหรือไม่
        $sql = "SELECT COUNT(*) as count FROM std_dt WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $new_student_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] > 0 && $new_student_id !== $student_id) {
            die("รหัสนักศึกษาใหม่ซ้ำกับที่มีอยู่ในฐานข้อมูล");
        }

        // เริ่มการทำธุรกรรม
        $conn->begin_transaction();
        try {
            // อัปเดตข้อมูลนักเรียน
            $sql = "UPDATE std_dt SET student_id = ?, first_name = ?, last_name = ?, class = ?, total_attendance = ? WHERE student_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssds", $new_student_id, $first_name, $last_name, $class, $total_attendance, $student_id);
            $stmt->execute();

            // ทำการ Commit ธุรกรรม
            $conn->commit();

            // เปลี่ยนเส้นทางไปยังหน้ารายงานสถานะ
            header("Location: rpstatus.php");
            exit();
        } catch (Exception $e) {
            // ทำการ Rollback ธุรกรรมในกรณีที่เกิดข้อผิดพลาด
            $conn->rollback();
            echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล: " . $e->getMessage();
        }

        $stmt->close();
    } else {
        echo "ข้อมูลไม่ครบถ้วน!";
    }
}

// ตรวจสอบว่ามีการส่ง student_id ผ่าน URL หรือไม่
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // ดึงข้อมูลนักเรียน
    $sql = "SELECT student_id, first_name, last_name, class, total_attendance FROM std_dt WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if (!$student) {
        die("ไม่พบนักเรียนที่ต้องการแก้ไข");
    }

    $stmt->close();
} else {
    die("ไม่มีการระบุ student_id");
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลนักเรียน</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="container">
        <h1>แก้ไขข้อมูลนักเรียน</h1>
        <form action="edit_student.php" method="POST">
            <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>">
            
            <label for="new_student_id">รหัสนักศึกษาใหม่:</label>
            <input type="text" id="new_student_id" name="new_student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>" required>
            
            <label for="first_name">ชื่อ:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($student['first_name']); ?>" required>
            
            <label for="last_name">นามสกุล:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($student['last_name']); ?>" required>
            
            <label for="class">ชั้น:</label>
            <input type="text" id="class" name="class" value="<?php echo htmlspecialchars($student['class']); ?>" required>
            
            <label for="total_attendance">จำนวนครั้งที่เข้าเรียน:</label>
            <input type="number" id="total_attendance" name="total_attendance" value="<?php echo htmlspecialchars($student['total_attendance']); ?>" required>
            
            <button type="submit" class="save-button">บันทึก</button>
        </form>
    </div>
    <button class="button" onclick="document.location='rpstatus.php'">กลับ</button>
</body>
</html>
