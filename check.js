// Select all anchor tags within the table
const studentLinks = document.querySelectorAll('table a');

// Add event listeners to each student link
studentLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent the default anchor behavior
        const studentName = event.target.textContent;
        alert(`สถานะการเข้าแถวของ ${studentName}`);
    });
});

// Add event listener to the enter button
document.querySelector('.enter-button').addEventListener('click', () => {
    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    let checkedStudents = [];
    checkboxes.forEach((checkbox, index) => {
        if (checkbox.checked) {
            const studentName = document.querySelector(`tbody tr:nth-child(${index + 1}) td:nth-child(2)`).textContent;
            checkedStudents.push(studentName);
        }
    });

    if (checkedStudents.length > 0) {
        alert(`เช็คชื่อนักเรียน: ${checkedStudents.join(', ')}`);
    } else {
        alert('กรุณาเช็คชื่อนักเรียนอย่างน้อย 1 คน');
    }
});
