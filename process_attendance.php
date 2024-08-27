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
        $first_names = isset($_POST['first_names']) ? $_POST['first_names'] : [];
        $last_names = isset($_POST['last_names']) ? $_POST['last_names'] : [];

        foreach ($attended_students as $student_code) {
            $student_id = $conn->real_escape_string($student_code);

            // คำนวณเปอร์เซ็นต์
            $sql = "SELECT COUNT(DISTINCT date) as total_present, 
                           (SELECT COUNT(DISTINCT date) FROM attendance WHERE date IS NOT NULL) as total_days
                    FROM attendance
                    WHERE student_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $student_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $total_days = $row['total_days'] > 0 ? $row['total_days'] : 1;
            $total_present = $row['total_present'];
            $percentage = ($total_present / $total_days) * 100;

            // อัปเดตเปอร์เซ็นต์ในฐานข้อมูล
            $sql = "UPDATE std_dt SET percentage = ? WHERE student_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ds", $percentage, $student_id);
            $stmt->execute();
        }
    }

    header("Location: rpstatus.php");
    exit();
}

$conn->close();
?>
