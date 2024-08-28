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
    if (!empty($_POST['attendance'])) {
        $attended_students = $_POST['attendance'];

        foreach ($attended_students as $student_id) {
            $student_id = $conn->real_escape_string($student_id);

            // อัปเดตจำนวนครั้งที่นักเรียนเข้ามาเรียน
            $sql = "UPDATE std_dt SET total_attendance = total_attendance + 1 WHERE student_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $student_id);
            $stmt->execute();
        }
    }

    header("Location: rpstatus.php");
    exit();
}

$conn->close();
?>
