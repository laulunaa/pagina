<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <div class="button-box">
                <div id="elegir"></div>
                <button type="button" class="toggle-btn" onclick="login()">Iniciar Sesión</button>
                <button type="button" class="toggle-btn" onclick="registrarse()">Registrarse</button>
            </div>
            <div class="logo">
                <img src="img/logoo.png" alt="logoLR">
            </div>
            <?php
            if (isset($_GET['error'])) {
            ?>
            <p id="alerta" class="errorLogin">
                <?php
                echo $_GET['error']
                ?>
            </p>
            <?php    
            }
            ?>

            <?php
            if (isset($_GET['error'])) {
                echo '<p id="alerta" class="errorRegistro">'.$_GET['error'].'</p>';
            }
            if (isset($_GET['success'])) {
                echo '<p id="alerta" class="successRegistro">'.$_GET['success'].'</p>';
            }
            ?>

            <form action="php/inicio.php" method="post" id="login" class="input-group">
                <input type="text" name="usuario" id="usuario" class="input-field1" placeholder="Nombre Usuario"
                    required>
                <input type="password" name="contrasena" id="contrasena" class="input-field1" placeholder="Contraseña"
                    required>
                <input type="checkbox" class="check-box"><span>Recordar Contraseña.</span>
                <br>
                <button type="submit" class="submit-btn1">Acceder</button>
                <br>
                <a href="html\recupera-contra.html">¿Olvidó su contraseña?</a>
            </form>

            <form action="php/registro.php" method="post" id="registrarse" class="input-group">
                <input type="text" name="nombre" id="nombre" class="input-field2" placeholder="Nombre Completo"
                    required>
                <input type="text" name="usuario" id="usuario_registro" class="input-field2"
                    placeholder="Nombre Usuario" required>
                <input type="email" name="correo" id="correo" class="input-field2" placeholder="Correo" required>
                <input type="password" name="contrasena" id="contrasena_registro" class="input-field2"
                    placeholder="Contraseña" required>
                <input type="checkbox" class="check-box" required><span>Acepto lo términos y Condiciones.</span>
                <button type="submit" class="submit-btn2">Registrarse</button>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("registrarse");
        var z = document.getElementById("elegir");

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

        function registrarse() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "120px";
        }

    </script>
    <script>
    const alertas = document.querySelectorAll('#alerta');
    
    if (alertas.length > 0) {
        document.addEventListener('click', function () {
            alertas.forEach(alerta => {
                alerta.style.display = 'none';
            });
        });
    }
</script>


</body>

</html>