<?php
include 'db/conexion.php'; // Conexion a la base de datos
session_start(); // Iniciar sesión al principio

function esUsuarioValido($username) { // Restrinccion de caracteres especiales
    return preg_match("/^[A-Za-z0-9]+$/", $username);
}

function usuarioExiste($conn, $username) { // Verificacion si hay nombres similares
    $query = "SELECT * FROM usuarios WHERE username = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultado = mysqli_stmt_num_rows($stmt) > 0;
        mysqli_stmt_close($stmt);
        return $resultado;
    }
    return false;
}

function esContrasenaSegura($password) { // Restrinccion para una contraseña segura
    return strlen($password) >= 8 && preg_match("/[0-9]+/", $password) && preg_match("/[A-Z]+/", $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Verifica si el usuario ya existe, que el campo este lleno, no obtenga caracteres especiales
    if (empty($username)) {
        $_SESSION['error_username'] = "El nombre de usuario es requerido.";
    } elseif (!esUsuarioValido($username)) {
        $_SESSION['error_username'] = "El nombre de usuario no debe contener caracteres especiales.";
    } elseif (usuarioExiste($conn, $username)) {
        $_SESSION['error_username'] = "El nombre de usuario ya existe. Por favor, elija otro.";
    } elseif (!esContrasenaSegura($password)) {
        $_SESSION['error_password'] = "La contraseña no es segura. Debe tener al menos 8 caracteres, incluir números y mayúsculas.";
    } else {
        // Hash de la contraseña (seguridad básica)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: home.php");
                exit();
            } else {
                echo "Error al registrar: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Estilos --> 
    <link rel="stylesheet" href="./style/login.css">
    <link rel="stylesheet" href="./style/register_user.css">

    <title>Sing in</title>

</head>
<body>

   <!--Formulario de registro de usuarios --> 
    <div class="login-box">
        <form action="register_user.php" method="post" class="form">
            <img src="./img/isaosa.png" alt="Descripción" height="24" width="108">
            <p class="title">Register</p>
            <input placeholder="User" type="text" id="username" name="username" class="email">
            <?php if (isset($_SESSION['error_username'])): ?>
                <div class="error-message"><?php echo $_SESSION['error_username']; ?></div>
                <?php unset($_SESSION['error_username']); ?>
            <?php endif; ?>
            
            <input placeholder="Password" type="password" id="password" name="password" class="email">
            <?php if (isset($_SESSION['error_password'])): ?>
                <div class="error-message"><?php echo $_SESSION['error_password']; ?></div>
                <?php unset($_SESSION['error_password']); ?>
            <?php endif; ?>
            
            <p class="text">Already account? <a href="login.php">Sing in!</a></p>
            <p class="text"><a>Can't access your account?</a></p>
            <div class="button_row">
              <button type="submit" value="Registrarse" class="button secondary_button">Next</button>
            </div>
        </form>
    </div>

    <!-- Llamada de Scripts --> 
    <script src="js/validation.js"></script>
    
</body>
</html>
