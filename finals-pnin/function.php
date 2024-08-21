<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="function.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เช็คชื่อ</title>
</head>

<body>
    <div class="container">
        <h1>หน้าเช็คชื่อ</h1>
        <p>สามารถกดติ๊กเช็คชื่อ และกดชื่อที่นักเรียนเพื่อดูสถานะการเข้าแถวของนักเรียนได้</p>
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
                // การเชื่อมต่อกับฐานข้อมูล
                $servername = "localhost";
                $username = "root"; // ชื่อผู้ใช้ของฐานข้อมูล
                $password = ""; // รหัสผ่านของฐานข้อมูล
                $dbname = "student"; // ชื่อฐานข้อมูล

                // สร้างการเชื่อมต่อ
                $conn = new mysqli($servername, $username, $password, $dbname);

                // ตรวจสอบการเชื่อมต่อ
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // ดึงข้อมูลนักเรียนจากฐานข้อมูล
                $sql = "SELECT id, first_name, last_name, class, student_code FROM std_dt";
                $result = $conn->query($sql);
                ?>

                <?php
                // แสดงผลข้อมูลนักเรียน
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td><a href='profile.php?student_code=" . $row['student_code'] . "'>" . $row['first_name'] . "</a></td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo "<td>" . $row['student_code'] . "</td>";
                        echo "<td><input type='checkbox'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>ไม่มีข้อมูลนักเรียน</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="check.js"></script>

</html>

<?php
// ปิดการเชื่อมต่อ
$conn->close();
?>