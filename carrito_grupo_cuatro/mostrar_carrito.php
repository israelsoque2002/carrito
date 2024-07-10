<?php
session_start();

// Ejemplo de error_message para mostrar mensajes de error
$error_message = '';

// Credenciales de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrito";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
        }
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .producto-azul {
            color: blue;
            font-weight: bold;
        }
        .table {
            margin-top: 1rem;
        }
        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table th:first-child,
        .table td:first-child {
            text-align: left;
        }
        .table th {
            font-weight: bold;
            background-color: #f8f9fa;
            border-bottom-width: 2px;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .form-control {
            display: inline-block;
            width: auto;
        }
        .btn-primary,
        .btn-danger {
            padding: 0.375rem 0.75rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary:hover,
        .btn-danger:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>
    
<?php print_r($_SESSION['carrito']); 
echo "hola";?>

    <div class="container">
        <h1 class="text-center">Carrito de Compras</h1>
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) : ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal_iva_15 = 0;
                        $subtotal_iva_0 = 0;
                        $iva_15 = 0;
                        $total = 0;
                      
                        foreach ($_SESSION['carrito'] as $producto) {
                            $productoID = isset($producto['id']) ? $producto['id'] : 0;

                            // Consulta para obtener información del producto, incluyendo la ruta de la imagen
                            $sql = "SELECT Nombre, Precio, RutaImagenThumb FROM producto WHERE ProductoID = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $productoID);
                            $stmt->execute();
                            $result = $stmt->get_result();
                        
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $nombre = htmlspecialchars($row["Nombre"]);
                                $precio = (float)$row["Precio"];
                                $imagen = htmlspecialchars($row["RutaImagenThumb"]);
                               
                                $cantidad = isset($producto['cantidad']) ? (int)$producto['cantidad'] : 0;
                                $total_producto = $precio * $cantidad;

                                // Calcular subtotales e IVA
                                if (isset($producto['iva']) && $producto['iva'] == 15) {
                                    $subtotal_iva_15 += $total_producto;
                                } else {
                                    $subtotal_iva_0 += $total_producto;
                                }

                                $total += $total_producto;

                                echo '<tr>';
                                echo '<td>';
                                echo '<span class="producto-azul">' . htmlspecialchars($nombre) . '</span>';
                                echo '</td>';
                                echo '<td>';
                                if (!empty($imagen) && file_exists($imagen)) {
                                    echo '<img src="' . $imagen . '" alt="' . htmlspecialchars($nombre) . '" style="width: 50px; height: 50px;">';
                                } else {
                                    echo 'Sin imagen';
                                }
                                echo '</td>';
                                echo '<td>' . number_format($precio, 2) . '</td>';
                                echo '<td>
                                    <form action="carrito.php" method="post">
                                        <input type="hidden" name="id" value="' . htmlspecialchars($productoID) . '">
                                        <input type="number" name="cantidad" value="' . htmlspecialchars($cantidad) . '" min="1" class="form-control">
                                        <button class="btn btn-primary" name="btnActualizar" type="submit">Actualizar</button>
                                    </form>
                                </td>';
                                echo '<td>' . number_format($total_producto, 2) . '</td>';
                                echo '<td>
                                    <form action="carrito.php" method="post">
                                        <input type="hidden" name="id" value="' . htmlspecialchars($productoID) . '">
                                        <button class="btn btn-danger" name="btnEliminar" type="submit">Eliminar</button>
                                    </form>
                                </td>';
                                echo '</tr>';
                            } else {
                                echo "<tr><td colspan='6'>Producto no encontrado</td></tr>";
                            }

                            $stmt->close();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <h3>Detalle del Total a Pagar del Carrito</h3>
                <table class="table">
                    <tr>
                        <td>Subtotal (IVA 15%):</td>
                        <td><?php echo number_format($subtotal_iva_15, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal (IVA 0%):</td>
                        <td><?php echo number_format($subtotal_iva_0, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal sin Impuestos:</td>
                        <td><?php echo number_format($subtotal_iva_15 + $subtotal_iva_0, 2); ?></td>
                    </tr>
                    <tr>
                        <td>IVA 15%:</td>
                        <td><?php echo number_format($iva_15 = $subtotal_iva_15 * 0.15, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td><?php echo number_format($total = $subtotal_iva_15 + $iva_15 + $subtotal_iva_0, 2); ?></td>
                    </tr>
                </table>
            </div>
        <?php else : ?>
            <p class="text-center">No hay productos en el carrito.</p>
        <?php endif; ?>
        <div class="text-center">
            <a href="<?php echo isset($_SESSION['redirect_url']) ? htmlspecialchars($_SESSION['redirect_url']) : 'index.php'; ?>" class="btn btn-primary">Regresar a Comprar</a>
        </div>
    </div>
</body>

</html>

<?php
// Cerrar conexión
$conn->close();
?>