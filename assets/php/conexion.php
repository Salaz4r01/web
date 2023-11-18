<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn){
    echo "Conexion establecida";
}

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Hacer consultas o ejecutar operaciones en la base de datos aquí

// Cerrar la conexión cuando hayas terminado
$conn->close();
?>

