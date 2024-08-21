<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['attendance'])) {
        $attended_students = $_POST['attendance'];
        $first_names = isset($_POST['first_names']) ? $_POST['first_names'] : [];
        $last_names = isset($_POST['last_names']) ? $_POST['last_names'] : [];
        
        echo "นักเรียนที่เช็คชื่อแล้ว:<br>";
        foreach ($attended_students as $student_code) {
            // ตรวจสอบว่าคีย์มีอยู่ใน array ก่อนใช้งาน
            $first_name = isset($first_names[$student_code]) ? htmlspecialchars($first_names[$student_code]) : "ไม่ทราบชื่อ";
            $last_name = isset($last_names[$student_code]) ? htmlspecialchars($last_names[$student_code]) : "ไม่ทราบนามสกุล";
            echo "ชื่อ: " . $first_name . " นามสกุล: " . $last_name . "<br>";
        }
    } else {
        echo "ไม่มีนักเรียนที่ถูกเช็คชื่อ";
    }
} else {
    echo "การส่งข้อมูลผิดพลาด";
}
?>
