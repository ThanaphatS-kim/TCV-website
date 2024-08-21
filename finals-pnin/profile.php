<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <i class='bx bx-edit'></i>
            <img src="img\profile.png" alt="">
        </div>
        <?php
        // เชื่อมต่อกับฐานข้อมูล
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "student";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // ตรวจสอบการเชื่อมต่อ
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // ดึงค่า student_code จาก URL
        $student_code = $_GET['student_id'];

        // ดึงข้อมูลนักเรียนจากฐานข้อมูลโดยใช้ student_code
        $sql = "SELECT * FROM std_dt WHERE student_id = '$student_code'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // แสดงข้อมูลนักเรียน
            echo "<h1>โปรไฟล์นักเรียน</h1>";
            echo "<p>ชื่อ: " . $row['first_name'] . "</p>";
            echo "<p>นามสกุล: " . $row['last_name'] . "</p>";
            echo "<p>ชั้น: " . $row['class'] . "</p>";
            echo "<p>รหัสนักเรียน: " . $row['student_id'] . "</p>";
        } else {
            echo "ไม่พบข้อมูลนักเรียน";
        }

        // ปิดการเชื่อมต่อ
        $conn->close();
        ?>
        <button class="button" onclick="document.location='check.php'">Back</button>
    </div>

</body>

</html>