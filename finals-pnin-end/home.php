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
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
    body {
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url("img/bgtvc.png");
}
    </style>
</head>
<body>
    <input type="checkbox" id="check" class="hide">
    <div class="container">
        <label for="check">
        <i class='bx bxs-chevrons-left' id="arrow"></i>
        </label>
        <div class="imgbox"><img src="img\tvc.png" alt=""></div>
        <ul class="navbar">
            <li><a href="check.php"><i class='bx bxs-calendar-check'></i><p>เช็คชื่อ</p></a></li>
            <li><a href="user.php"><i class='bx bxs-user-account'></i><p>ข้อมูลผู้ใช้</p></a></li>
            <li><a href="rpstatus.php"><i class='bx bxs-objects-vertical-bottom'></i><p>รายงานสถานะนักเรียน</p></a></li>
            <li><a href="contact.php"><i class='bx bxs-contact' ></i><p>Contact</p></a></li>
            <li><a href="#" id="logoutButton"><i class='bx bx-log-out' ></i><p>Logout</p></a></li>
        </ul>
    </div>
    
</body>
<script src="home.js"></script>
</html>
<?php 

}
?>