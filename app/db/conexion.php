<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isainventory";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Manejo de errores
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Establecer el conjunto de caracteres a UTF-8
mysqli_set_charset($conn, "utf8");
?>
