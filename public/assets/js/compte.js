var emailInput = document.getElementById('email');
var emailError = document.getElementById('emailError');

emailInput.addEventListener('blur',function(e) {
    var emailPattern = /.+@uae\.ac\.ma/;
    if (!emailPattern.test(emailInput.value)) {
        emailError.style.display = 'block';
    } else {
        emailError.style.display = 'none';
    }
});