<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

// Consulta para verificar las credenciales del usuario
$sql = "SELECT id, nombre, es_administrador FROM ultima WHERE correo = ? AND contrasena = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ss", $correo, $contrasena);
    $stmt->execute();
    $stmt->bind_result($id, $nombre, $es_administrador);

    if ($stmt->fetch()) {
        // Inicio de sesión exitoso, establecer variables de sesión
        $_SESSION["correo"] = $correo;
        $_SESSION["contrasena"] = $contrasena;
        $_SESSION["es_administrador"] = $es_administrador;

        // Redirigir según el tipo de usuario
        if ($es_administrador == 1) {
            header("Location: panel_admin.php");
        } else {
            header("Location: panel_cliente.php");
        }
    } else {
        // Credenciales incorrectas
        header("Location: login.php?error=1");
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

$conn->close();
?>


