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
                                <div class="column">
                                    <div class="input-box">
                                        <label>Nombre Completo</label>
                                        <input type="name" name="name"  required>
                                    </div>
                                    <div class="input-box">
                                        <label>Numero de telefono</label>
                                        <input type="tel" name="phone" title="Debe tener exactamente 10 dígitos" required>                                    
                                    </div>
                                </div>
                                <div class="column">
                                <div class="input-box">
                                        <label>Cuenta Icloud</label>
                                        <input required="" placeholder="Ingresa cuenta Icloud" type="mail" name="icloudAccount"> 
                                    </div>
                                    <div class="input-box">
                                        <label>Contraseña Icloud</label>
                                        <input required="" placeholder="Ingresa contraseña de Icloud" type="password" name="icloudPass">
                                    </div>
                                </div>
                                <div class="column">
                                <div class="input-box">
                                        <label>PIN Icloud</label>
                                        <input required="" placeholder="Ingresa el PIN Icloud" type="text" name="icloudPin">
                                    </div>
                                    <div class="input-box">
                                        <label>Modelo</label>
                                        <input required="" placeholder="Ingresa el modelo de telefono" type="telephone" name="model">
                                    </div>
                                </div>

                                <div class="column">

                                    <div class="input-box">
                                        <label>Numero de serie</label>
                                        <input required="" placeholder="Ingresa el numero de serie" type="text" name="serialNumber">
                                    </div>

                                    <div class="input-box">
                                        <label>Capacidad Gigabytes</label>
                                        <div class="select-box">
                                            <select>
                                                <option value="" disabled selected>Selecciona una capacidad</option>
                                                <option value="32">32</option>
                                                <option value="64">64</option>
                                                <option value="128">128</option>
                                                <option value="256">256</option>
                                                <option value="512">512</option>
                                                <option value="1024">1024</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-button-container">
                                    <button class="modal-button" id="btnClean1" onclick="limpiarFormulario()">Limpiar</button>
                                    <button class="modal-button" id="btnNext1">Siguiente</button>
                                </div>
                            </div>

                            <!-- Formulario Seccion 2 -->
                            <div class="form-section" id="formSection2" >
                                <div class="column">
                                    <div class="input-box">
                                        <label>IMEI</label>
                                        <input required="" placeholder="Ingrese el IMEI" type="number" name="imei">
                                    </div>
                                    <div class="gender-box">
                                        <label>Garantia</label>
                                        <div class="gender-option">
                                            <div class="gender">
                                                <input checked="" name="gender" id="check-male" type="radio">
                                                <label for="check-male">Si</label>
                                            </div>
                                            <div class="gender">
                                                <input name="gender" id="check-female" type="radio">
                                                <label for="check-female">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="column">
                                    
                                    <div class="input-box">
                                        <label>Antiguedad</label>
                                        <input required="" placeholder="Ingrese la antiguedad" type="date" max="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="input-box">
                                        <label>Condicion de la bateria</label>
                                        <input required="" placeholder="Ingrese condicion de la bateria" type="number">
                                    </div>
                                </div>

                                <div class="column">
                                    <div class="input-box">
                                        <label>Plan</label>
                                        <select id="selectorPlan" class="select-box">
                                            <option value="" disabled selected>Selecciona un Plan Telcel Plus Abierto</option>
                                            <option value="Plus 1">Plus 1</option>
                                            <option value="Plus 1.5">Plus 1.5</option>
                                            <option value="Plus 2">Plus 2</option>
                                            <option value="Plus 3">Plus 3</option>
                                            <option value="Plus 4">Plus 4</option>
                                            <option value="Plus 5">Plus 5</option>
                                            <option value="Plus 6">Plus 6</option>
                                            <option value="Plus 7">Plus 7</option>
                                            <option value="Plus 8">Plus 8</option>
                                            <option value="Plus 9">Plus 9</option>
                                            <option value="Plus 12">Plus 12</option>
                                            <option value="Plus 14">Plus 14</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <label>Renta mensual</label>
                                        <input id="rm" name="rm" type="number" max="9999">
                                    </div>
                                </div>
                                
                                <div class="column">
                                    <div class="input-box">
                                        <label>Minutos incluidos</label>
                                        <input type="text" id="minutos" name="minutos">
                                    </div>
                                    <div class="input-box">
                                        <label>SMS incluidos</label>
                                        <input type="text" id="sms" name="sms">
                                    </div>
                                    <div class="input-box">
                                        <label>GB incluidos</label>
                                        <input type="number" id="gb" name="gb">
                                    </div>
                                </div>

                                <div class="modal-button-container">    
                                    <button type="button" id="back-btn" class="button-back" onclick="showSection(1)">
                                        <ion-icon class="arrow-back" name="arrow-back-outline"></ion-icon>                               
                                        <div class="text">
                                             Regresar
                                        </div>
                                    </button>
                                    <button class="modal-button" id="btnClean2" onclick="limpiarFormulario()">Limpiar</button>
                                    <button class="modal-button" id="btnNext2">Registrar</button>
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