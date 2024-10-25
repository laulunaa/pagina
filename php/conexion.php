<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "proyecto";

$conn = new mysqli($server, $user, $pass, $db);

//if ($conn->connect_error) {
//    die("Conexión fallida: " . $conn->connect_error);
//} else { 
//    echo("Conexion exitosa");
//}

$conn->set_charset("utf8");
?>