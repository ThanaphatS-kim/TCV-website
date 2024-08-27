function loadProfile() {
    // Load profile data from Local Storage
    const name = localStorage.getItem('name') || 'กนกพล';
    const surname = localStorage.getItem('surname') || 'กิตติพรประชา';
    const department = localStorage.getItem('department') || 'เทคโนโลยีสารสนเทศ';

    document.getElementById('name').textContent = 'ชื่อ : ' + name;
    document.getElementById('surname').textContent = 'นามสกุล : ' + surname;
    document.getElementById('department').textContent = 'แผนก : ' + department;

    document.getElementById('nameInput').value = name;
    document.getElementById('surnameInput').value = surname;
    document.getElementById('departmentInput').value = department;
}

document.getElementById('editButton').addEventListener('click', function() {
    document.getElementById('profileInfo').style.display = 'none';
    document.getElementById('editForm').style.display = 'block';
});

function saveChanges() {
    // Save profile data to Local Storage
    const name = document.getElementById('nameInput').value;
    const surname = document.getElementById('surnameInput').value;
    const department = document.getElementById('departmentInput').value;

    localStorage.setItem('name', name);
    localStorage.setItem('surname', surname);
    localStorage.setItem('department', department);

    // Update profile with new values
    document.getElementById('name').textContent = 'ชื่อ : ' + name;
    document.getElementById('surname').textContent = 'นามสกุล : ' + surname;
    document.getElementById('department').textContent = 'แผนก : ' + department;

    // Hide form and show profile info
    document.getElementById('profileInfo').style.display = 'block';
    document.getElementById('editForm').style.display = 'none';
}
function changeImage() {
    const fileInput = document.getElementById('imageInput');
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const imageUrl = e.target.result;
            document.getElementById('profileImage').src = imageUrl;
            localStorage.setItem('profileImage', imageUrl);
        };

        reader.readAsDataURL(file);
    }
}