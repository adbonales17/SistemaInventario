<?php

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.html");
    exit();
}

//Se incluye el side-menu desde otro archivo.
?>
<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefonos - Isaosa</title>

    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../style/phone.css">

</head>
<body>

    <main>
        
        <div class="wrapper">

            <!-- Modal HTML ventana emergente del Formulario -->
            <div id="modalRegistrar" class="modal">
                <div class="modal-content">
                    <section class="container">
                        <span class="close">&times;</span>
                        <header>Formulario de registro - Telefonos</header>
                        <form id="registrationForm" action="procesar.php" class="form" method="post">

                            <!-- Formulario multi-step Seccion 1 -->
                            <div class="form-section" id="formSection1">
                                <div class="input-box">
                                    <label>Nombre Completo</label>
                                    <input required="" placeholder="Ingresa nombre completo" type="text">
                                </div>
                                <div class="column">
                                    <div class="input-box">
                                        <label>Numero de telefono</label>
                                        <input required="" placeholder="Ingresa numero de telefono" type="telephone">
                                    </div>
                                    <div class="input-box">
                                        <label>Cuenta Icloud</label>
                                        <input required="" placeholder="Ingresa cuenta Icloud" type="text">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="input-box">
                                        <label>Contraseña Icloud</label>
                                        <input required="" placeholder="Ingresa contraseña de Icloud" type="telephone">
                                    </div>
                                    <div class="input-box">
                                        <label>PIN Icloud</label>
                                        <input required="" placeholder="Ingresa el PIN Icloud" type="text">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="input-box">
                                        <label>Modelo</label>
                                        <input required="" placeholder="Ingresa el modelo de telefono" type="telephone">
                                    </div>

                                    <div class="input-box">
                                        <label>Capacidad Gigabytes</label>
                                        <div class="select-box">
                                            <select>
                                            <option hidden="">32</option>
                                            <option>64</option>
                                            <option>128</option>
                                            <option>256</option>
                                            <option>512</option>
                                            <option>1024</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-button-container">
                                    <button class="modal-button" id="btnBack">Limpiar</button>
                                    <button class="modal-button" id="btnNext">Siguiente</button>
                                </div>
                            </div>

                            <!-- Formulario Seccion 2 -->
                            <div class="form-section" id="formSection2" >
                                <div class="input-box">
                                    <label>Nombre Completo</label>
                                    <input required="" placeholder="Ingresa nombre completo" type="text">
                                </div>
                                <div class="column">
                                    <div class="input-box">
                                        <label>Numero de telefono</label>
                                        <input required="" placeholder="Ingresa numero de telefono" type="telephone">
                                    </div>
                                    <div class="input-box">
                                        <label>Cuenta Icloud</label>
                                        <input required="" placeholder="Ingresa cuenta Icloud" type="text">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

             <!-- FIN Modal HTML -->

            <div class="one">
                <h1>Telefonos</h1>        
            </div>
            <div class="two">
                <button id="btnRegistrar" class="button">Registrar</button>
            </div>
            <div class="three">
                <div class="InputContainer">
                    <input type="text" name="text" class="input" id="input" placeholder="Buscar por numero de serie">
                    
                    <label for="input" class="labelforsearch">
                    <ion-icon class="searchIcon" name="search-outline"></ion-icon>
                    </label>
                    <div class="border"></div>

                </div>
            </div>
            <div class="four">
                <h2>Telefonos - Agregar</h2>
                
            </div>
        </div>

    </main>

    <script src="../js/phone.js"></script>
</body>
</html>