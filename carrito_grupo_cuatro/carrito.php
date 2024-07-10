<?php
session_start();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnAccion'])) {
        // Lógica para agregar productos al carrito
        // ...
    }

    if (isset($_POST['btnEliminar'])) {
        // Lógica para eliminar productos del carrito
        // ...
    }

    if (isset($_POST['btnActualizar'])) {
        // Lógica para actualizar la cantidad de productos en el carrito
        // ...
    }

    if (isset($_POST['btnConfirmarPago'])) {
        // Lógica para procesar el pago
        $lugar_entrega = filter_input(INPUT_POST, 'lugar_entrega', FILTER_SANITIZE_STRING);
        $costo_entrega = filter_input(INPUT_POST, 'costo_entrega', FILTER_VALIDATE_FLOAT);
        $nombre_cliente = filter_input(INPUT_POST, 'nombre_cliente', FILTER_SANITIZE_STRING);
        $direccion_cliente = filter_input(INPUT_POST, 'direccion_cliente', FILTER_SANITIZE_STRING);
        $forma_pago = filter_input(INPUT_POST, 'forma_pago', FILTER_SANITIZE_STRING);

        // Procesar el pago aquí y guardar los detalles en la base de datos o realizar otras acciones necesarias

        // Limpiar el carrito después del pago
        unset($_SESSION['carrito']);

        // Redirigir a una página de confirmación o mostrar un mensaje de éxito
        header('Location: confirmacion.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        /* Estilos personalizados */
    </style>
</head>

<body>
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
                            $precio = (float)$producto['precio'];
                            $cantidad = (int)$producto['cantidad'];
                            $total_producto = $precio * $cantidad;

                            if ($producto['iva'] == 15) {
                                $subtotal_iva_15 += $total_producto;
                            } else {
                                $subtotal_iva_0 += $total_producto;
                            }

                            $total += $total_producto;

                            echo '<tr>';
                            echo '<td><span class="producto-azul">' . htmlspecialchars($producto['nombre']) . '</span></td>';
                            echo '<td>';
                            if (!empty($producto['imagen'])) {
                                echo '<img src="' . htmlspecialchars($producto['imagen']) . '" alt="Imagen de ' . htmlspecialchars($producto['nombre']) . '" width="50" height="50">';
                            } else {
                                echo 'Sin imagen';
                            }
                            echo '</td>';
                            echo '<td>' . number_format($precio, 2) . '</td>';
                            echo '<td>
                                <form action="carrito.php" method="post">
                                    <input type="hidden" name="id" value="' . htmlspecialchars($producto['id']) . '">
                                    <input type="number" name="cantidad" value="' . htmlspecialchars($cantidad) . '" min="1" class="form-control">
                                    <button class="btn btn-primary" name="btnActualizar" type="submit">Actualizar</button>
                                </form>
                            </td>';
                            echo '<td>' . number_format($total_producto, 2) . '</td>';
                            echo '<td>
                                <form action="carrito.php" method="post">
                                    <input type="hidden" name="id" value="' . htmlspecialchars($producto['id']) . '">
                                    <button class="btn btn-danger" name="btnEliminar" type="submit">Eliminar</button>
                                </form>
                            </td>';
                            echo '</tr>';
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
                        <td>IVA:</td>
                        <td><?php echo number_format($iva_15, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td><?php echo number_format($total, 2); ?></td>
                    </tr>
                </table>
                <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) : ?>
                    <div class="text-center">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#paymentModal">Pagar</a>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        No hay productos en el carrito.
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <p class="text-center">No hay productos en el carrito.</p>
            <?php endif; ?>
            <p class="text-center"><a href="<?php echo isset($_SESSION['redirect_url']) ? htmlspecialchars($_SESSION['redirect_url']) : 'index.php'; ?>">Volver a la tienda</a></p>
        </div>

        <!-- Modal de pago -->
        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Confirmar Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="carrito.php" method="post">
                            <div class="form-group">
                                <label for="lugar_entrega">Lugar de entrega</label>
                                <input type="text" class="form-control" id="lugar_entrega" name="lugar_entrega" required>
                            </div>
                            <div class="form-group">
                                <label for="costo_entrega">Costo de entrega (desglosar el IVA)</label>
                                <input type="number" class="form-control" id="costo_entrega" name="costo_entrega" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre_cliente">Nombre del cliente</label>
                                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion_cliente">Dirección del cliente</label>
                                <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" required>
                            </div>
                            <div class="form-group">
                                <label for="forma_pago">Forma de pago</label>
                                <select class="form-control" id="forma_pago" name="forma_pago" required>
                                    <option value="Tarjeta">Tarjeta</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="btnConfirmarPago">Confirmar Pago</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9xaBtd7xR+6tnhLE9tYBA8zLmF0cw8H9Plm9T" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFwUa8UksdQRVvoxMfooAOqyN2i" crossorigin="anonymous"></script>
    </body>
</html>

