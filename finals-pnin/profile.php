<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User Profile</title>
</head>
<body onload="loadProfile()">
    <div class="container mt-5">
        <div class="card" style="width: 500px; height: auto; position: relative;">
            <div class="profile-img-wrapper">
                <img id="profileImage" src="img/profile.png" class="card-img-top" alt="Profile Image">
                <input type="file" id="imageInput" accept="image/*" onchange="changeImage()">
                <label for="imageInput">Change Image</label>
            </div>
            <div class="card-body">
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

        <button class="btn btn-primary" style="background-color: #7d2ea8; border: none;" onclick="document.location='check.php'">Back</button>
        </div>
    </div>
</div>


</body>
<script src="profile.js"></script>
</html>