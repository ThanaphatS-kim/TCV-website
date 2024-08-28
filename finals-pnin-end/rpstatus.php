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

// คำสั่ง SQL เพื่อดึงข้อมูลนักเรียนและจำนวนครั้งที่เข้าเรียน
$sql = "SELECT id, first_name, last_name, class, student_id, COALESCE(total_attendance, 0) as total_attendance
        FROM std_dt";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rpstatus.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>รายงานสถานะ</title>
</head>
<body>
    <div class="container">
        <h1>หน้ารายงานผลการเข้าแถว</h1>
        <p>จำนวนครั้งการเข้าแถวของนักเรียน</p>
        <table>
            <thead>
                <tr>
                    <th>เลขที่</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ชั้น</th>
                    <th>รหัส นศ.</th>
                    <th>จำนวนครั้ง</th>
                    <th>แก้ไข</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td><a href='profile.php?student_id=" . htmlspecialchars($row['student_id']) . "'>" . htmlspecialchars($row['first_name']) . "</a></td>";
                        echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['total_attendance']) . "</td>";
                        echo "<td><a href='edit_student.php?student_id=" . htmlspecialchars($row['student_id']) . "' class='edit-link'>แก้ไข</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>ไม่มีข้อมูลนักเรียน</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <button class="button" onclick="document.location='home.php'">กลับ</button>
</body>
</html>

<?php
$conn->close();
?>
