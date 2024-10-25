<?php
session_start();
include('conexion.php'); 

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM registro WHERE usuario='$usuario'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verificar si la contraseña ingresada coincide con la almacenada
        if (password_verify($contrasena, $row['contrasena'])) {
            // Contraseña correcta, redirigir al área principal
            header("Location: /Proyecto/php/principal.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: /Proyecto/index.php?error=El usuario o la contraseña son incorrectas");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: /Proyecto/index.php?error=El usuario o la contraseña son incorrectas");
        exit();
    }
}
?>

