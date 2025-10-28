<?php
// controlador/login.php
require_once '../modelo/modelo.php';

$usuario = $_POST['usuario'] ?? '';

if (empty($usuario)) {
    die("Error: Debes ingresar un nombre de usuario.");
}

// Verificar si el usuario existe
$sql = "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Redirigir al formulario de ventas con el nombre en la URL
    header("Location: ../vista/registro_venta.html?cliente=" . urlencode($usuario));
    exit();
} else {
    echo "Error: Usuario no registrado. <a href='../vista/registro_usuario.html'>Registrarse</a>";
}

$stmt->close();
$conn->close();
?>