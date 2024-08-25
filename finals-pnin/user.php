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
            <i class='bx bxs-edit-alt edit' id="editButton"></i>
            <div class="profile-img-wrapper">
                <img id="profileImage" src="img/profile.png" class="card-img-top" alt="Profile Image">
                <input type="file" id="imageInput" accept="image/*" onchange="changeImage()">
                <label for="imageInput">Change Image</label>
            </div>
            <div class="card-body">
                <h5 class="card-title">อาจารย์</h5>
                <div id="profileInfo">
                    <p class="card-text" id="name">ชื่อ : กนกพล</p>
                    <p class="card-text" id="surname">นามสกุล : กิตติพรประชา</p>
                    <p class="card-text" id="department">แผนก : เทคโนโลยีสารสนเทศ</p>
                </div>
                <form id="editForm" style="display: none;">
                    <div class="form-group">
                        <label for="nameInput">ชื่อ:</label>
                        <input type="text" class="form-control" id="nameInput">
                    </div>
                    <div class="form-group">
                        <label for="surnameInput">นามสกุล:</label>
                        <input type="text" class="form-control" id="surnameInput">
                    </div>
                    <div class="form-group">
                        <label for="departmentInput">แผนก:</label>
                        <input type="text" class="form-control" id="departmentInput">
                    </div>
                    <button type="button" class="btn btn-primary" style="background-color: #7d2ea8; border: none;" onclick="saveChanges()">Save</button>
                </form>
                <br>
                <a href="home.php" class="btn btn-primary" style="background-color: #7d2ea8; border: none;">Back</a>
            </div>
        </div>
    </div>
</body>
<script src="user.js"></script>
</html>
