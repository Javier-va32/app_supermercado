<?php
// comprobante.php
require_once '../modelo/modelo.php';

$cliente = $_GET['cliente'] ?? '';

if (empty($cliente)) {
    echo "Error: No se proporcionó el nombre del cliente.";
    exit();
}

// Obtener productos del cliente (incluyendo total)
$sql = "SELECT producto, cantidad, total, fecha FROM ventas_usuario WHERE nombre_cliente = ? AND cantidad > 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cliente);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Compra</title>
</head>
<body>
    <h2>Comprobante de compra para: <?php echo htmlspecialchars($cliente); ?></h2>

    <?php if ($resultado->num_rows > 0): ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
            <?php
            $total_general = 0;
            while ($fila = $resultado->fetch_assoc()):
                $total_general += $fila['total'];
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['producto']); ?></td>
                    <td><?php echo $fila['cantidad']; ?></td>
                    <td>$<?php echo $fila['total']; ?></td>
                    <td><?php echo $fila['fecha']; ?></td>
                </tr>
            <?php endwhile; ?>
            <tr>
                <td colspan="2"><strong>Total General</strong></td>
                <td colspan="2"><strong>$<?php echo $total_general; ?></strong></td>
            </tr>
        </table>
    <?php else: ?>
        <p>No se encontraron compras registradas para este cliente.</p>
    <?php endif; ?>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>