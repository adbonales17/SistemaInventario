<?php

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.html");
    exit();
}

?>
<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/home.css">

    <title>Inicio</title>
</head>
<body>
    <main>
        <div class="wrapper">
            <div class="one">
                <a href="actives.php" class="uno">
                    <ion-icon class="wrapper-icon" name="reader-outline"></ion-icon>  Lista de activos 
                </a>
            </div>
            <div class="two">
                <a href="pagina-destino-2.html" class="uno">
                    <ion-icon class="wrapper-icon" name="people-outline"></ion-icon> Cuentas 
                </a>
            </div>
            <div class="three">
                <a href="pagina-destino-3.html" class="uno">
                    <ion-icon class="wrapper-icon" name="wallet-outline"></ion-icon> Licencias de Software 
                </a>
            </div>
            <div class="four">
                <a href="phones.php" class="uno">
                    <ion-icon class="wrapper-icon" name="phone-portrait-outline"></ion-icon> Telefonos
                </a>
            </div>
        </div>



    </main>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

