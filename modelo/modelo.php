<?php
// modelo.php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "supermercado_xyz";

$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>