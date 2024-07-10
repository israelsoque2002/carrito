<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Definir URLs de las categorías
$categorias_urls = array(
    'viveres' => 'viveres.php',
    'bebidas' => 'bebidas.php',
    'snacks' => 'snacks.php',
    'aseo_personal' => 'aseo_personal.php',
    'limpieza' => 'limpieza.php'
);

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

// Mensaje de error inicialmente vacío
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnAccion'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
        $cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT);
        $iva = filter_input(INPUT_POST, 'iva', FILTER_VALIDATE_INT);
        $imagen = filter_input(INPUT_POST, 'imagen', FILTER_SANITIZE_URL);
        $redirect_url = filter_input(INPUT_POST, 'redirect_url', FILTER_SANITIZE_URL);

        if ($id !== false && $nombre !== false && $precio !== false && $cantidad !== false && $iva !== false) {
            $producto_existente = false;
            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $index => $producto) {
                    if ($producto['id'] == $id) {
                        // Si el producto ya existe, incrementar la cantidad
                        $_SESSION['carrito'][$index]['cantidad'] += $cantidad;
                        $producto_existente = true;
                        break;
                    }
                }
            }

            if (!$producto_existente) {
                // Si no existe, añadir el nuevo producto al carrito
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad,
                    'iva' => $iva,
                    'imagen' => $imagen
                );

                if (!isset($_SESSION['carrito'])) {
                    $_SESSION['carrito'] = array();
                }

                $_SESSION['carrito'][] = $producto;
            }

            $_SESSION['message'] = 'El producto ha sido añadido al carrito de compras.';

            // Redirigir a la página de origen
            header('Location: ' . $redirect_url);
            exit();
        } else {
            $error_message = 'Datos del producto inválidos.';
        }
    } elseif (isset($_POST['btnEliminar'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $redirect_url = filter_input(INPUT_POST, 'redirect_url', FILTER_SANITIZE_URL);

        if ($id !== false) {
            // Buscar el producto en el carrito y eliminarlo
            foreach ($_SESSION['carrito'] as $index => $producto) {
                if ($producto['id'] == $id) {
                    unset($_SESSION['carrito'][$index]);
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
                    $_SESSION['message'] = 'El producto ha sido eliminado del carrito.';
                    break;
                }
            }
        }
    } elseif (isset($_POST['btnActualizar'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT);
        $redirect_url = filter_input(INPUT_POST, 'redirect_url', FILTER_SANITIZE_URL);

        if ($id !== false && $cantidad !== false && $cantidad > 0) {
            // Buscar el producto en el carrito y actualizar su cantidad
            foreach ($_SESSION['carrito'] as $index => $producto) {
                if ($producto['id'] == $id) {
                    $_SESSION['carrito'][$index]['cantidad'] = $cantidad;
                    $_SESSION['message'] = 'La cantidad del producto ha sido actualizada.';
                    break;
                }
            }
        } else {
            $error_message = 'Cantidad inválida.';
        }
    } elseif (isset($_POST['confirmarPago'])) {
        // Guardar información del pedido en la base de datos y limpiar variables de sesión
        $total = filter_input(INPUT_POST, 'total', FILTER_VALIDATE_FLOAT);
        $lugar_entrega = filter_input(INPUT_POST, 'lugar_entrega', FILTER_SANITIZE_STRING);
        $costo_entrega = filter_input(INPUT_POST, 'costo_entrega', FILTER_VALIDATE_FLOAT);
        $datos_cliente = filter_input(INPUT_POST, 'datos_cliente', FILTER_SANITIZE_STRING);
        $forma_pago = filter_input(INPUT_POST, 'forma_pago', FILTER_SANITIZE_STRING);

        if ($total !== false && $lugar_entrega !== false && $costo_entrega !== false && $datos_cliente !== false && $forma_pago !== false) {
            // Guardar en la base de datos (aquí deberías hacer la inserción real en tu base de datos)
            // Ejemplo de consulta de inserción:
            // $query = "INSERT INTO pedidos (total, lugar_entrega, costo_entrega, datos_cliente, forma_pago) VALUES (?, ?, ?, ?, ?)";
            // $stmt = $conn->prepare($query);
            // $stmt->bind_param("dssds", $total, $lugar_entrega, $costo_entrega, $datos_cliente, $forma_pago);
            // $stmt->execute();
            // $pedido_id = $stmt->insert_id;

            // Simulación de ID de pedido
            $pedido_id = rand(1000, 9999);

            $_SESSION['message'] = 'Su pedido ha sido registrado con éxito. El No. de pedido es ' . $pedido_id . '.';

            // Limpiar variables de sesión
            unset($_SESSION['carrito']);
            unset($_SESSION['ultima_pagina']);

            // Redirigir a la página principal
            header('Location: index.php');
            exit();
        } else {
            $error_message = 'Datos de pago inválidos.';
        }
    }

    // Redirigir a la página de origen después de cualquier acción
    header('Location: ' . $redirect_url);
    exit();
}

// Función para calcular el total del carrito
function calcularTotal($carrito)
{
    $total = 0;
    $subtotal_iva15 = 0;
    $subtotal_iva0 = 0;

    foreach ($carrito as $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;

        if ($producto['iva'] == 15) {
            $subtotal_iva15 += $subtotal;
        } else {
            $subtotal_iva0 += $subtotal;
        }
    }

    $iva_15 = $subtotal_iva15 * 0.15;
    $total_con_iva_15 = $subtotal_iva15 + $iva_15;

    return array(
        'total' => number_format($total, 2),
        'subtotal_iva15' => number_format($subtotal_iva15, 2),
        'subtotal_iva0' => number_format($subtotal_iva0, 2),
        'iva_15' => number_format($iva_15, 2),
        'total_con_iva_15' => number_format($total_con_iva_15, 2)
    );
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

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .producto-azul {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <div class="row">
            <div class="col-lg-8">
                <?php if (!empty($error_message)) : ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($error_message) ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($_SESSION['message']) ?>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <?php if (!empty($_SESSION['carrito'])) : ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['carrito'] as $producto) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                                    <td><?= htmlspecialchars(number_format($producto['precio'], 2)) ?></td>
                                    <td>
                                        <form action="carrito.php" method="post">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id']) ?>">
                                            <input type="hidden" name="redirect_url" value="carrito.php">
                                            <input type="number" name="cantidad" value="<?= htmlspecialchars($producto['cantidad']) ?>" min="1" class="form-control" style="width: 70px;">
                                            <button type="submit" name="btnActualizar" class="btn btn-sm btn-primary">Actualizar</button>
                                        </form>
                                    </td>
                                    <td><?= htmlspecialchars(number_format($producto['precio'] * $producto['cantidad'], 2)) ?></td>
                                    <td>
                                        <form action="carrito.php" method="post" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id']) ?>">
                                            <input type="hidden" name="redirect_url" value="carrito.php">
                                            <button type="submit" name="btnEliminar" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert-warning">
                        No hay productos en el carrito.
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Resumen del Pedido
                    </div>
                    <div class="card-body">
                        <?php if (!empty($_SESSION['carrito'])) : ?>
                            <?php
                            $resumen = calcularTotal($_SESSION['carrito']);
                            ?>

                            </form>
                            <p>Subtotal IVA 15%: <span class="producto-azul">$<?= htmlspecialchars($resumen['subtotal_iva15']) ?></span></p>
                            <p>Subtotal IVA 0%: $<?= htmlspecialchars($resumen['subtotal_iva0']) ?></p>
                            <p>IVA 15%: $<?= htmlspecialchars($resumen['iva_15']) ?></p>
                            <p>Total: <strong>$<?= htmlspecialchars($resumen['total']) ?></strong></p>
                            <p>Total con IVA 15%: <strong>$<?= htmlspecialchars($resumen['total_con_iva_15']) ?></strong></p>
                            <hr>
                        <?php else : ?>
                            <p>No hay productos en el carrito para mostrar el resumen.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <form action="tu_ruta_de_procesamiento" method="post">
            <!-- Lugar de entrega -->
            <label for="lugar-entrega">Lugar de entrega:</label>
            <input type="text" id="lugar-entrega" name="lugar-entrega" required><br><br>

            <!-- Costo de entrega (desglosar el IVA) -->
            <label for="costo-entrega">Costo de entrega (desglosar el IVA):</label>
            <select id="costo-entrega" name="costo-entrega" required>
                <option value="">Selecciona el costo de entrega</option>
                <option value="standard">Standard - $5.00 (IVA incluido)</option>
                <option value="express">Express - $10.00 (IVA incluido)</option>
                <option value="overnight">Overnight - $20.00 (IVA incluido)</option>
            </select><br><br>

            <!-- Datos del cliente para facturación -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <!-- Forma de pago -->
            <label for="forma-pago">Forma de pago:</label>
            <select id="forma-pago" name="forma-pago" required>
                <option value="">Selecciona la forma de pago</option>
                <option value="tarjeta">Tarjeta de crédito</option>
                <option value="paypal">PayPal</option>
                <option value="transferencia">Transferencia bancaria</option>
            </select><br><br>

            <!-- Botón para confirmar pago -->
            <button type="submit">Confirmar pago</button>
        </form>
    </center>
    <p class="text-center mt-4"><a href="index.php">Seguir comprando</a></p>
</body>

</html>