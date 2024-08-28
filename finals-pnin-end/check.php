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

$sql = "SELECT id, student_number, first_name, last_name, class, student_id, total_attendance FROM std_dt";
$result = $conn->query($sql);

if (!$result) {
    die("การดึงข้อมูลผิดพลาด: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เช็คชื่อ</title>
    <link rel="stylesheet" href="check.css">
</head>
<body>
    <div class="container">
        <h1>หน้าเช็คชื่อ</h1>
        <p>สามารถกดติ๊กเช็คชื่อ และกดชื่อที่นักเรียนเพื่อดูสถานะการเข้าแถวของนักเรียนได้</p>

        <form action="process_attendance.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>เลขที่</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ชั้น</th>
                        <th>รหัส นศ.</th>
                        <th>เช็คชื่อ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td><a href='profile.php?student_id=" . htmlspecialchars($row['student_id']) . "'>" . htmlspecialchars($row['first_name']) . "</a></td>";
                            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                            echo "<td><input type='checkbox' name='attendance[]' value='" . htmlspecialchars($row['student_id']) . "'></td>";
                            echo "<td><a href='edit_student.php?student_id=" . htmlspecialchars($row['student_id']) . "' class='edit-link'>แก้ไข</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>ไม่มีข้อมูลนักเรียน</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="enter-button">Enter</button>
        </form>
    </div>
    <button class="button" onclick="document.location='home.php'">Back</button>

    <?php
    $conn->close();
    ?>
</body>
</html>
