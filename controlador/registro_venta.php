<?php
// controlador/registro_venta.php
require_once '../modelo/modelo.php';

$cliente = $_POST['cliente'];

// Precios fijos por producto
$precios = [
    'Manzana' => 2000,
    'Lechuga' => 1500,
    'Pollo' => 9000,
    'Leche' => 1200,
    'Jugo' => 1800
];

// Captura los productos y cantidades
$productos = [
    ['nombre' => $_POST['producto_fruta'], 'cantidad' => $_POST['cantidad_fruta']],
    ['nombre' => $_POST['producto_verdura'], 'cantidad' => $_POST['cantidad_verdura']],
    ['nombre' => $_POST['producto_carne'], 'cantidad' => $_POST['cantidad_carne']],
    ['nombre' => $_POST['producto_lacteo'], 'cantidad' => $_POST['cantidad_lacteo']],
    ['nombre' => $_POST['producto_bebida'], 'cantidad' => $_POST['cantidad_bebida']]
];

$total_general = 0;

foreach ($productos as $prod) {
    if ($prod['cantidad'] > 0) {
        $producto = $prod['nombre'];
        $cantidad = (int) $prod['cantidad'];
        $precio_unitario = $precios[$producto] ?? 0;
        $subtotal = $cantidad * $precio_unitario;
        $total_general += $subtotal;

        // Insertar en la base de datos con total incluido
        $sql = "INSERT INTO ventas_usuario (nombre_cliente, producto, cantidad, total) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $cliente, $producto, $cantidad, $subtotal);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();

// Redirigir al comprobante con el nombre como parámetro
header("Location: comprobante.php?cliente=" . urlencode($cliente));
exit();
?>