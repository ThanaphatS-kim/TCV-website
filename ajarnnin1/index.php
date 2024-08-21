<?php 

    session_start();

    if ($_SESSION['id'] == "") {
        header("location: login.php");
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <input type="checkbox" id="check" class="hide">
    <div class="container">
        <label for="check">
            <i class="fas fa-angle-left" id="arrow"></i>
        </label>
        <div class="imgbox"><img src="img\tvc.png" alt=""></div>
        <ul class="navbar">
            <li><a href="check.php"><i class="fas fa-tv"></i><p>เช็คชื่อ</p></a></li>
            <li><a href="user.php"><i class="far fa-user"></i><p>ข้อมูลผู้ใช้</p></a></li>
            <li><a href="profile.php"><i class="far fa-user"></i><p>ข้อมูลนักเรียน</p></a></li>
            <li><a href="rpstatus.php"><i class="fas fa-chart-pie"></i><p>รายงานสถานะนักเรียน</p></a></li>
            <li><a href="contact.php"><i class="far fa-user"></i><p>Contact</p></a></li>
            <li><a href="login.php" id="loginButton"><i class="fa-regular fa-envelope"></i><p>Login</p></a></li>
            <li><a href="login.php" id="loginButton"><i class="fa-regular fa-envelope"></i><p>Logout</p></a></li>
        </ul>
    </div>
    <script src="index.js"></script>
</body>
</html>
<?php 

}
?>