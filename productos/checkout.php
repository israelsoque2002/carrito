<?php
session_start();

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

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnConfirmarPago'])) {
        $lugar_entrega = filter_input(INPUT_POST, 'lugar_entrega', FILTER_SANITIZE_STRING);
        $costo_entrega = 0; // Variable para almacenar el costo de entrega según el sector seleccionado
        $datos_cliente = filter_input(INPUT_POST, 'datos_cliente', FILTER_SANITIZE_STRING);
        $forma_pago = filter_input(INPUT_POST, 'forma_pago', FILTER_SANITIZE_STRING);
        $sector_id = filter_input(INPUT_POST, 'sector_id', FILTER_VALIDATE_INT);
        $barrio = filter_input(INPUT_POST, 'barrio', FILTER_SANITIZE_STRING);

        if ($lugar_entrega && $datos_cliente && $forma_pago && $sector_id && $barrio) {
            // Obtener el costo de entrega según el sector seleccionado
            $sql_sector = "SELECT Nombre, ZonaID, Costo FROM sector WHERE SectorID = ?";
            $stmt_sector = $conn->prepare($sql_sector);
            $stmt_sector->bind_param("i", $sector_id);
            $stmt_sector->execute();
            $result_sector = $stmt_sector->get_result();

            if ($result_sector->num_rows > 0) {
                $row_sector = $result_sector->fetch_assoc();
                $zona_id = $row_sector['ZonaID'];
                $costo_entrega = $row_sector['Costo'];
            } else {
                $error_message = "No se encontró información del sector seleccionado.";
            }

            $stmt_sector->close();

            // Insertar el pedido en la base de datos si se obtuvo el costo de entrega
            if ($costo_entrega > 0) {
                $fecha = date("Y-m-d H:i:s");
                $clienteID = $_SESSION['ClienteID'];  // Asumiendo que tienes el ID del cliente en la sesión
                $pedidoEstadoID = 1;  // Asumiendo que 1 es el estado inicial del pedido
                $pagoTipoID = 1;  // Asumiendo que 1 es el tipo de pago, este valor puede variar según tu lógica
                $descuento = 0;  // Asumiendo que inicialmente no hay descuento

                // Insertar el pedido en la tabla 'pedido'
                $sql_pedido = "INSERT INTO pedido (SesionID, ClienteID, Fecha, PagoTipoID, PedidoEstadoID, SectorID, Barrio, Descuento, PedidoValorTotal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_pedido = $conn->prepare($sql_pedido);
                $stmt_pedido->bind_param("sisiisidd", session_id(), $clienteID, $fecha, $pagoTipoID, $pedidoEstadoID, $sector_id, $barrio, $descuento, $total);

                if ($stmt_pedido->execute()) {
                    // Obtener el ID del pedido insertado
                    $pedidoID = $stmt_pedido->insert_id;

                    // Insertar los detalles del pedido en la tabla 'pedidodetalle'
                    foreach ($_SESSION['carrito'] as $producto) {
                        $productoID = isset($producto['id']) ? $producto['id'] : 0;
                        $cantidad = isset($producto['cantidad']) ? $producto['cantidad'] : 1;
                        $precio = isset($producto['precio']) ? $producto['precio'] : 0;
                        $iva = isset($producto['iva']) ? $producto['iva'] : 0;

                        $sql_detalle = "INSERT INTO pedidodetalle (PedidoID, ProductoID, Cantidad, Precio, IVA) VALUES (?, ?, ?, ?, ?)";
                        $stmt_detalle = $conn->prepare($sql_detalle);
                        $stmt_detalle->bind_param("iiidi", $pedidoID, $productoID, $cantidad, $precio, $iva);
                        $stmt_detalle->execute();
                        $stmt_detalle->close();
                    }

                    $success_message = "Su pedido ha sido registrado con éxito. El No. de pedido es $pedidoID.";

                    // Limpiar el carrito y las variables de sesión relacionadas
                    unset($_SESSION['carrito']);
                } else {
                    $error_message = "Error al registrar el pedido: " . $stmt_pedido->error;
                }

                $stmt_pedido->close();
            } else {
                $error_message = "No se pudo obtener el costo de entrega para el sector seleccionado.";
            }
        } else {
            $error_message = "Por favor, complete todos los campos requeridos.";
        }
    }
}

// Calcular el total de productos en el carrito
$total_productos = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        $total_productos += $producto['cantidad'];
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
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
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Confirmación de Pago</h2>
        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <?php if ($success_message): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="checkout.php">
            <div class="form-group">
                <label for="lugar_entrega">Lugar de Entrega</label>
                <input type="text" class="form-control" id="lugar_entrega" name="lugar_entrega" required>
            </div>
            <div class="form-group">
                <label for="costo_entrega">Costo de Entrega</label>
                <input type="number" class="form-control" id="costo_entrega" name="costo_entrega" value="<?php echo $costo_entrega; ?>" step="0.01" readonly>
            </div>
            <div class="form-group">
                <label for="datos_cliente">Datos del Cliente</label>
                <input type="text" class="form-control" id="datos_cliente" name="datos_cliente" required>
            </div>
            <div class="form-group">
                <label for="forma_pago">Forma de Pago</label>
                <select class="form-control" id="forma_pago" name="forma_pago" required>
                    <option value="">Seleccionar forma de pago</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta de crédito/débito</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sector_id">Sector</label>
                <select class="form-control" id="sector_id" name="sector_id" required>
                    <option value="">Seleccionar sector</option>
                    <?php
                    // Consulta para obtener todos los sectores disponibles
                    $sql_sectores = "SELECT SectorID, Nombre FROM sector";
                    $result_sectores = $conn->query($sql_sectores);

                    if ($result_sectores->num_rows > 0) {
                        while ($row = $result_sectores->fetch_assoc()) {
                            echo '<option value="' . $row['SectorID'] . '">' . $row['Nombre'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="barrio">Barrio</label>
                <input type="text" class="form-control" id="barrio" name="barrio" required>
            </div>
            <button type="submit" name="btnConfirmarPago" class="btn btn-primary">Confirmar Pago</button>
        </form>
    </div>
</body>

</html>

<?php
// Cerrar conexión
$conn->close();
?>
