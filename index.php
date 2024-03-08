

<?php
session_start();

// Verificar si el usuario está autenticado
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Si está autenticado, redirigir al home
    header("Location: app/home.php");
    exit();
}

// Si no está autenticado, redirigir al formulario de inicio de sesión (login.php)
header("Location: app/login.php");
exit();
?>

