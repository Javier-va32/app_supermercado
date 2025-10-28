<?php
// controlador/registro_usuario.php
require_once '../modelo/modelo.php';

$usuario = $_POST['usuario'];

// Validar longitud exacta
if (strlen($usuario) !== 8) {
    die("Error: El nombre de usuario debe tener exactamente 8 caracteres.");
}

// Validar que comience con minúscula
if (!preg_match('/^[a-z]/', $usuario)) {
    die("Error: El nombre de usuario debe comenzar con una letra minúscula.");
}

// Validar que termine con un carácter especial
if (!preg_match('/[^a-zA-Z0-9]$/', $usuario)) {
    die("Error: El nombre de usuario debe terminar con un carácter especial.");
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