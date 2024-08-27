document.getElementById('logoutButton').addEventListener('click', function(){
    const confirmlogout = confirm('คุณต้องการออกจากระบบจริงๆ หรือไม่');

    if (confirmlogout) {
        window.location.href = 'index.php';
    } else {
        alert('คุณยังอยู่ในระบบ');
    }
});