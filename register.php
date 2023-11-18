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

        // Consulta de inserción
        $sql = "INSERT INTO ultima (nombre_usuario, correo, contrasena) VALUES ('$nombre_usuario', '$correo', '$contrasena')";

        if ($conn->query($sql) === TRUE) {
            // Registro insertado con éxito, mostrar ventana emergente
            echo '<script onclick type="text/javascript">alert("Registrado exitosamente");</script>';
            header("Location: login.php");
        } else {
            echo "Error al registrar: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>DuranStyle</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/dolar.svg" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/templatemo.css" />
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link rel="stylesheet" href="assets/css/loginstyle.css" />

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
      <div class="w-100 d-flex justify-content-between">
        <div>
          <i class="fa fa-envelope mx-2"></i>
          <a class="navbar-sm-brand text-light text-decoration-none"
            href="mailto:alanxtn@gmail.com">alanxtn@gmail.com</a>
          <i class="fa fa-phone mx-2"></i>
          <a class="navbar-sm-brand text-light text-decoration-none" href="tel:618-310-89-44">618-310-89-44</a>
        </div>
        <div>
          <a class="text-light" href="https://www.facebook.com/Sal4z4r" target="_blank" rel="sponsored"><i
              class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
          <a class="text-light" href="https://www.instagram.com/if_braandd/" target="_blank"><i
              class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
          <a class="text-light" href="https://www.tiktok.com/@if_braandd" target="_blank"><i
              class="fab fa-tiktok fa-sm fa-fw me-2"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
        DuranStyle
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
        data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
        id="templatemo_main_nav">
        <div class="flex-fill">
          <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Acerca de</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.html">Tienda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contacto</a>
            </li>
          </ul>
        </div>
        <div class="navbar align-self-center d-flex">
          <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
            <div class="input-group">
              <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ..." />
              <div class="input-group-text">
                <i class="fa fa-fw fa-search"></i>
              </div>
            </div>
          </div>
          <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
            <i class="fa fa-fw fa-search text-dark mr-2"></i>
          </a>
          <a class="nav-icon position-relative text-decoration-none" href="#">
            <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
            <span
              class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
          </a>
          <a class="nav-icon position-relative text-decoration-none" href="login.php">
            <i class="fa fa-fw fa-user text-dark mr-3"></i>
            <span
              class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="w-100 pt-1 mb-5 text-right">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="get" class="modal-content modal-body border-0 p-0">
        <div class="input-group mb-2">
          <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Buscar" />
          <button type="submit" class="input-group-text bg-success text-light">
            <i class="fa fa-fw fa-search text-white"></i>
          </button>
        </div>
      </form>
    </div>
  </div>




  <div class="login-container">
    <form action="" method="post">
      <center><h2>Registrate</h2></center>

      <label for="nombre_usuario">Nombre de Usuario:</label>
      <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Chalino_Belico" required>
      
      <label for="correo">Correo Electrónico:</label>
      <input type="correo" id="correo" name="correo" placeholder="1234@gmail.com" required>

      <label for="contrasena">Contraseña:</label>
      <input type="password" id="contrasena" name="contrasena" placeholder="lorem12345" minlength="8" maxlength="16" required>

      <span class="sub">Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></span>
      <button type="submit">Registrar</button>
    </form>
  </div>



  

  <footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 pt-5">
          <h2 class="h2 text-success border-bottom pb-3 border-light logo">
            DuranStyle
          </h2>
          <ul class="list-unstyled text-light footer-link-list">
            <li>
              <i class="fas fa-map-marker-alt fa-fw"></i>
              Huizache 1, Circuito Yaqui #666
            </li>
            <li>
              <i class="fa fa-phone fa-fw"></i>
              <a class="text-decoration-none" href="tel:618-310-89-44">618-310-89-44</a>
            </li>
            <li>
              <i class="fa fa-envelope fa-fw"></i>
              <a class="text-decoration-none" href="mailto:info@company.com">alanxtn@gmail.com</a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 pt-5">
          <h2 class="h2 text-light border-bottom pb-3 border-light">
            Productos
          </h2>
          <ul class="list-unstyled text-light footer-link-list">
            <li><a class="text-decoration-none" href="shop.html">Sneakers</a></li>
            <li><a class="text-decoration-none" href="#">Gorras</a></li>
            <li><a class="text-decoration-none" href="#">Calcetines</a></li>
            <li><a class="text-decoration-none" href="#">Consolas</a></li>
          </ul>
        </div>

        <div class="col-md-4 pt-5">
          <h2 class="h2 text-light border-bottom pb-3 border-light">
            Acerca de
          </h2>
          <ul class="list-unstyled text-light footer-link-list">
            <li><a class="text-decoration-none" href="index.html">Inicio</a></li>
            <li><a class="text-decoration-none" href="shop.html">Tienda</a></li>
            <li><a class="text-decoration-none" href="contact.html">Contacto</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    <div class="w-100 bg-black py-3">
      <div class="container">
        <div class="row pt-2">
          <div class="col-12">
            <p class="text-left text-light">
              Copyright &copy; 2023 DuranStyle | Desarrollada por
              <a>Brandon Salazar - 20041400</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="assets/js/jquery-1.11.0.min.js"></script>
  <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/templatemo.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>

