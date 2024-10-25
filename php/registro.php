<?php
include 'conexion.php'; 

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

if (isset($nombre, $usuario, $correo, $contrasena)) {
    // Verificar si el usuario o el correo ya están registrados
    $sql_check = "SELECT * FROM registro WHERE usuario = ? OR correo = ?";
    $stmt_check = $conn->prepare($sql_check);

    if ($stmt_check) {
        $stmt_check->bind_param("ss", $usuario, $correo);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            // Usuario o correo ya registrados
            header("Location: /Proyecto/index.php?error=El usuario o el correo ya están registrados.");
            exit();
        } else {
            // Proceder con la inserción si no están registrados
            $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO registro (nombre, usuario, correo, contrasena) VALUES (?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);

            if ($stmt_insert) {
                $stmt_insert->bind_param("ssss", $nombre, $usuario, $correo, $contrasena_hash);

                if ($stmt_insert->execute()) {
                    header("Location: /Proyecto/index.php?success=Registro exitoso. Puedes iniciar sesión ahora.");
                    exit();
                } else {
                    header("Location: /Proyecto/index.php?error=Error en la ejecución del registro.");
                    exit();
                }

                $stmt_insert->close();
            } else {
                header("Location: /Proyecto/index.php?error=Error en la preparación de la consulta de inserción.");
                exit();
            }
        }

        $stmt_check->close();
    } else {
        header("Location: /Proyecto/index.php?error=Error en la preparación de la consulta de verificación.");
        exit();
    }

    $conn->close();
} else {
    header("Location: /Proyecto/index.php?error=No se recibieron todos los datos del formulario.");
    exit();
}
?>
