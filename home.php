<?php 

    session_start();

    if ($_SESSION['id'] == "") {
        header("location: signin.php");
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <input type="checkbox" id="check" class="hide">
    <div class="container">
        <label for="check">
            <i class="fas fa-angle-left" id="arrow"></i>
        </label>
        <div class="imgbox"><img src="img/background.png" alt=""></div>
            <ol class="navbar">
                <li><a href=""><i class="fas fa-tv"></i><p>เช็คชื่อ</p></a></li>
                <li><a href=""><i class="far fa-user"></i><p>ข้อมูลผู้ใช้</p></a></li>
                <li><a href=""><i class="far fa-user"></i><p>ข้อมูลนักเรียน</p></a></li>
                <li><a href="crud.php"><i class="far fa-address-book"></i><p>เพิ่มรายชื่อนักเรียน</p></a></li>
                <li><a href=""><i class="fas fa-chart-pie"></i><p>รายงานสถานะนักเรียน</p></a></li>
                <li><a href=""><i class="far fa-user"></i><p>Contact</p></a></li>
                <a href="index.php" class="btn btn-danger">Logout</a>
            </ol>
        
    </div>
</body>
</html>

<?php 

}
?>