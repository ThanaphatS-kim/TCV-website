<?php
// การเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, first_name, last_name, class, student_code FROM students";
$result = $conn->query($sql);
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
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><a href='profile.php?student_code=" . $row['student_code'] . "'>" . $row['first_name'] . "</a></td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['student_code'] . "</td>";
                    echo "<td>";
                    echo "<input type='checkbox' name='attendance[]' value='" . $row['student_code'] . "'>";
                    echo "<input type='hidden' name='first_names[" . $row['student_code'] . "]' value='" . $row['first_name'] . "'>";
                    echo "<input type='hidden' name='last_names[" . $row['student_code'] . "]' value='" . $row['last_name'] . "'>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>ไม่มีข้อมูลนักเรียน</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="submit" class="enter-button">Enter</button>
</form>


    </div>


<?php
$conn->close();
?>

    <button class="button" onclick="document.location='index.php'">Back</button>
</body>

</html>
