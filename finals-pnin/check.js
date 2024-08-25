// function checkAttendance() {
//     var checkedBoxes = document.querySelector('input[name="attendance[]"]:checked');

//     if (checkedBoxes.length > 0) {
//         checkedBoxes.forEach(function(checkbox) {
//             // ดึงข้อมูลของแถวที่มี Checkbox นี้
//             var row = checkbox.closest('tr');
//             var index = row.cells[1].innerText;
//             var firstName = row.cells[2].innerText;
//             var lastName = row.cells[3].innerText;
            
//             console.log("ลำดับที่: " + index + ", ชื่อ: " + firstName + ", นามสกุล: " + lastName);
//         });
//     } else {
//         console.log("ไม่มีนักเรียนถูกเช็คชื่อ");
//     }
// }

