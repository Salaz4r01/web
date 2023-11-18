<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registros</title>
    <style>
        body {
            text-align: center;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            font-family: Arial, Helvetica, sans-serif;
        }
        h2 {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <script>
        function mostrarMensaje() {
            alert("Registro actualizado con éxito.");
        }
    </script>
</head>
<body>
    <h2>Actualizar Registros</h2>
    <h2>Brandon Alan Sosa Salazar - 20041400</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final";

    // Crear una conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    if (isset($_POST['actualizar'])) {
        $nombre_usuario = $_POST['nombre_usuario'] ?? null;
        $correo = $_POST['correo'] ?? null;
        $nuevo_correo = $_POST['nuevo_correo'];
        $contrasena = $_POST['contrasena'] ?? null;
        $nueva_contrasena = $_POST['nueva_contrasena'] ?? null;
        $es_administrador = isset($_POST['es_administrador']) ? 1 : 0;

        // Query de actualización
        $sql = "UPDATE ultima SET correo='$nuevo_correo', contrasena='$nueva_contrasena', nombre_usuario='$nombre_usuario', es_administrador=$es_administrador WHERE correo='$correo'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>mostrarMensaje();</script>';
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    }

    // Consulta para obtener usuarios registrados
    $sql = "SELECT nombre_usuario, correo, contrasena, es_administrador FROM ultima";
    $result = $conn->query($sql);

    echo '<table>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Es Administrador</th>
                <th>Acción</th>
            </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["nombre_usuario"] . '</td>
                <td>' . $row["correo"] . '</td>
                <td>' . $row["contrasena"] . '</td>
                <td>' . ($row["es_administrador"] == 1 ? 'Sí' : 'No') . '</td>
                <td><a href="?edit=' . $row["correo"] . '">Editar</a></td>
            </tr>';
        if (isset($_GET['edit']) && $_GET['edit'] === $row["correo"]) {
            echo '<tr>
                    <form method="post">
                        <td><input type="text" name="nombre_usuario" value="' . $row["nombre_usuario"] . '"></td>
                        <td><input type="text" name="nuevo_correo" value="' . $row["correo"] . '"></td>
                        <td><input type="text" name="nueva_contrasena" value="' . $row["contrasena"] . '"></td>
                        <td><input type="checkbox" name="es_administrador" value="1" ' . ($row["es_administrador"] == 1 ? 'checked' : '') . '> Es Administrador</td>
                        <td><input type="hidden" name="correo" value="' . $row["correo"] . '"></td>
                        <td><input type="submit" name="actualizar" value="Actualizar"></td>
                    </form>
                </tr>';
        }
    }

    echo '</table>';

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>
