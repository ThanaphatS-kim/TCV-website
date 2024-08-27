// function calculateAttendancePercentage() {
//     var table = document.getElementById("attendanceTable");
//     var rows = table.getElementsByTagName("tr").length - 1; // ลบ 1 เพื่อข้ามแถวหัวข้อ
//     var totalStudents = <?php echo $total_students; ?>; // ดึงจำนวนรวมของนักเรียนจาก PHP

//     // คำนวณเปอร์เซ็นต์
//     var attendancePercentage = (rows / totalStudents) * 100;

//     // เก็บผลลัพธ์ใน localStorage เพื่อนำไปใช้ในหน้าอื่น
//     localStorage.setItem('attendancePercentage', attendancePercentage.toFixed(2));

//     // ส่งไปยังหน้าผลลัพธ์
//     window.location.href = 'rpstatus.php';
// }

// window.onload = calculateAttendancePercentage;