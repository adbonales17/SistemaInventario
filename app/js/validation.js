
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.form').addEventListener('submit', function(event) {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var errorUsername = document.getElementById('error-username');
        var errorPassword = document.getElementById('error-password');
        var isValid = true;

        errorUsername.textContent = '';
        errorPassword.textContent = '';

        // Validación del nombre de usuario
        if (username.trim() === '') {
            errorUsername.textContent = 'El nombre de usuario es requerido.';
            isValid = false;
        } else if (!esUsuarioValido(username)) {
            errorUsername.textContent = 'El nombre de usuario no debe contener caracteres especiales.';
            isValid = false;
        }

        // Validación de la contraseña
        if (password.trim() === '') {
            errorPassword.textContent = 'La contraseña es requerida.';
            isValid = false;
        } else if (!esContrasenaSegura(password)) {
            errorPassword.textContent = 'La contraseña no es segura. Debe tener al menos 8 caracteres, incluir números y mayúsculas.';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});

function esUsuarioValido(username) {
    return /^[A-Za-z0-9]+$/.test(username); // Solo permite letras y números
}

function esContrasenaSegura(password) {
    return password.length >= 8 && /[0-9]/.test(password) && /[A-Z]/.test(password);
}

