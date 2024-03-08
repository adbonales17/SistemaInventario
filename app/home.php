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

    <link rel="stylesheet" href="style/home.css">

    <title>Inicio</title>
</head>
<body>
    <main>


        <div class="wrapper">
            <div class="one">One
                <div class="wrapper-in"> 
                    <div class="uno">Uno <ion-icon name="reader-outline"></ion-icon> </div>

                    <div class="dos">Dos </div>
                </div>
            </div>
            <div class="two">Two
                <div class="wrapper-in"> 
                    <div class="uno">Uno </div>

                    <div class="dos">Dos </div>
                </div>
            </div>
            <div class="three">Three
                <div class="wrapper-in"> 
                    <div class="uno">Uno </div>

                    <div class="dos">Dos </div>
                </div>
            </div>
            <div class="four">Four
                <div class="wrapper-in"> 
                    <div class="uno">Uno </div>

                    <div class="dos">Dos </div>
                </div>
            </div>
        </div>



        <h1>Holaaaaaaaaaaaaaaa</h1>



    </main>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

