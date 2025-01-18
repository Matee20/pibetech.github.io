document.querySelector('form').addEventListener('submit', function(event) {
    var password = document.querySelector('input[name="password"]').value;
    var confirmPassword = document.querySelector('input[name="confirm_password"]').value;
    
    if (password !== confirmPassword) {
        event.preventDefault();
        alert("Las contraseñas no coinciden.");
    }
});


