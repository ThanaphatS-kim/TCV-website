<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="process_attendance.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>

<body>
    <div class="container">
        <h1>รายชื่อนักเรียนที่เช็คชื่อแล้ว</h1>
        <table id="attendanceTable">
            <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (!empty($_POST['attendance'])) {
                        $attended_students = $_POST['attendance'];
                        $first_names = isset($_POST['first_names']) ? $_POST['first_names'] : [];
                        $last_names = isset($_POST['last_names']) ? $_POST['last_names'] : [];
                        $total_students = 21; 
                        $index = 1;

                        foreach ($attended_students as $student_code) {
                            $first_name = isset($first_names[$student_code]) ? htmlspecialchars($first_names[$student_code]) : "ไม่ทราบชื่อ";
                            $last_name = isset($last_names[$student_code]) ? htmlspecialchars($last_names[$student_code]) : "ไม่ทราบนามสกุล";

                            echo "<tr>";
                            echo "<td>" . $index . "</td>";
                            echo "<td>" . $first_name . "</td>";
                            echo "<td>" . $last_name . "</td>";
                            echo "</tr>";

                            $index++;
                        }
                    } else {
                        echo "<tr><td colspan='3'>ไม่มีนักเรียนที่ถูกเช็คชื่อ</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>การส่งข้อมูลผิดพลาด</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <button class="button" type="submit" onclick="">Submit</button>
        <button class="button" onclick="document.location='check.php'">Back</button>
    </div>
    
</body>
<script src="process_attendance.js"></script>
</html>