<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Panel de Administrador</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <link rel="stylesheet" type="text/css" href="assets" />

    <style>
      body {
    padding-top: 56px;
  }
  
  .sidebar {
    position: fixed;
    top: 56px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    padding-top: 1rem;
    padding-left: 1rem;
    padding-right: 1rem;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: #59ab6e;
  }
  
  .navbar-toggler-icon {
    color: #59ab6e;
  }
  
  .navbar-toggler {
    border-color: #59ab6e;
  }

  .navbar-brand{
    cursor: pointer;
    color: #59ab6e;
  }
  
  .sidebar-sticky {
    position: relative;
    top: 0;
    height: calc(100vh - 48px);
    padding-top: .5rem;
    overflow-x: hidden;
    overflow-y: auto;
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
        .titulo{
            font-size: 20px;
        }
    </style>
    <script>
        function mostrarMensaje() {
            alert("Registro eliminado con éxito.");
        }
    </script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="panel_admin.html">Panel de Administrador</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="panel_admin.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="configuracion.html">Configuración</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <!-- Barra lateral -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="insertar.php"> Insertar registros </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="actualizar.php"> Actualizar registros </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="eliminar.php"> Eliminar registros </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <center>
          <h2>Eliminar registros</h2>
          <h2>Brandon Alan Sosa Salazar - 20041400</h2>
          </center>
       
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
          
          </center>
        </main>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="admin.js"></script>
  </body>
</html>
