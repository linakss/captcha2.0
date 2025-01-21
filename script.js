document.getElementById('refresh-captcha').addEventListener('click', function() {
    document.getElementById('captcha-image').src = 'captcha_image.php?' + new Date().getTime(); 
});
