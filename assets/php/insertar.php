<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Inserción</title>
</head>
<body><center>
    <h2>Insertar un nuevo registro</h2>
    <h2>Brandon Alan Sosa Salazar - 20041400</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establecer la conexión a la base de datos (asegúrate de reemplazar los valores adecuados)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "final";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtener datos del formulario
        $nombre_usuario = $_POST['nombre_usuario'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $es_administrador = $_POST['es_administrador'];

        // Consulta de inserción
        $sql = "INSERT INTO ultima (nombre_usuario, correo, contrasena, es administrador) VALUES ('$nombre_usuario', '$correo', '$contrasena', '$es_administrador')";

        if ($conn->query($sql) === TRUE) {
            // Registro insertado con éxito, mostrar ventana emergente
            echo '<script onclick type="text/javascript">alert("Registro insertado con éxito");</script>';
        } else {
            echo "Error al insertar el registro: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Usuario: <input type="text" name="nombre_usuario"><br>
        Correo: <input type="text" name="correo"><br>
        Contraseña: <input type="text" name="contrasena"><br>
        Es administrador: <input type="text" name="es_administrador"><br>
        <input type="submit" value="Insertar Registro">
    </form>
</body></center>
</html>
