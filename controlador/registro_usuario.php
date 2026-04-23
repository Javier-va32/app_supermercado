<?php
// controlador/registro_usuario.php
require_once '../modelo/modelo.php';

$usuario = trim($_POST['usuario'] ?? '');

if (empty($usuario)) {
    die("Error: Debes ingresar un nombre de usuario.");
}

// Validar longitud mínima y máxima
if (strlen($usuario) < 5 || strlen($usuario) > 30) {
    die("Error: El nombre de usuario debe tener entre 5 y 30 caracteres.");
}

// Validar caracteres permitidos
if (!preg_match('/^[a-zA-Z0-9_-]+$/', $usuario)) {
    die("Error: El nombre de usuario solo puede contener letras, números, guion medio y guion bajo.");
}

// Validar que no esté repetido
$sql = "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    $conn->close();
    die("Error: Este nombre de usuario ya existe.");
}

$stmt->close();

// Insertar usuario
$sql = "INSERT INTO usuarios (nombre_usuario) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente. <a href='../vista/registro_venta.html'>Ir al registro de ventas</a>";
} else {
    echo "Error al registrar usuario: " . $conn->error;
}

$stmt->close();
$conn->close();
?>