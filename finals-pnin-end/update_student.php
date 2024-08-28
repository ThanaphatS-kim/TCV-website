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
    if (isset($_POST['student_id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['class']) && isset($_POST['total_attendance'])) {
        $student_id = intval($_POST['student_id']);
        $first_name = $conn->real_escape_string($_POST['first_name']);
        $last_name = $conn->real_escape_string($_POST['last_name']);
        $class = $conn->real_escape_string($_POST['class']);
        $total_attendance = intval($_POST['total_attendance']); // จำนวนครั้งที่เข้าเรียน

        if ($student_id > 0) {
            $sql = "UPDATE std_dt 
                    SET first_name = ?, last_name = ?, class = ?, total_attendance = ?
                    WHERE student_id = ?";
            
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                die("การเตรียมคำสั่ง SQL ล้มเหลว: " . $conn->error);
            }
            $stmt->bind_param("sssii", $first_name, $last_name, $class, $total_attendance, $student_id);
            
            if ($stmt->execute()) {
                echo "<p>ข้อมูลนักเรียนถูกอัปเดตสำเร็จ</p>";
            } else {
                echo "<p>เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>รหัสนักเรียนไม่ถูกต้อง</p>";
        }
    } else {
        echo "<p>ข้อมูลไม่ครบถ้วน</p>";
    }
}

$conn->close();
?>

<a href="rpstatus.php">กลับไปยังหน้ารายงาน</a>
