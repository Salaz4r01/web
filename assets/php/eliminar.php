<!DOCTYPE html>
<html>

<head>
    <title>Eliminar Registros</title>
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
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        h2 {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <script onclick="">
        function mostrarMensaje() {
            alert("Registro eliminado con éxito.");
        }
    </script>
</head>

<body>
    <center>
        <h2>Eliminar Registros</h2>
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

        if (isset($_POST['eliminar'])) {
            $correo = $_POST['correo'];

            // Query de eliminación
            $sql = "DELETE FROM ultima WHERE correo='$correo'";

            if ($conn->query($sql) === TRUE) {
                echo '<script>mostrarMensaje();</script>';
            } else {
                echo "Error al eliminar el registro: " . $conn->error;
            }
        }

        // Consulta para obtener usuarios registrados
        $sql = "SELECT nombre_usuario, correo, contrasena, es_administrador  FROM ultima";
        $result = $conn->query($sql);

        echo '<table border="1">
            <tr>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Es administrador</th>
                <th>Acción</th>
            </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                <td>' . $row["nombre_usuario"] . '</td>
                <td>' . $row["correo"] . '</td>
                <td>' . $row["contrasena"] . '</td>
                <td>' . ($row["es_administrador"] == 1 ? "Si" : "No") . '</td>
                <td>
                    <a href="?delete=' . $row["correo"] . '">Eliminar</a>
                </td>
            </tr>';
            if (isset($_GET['delete']) && $_GET['delete'] === $row["correo"]) {
                echo '<tr>
                    <form method="post">
                        <td>' . $row["nombre_usuario"] . '</td>
                        <td>' . $row["correo"] . '</td>
                        <td>' . $row["contrasena"] . '</td>
                        <td>' . $row["es_administrador"] . '</td>
                        <td><input type="hidden" name="correo" value="' . $row["correo"] . '">
                            <input type="submit" name="eliminar" value="Eliminar">
                        </td>
                    </form>
                </tr>';
            }
        }

        echo '</table>';

        // Cerrar la conexión
        $conn->close();
        ?>
</body>
</center>

</html>