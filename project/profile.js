function loadProfile() {
    // Load profile data from Local Storage
            const image = localStorage.getItem('profileImage') || 'img/profile.png';
            document.getElementById('profileImage').src = image;
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
