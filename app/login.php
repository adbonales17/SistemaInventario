<?php
include 'db/conexion.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT id, username, password FROM usuarios WHERE username=?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $user_id, $db_username, $db_password);
    mysqli_stmt_fetch($stmt);

    if (password_verify($password, $db_password)) {
        $_SESSION["loggedin"] = true;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["username"] = $db_username;
        header("Location: pages/home.php");
        exit();
    } else {
        $_SESSION["error"] = "Nombre de usuario o contraseña incorrecto";
        header("Location: login.php");
        exit();
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/login.css">

    <title>Sing in</title>
</head>
<body>
    <div class="login-box">
        
        <form action="login.php" method="post" class="form">
            <img src="./img/isaosa.png" class="logo" alt="Descripción">            
            <p class="title">Sign in</p>
             <!-- Mostrar mensaje de error si existe -->
            <?php if (isset($_SESSION["error"])): ?>
                <div class="error-message">
                    <?php 
                    echo $_SESSION["error"]; 
                    unset($_SESSION["error"]); // Limpiar el mensaje después de mostrarlo
                    ?>
                </div>
            <?php endif; ?>
            <input placeholder="Username" type="text" id="username" name="username" class="email">
            <input placeholder="Password" type="password" id="password" name="password" class="email">
            <p class="text">No account? <a href="register_user.php">Create one!</a></p>
            <p class="text"><a>Can't access your account?</a></p>
            <div class="button_row">
              <button class="button primary_button">Next</button>
            </div>
        </form>
    </div>
</body>
</html>


