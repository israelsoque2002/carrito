<?php
session_start();

// Ejemplo de adición de productos (ajusta según tu lógica)
$productos = array(
    array(
        'id' => 1,
        'nombre' => 'Snack 1',
        'precio' => 10.50,
        'cantidad' => 1,
        'iva' => 16,
        'categoria' => 'snack'
    ),
    array(
        'id' => 2,
        'nombre' => 'Aseo 1',
        'precio' => 20.75,
        'cantidad' => 1,
        'iva' => 16,
        'categoria' => 'aseo'
    )
);

// Procesar la solicitud de agregar al carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnAgregarCarrito'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
        $cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT);
        $iva = filter_input(INPUT_POST, 'iva', FILTER_VALIDATE_INT);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
        $redirect_url = filter_input(INPUT_POST, 'redirect_url', FILTER_SANITIZE_URL);

        if ($id !== false && $nombre !== false && $precio !== false && $cantidad !== false && $iva !== false && $categoria !== false) {
            // Verificar si el producto ya está en el carrito
            $producto_existente = false;
            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $producto) {
                    if ($producto['id'] == $id) {
                        $producto_existente = true;
                        break;
                    }
                }
            }

            if (!$producto_existente) {
                // Crear el producto
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad,
                    'iva' => $iva,
                    'categoria' => $categoria
                );

                // Agregar el producto al carrito
                if (!isset($_SESSION['carrito'])) {
                    $_SESSION['carrito'] = array();
                }

                $_SESSION['carrito'][] = $producto;

                // Guardar la URL de la página anterior en la sesión
                $_SESSION['redirect_url'] = $redirect_url;

                header('Location: viveres.php');
                exit();
            } else {
                // Mensaje de producto ya elegido
                $error_message = 'El producto <span style="color: blue;">' . htmlspecialchars($nombre) . '</span> ya ha sido añadido al carrito.';
            }
        } else {
            $error_message = 'Datos del producto inválidos.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .card-header {
            background-color: #343a40;
            color: white;
        }

        .card-body {
            padding: 2rem;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            margin-top: 10px;
        }

        .product-title {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Mi Tienda Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viveres.php">Viveres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bebidas.php">Bebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="snacks.php">Snacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aseo_personal.php">Aseo Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrito.php">Carrito</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Carrusel de imágenes -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Imágenes banner/uno.png" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="Imágenes banner/dos.png" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="Imágenes banner/tres.png" class="d-block w-100" alt="Banner 3">
                </div>
                <div class="carousel-item">
                    <img src="Imágenes banner/cuatro.png" class="d-block w-100" alt="Banner 4">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>

        <!-- Productos -->
        <div class="card mt-5">
            <div class="card-header">
                <h2>Productos Disponibles</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="product-title">Snacks</h3>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $productos[0]['id']; ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $productos[0]['nombre']; ?>">
                                    <input type="hidden" name="precio" value="<?php echo $productos[0]['precio']; ?>">
                                    <input type="hidden" name="cantidad" value="<?php echo $productos[0]['cantidad']; ?>">
                                    <input type="hidden" name="iva" value="<?php echo $productos[0]['iva']; ?>">
                                    <input type="hidden" name="categoria" value="<?php echo $productos[0]['categoria']; ?>">
                                    <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <button type="submit" name="btnAgregarCarrito" class="btn btn-primary">Agregar al Carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="product-title">Aseo Personal</h3>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $productos[1]['id']; ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $productos[1]['nombre']; ?>">
                                    <input type="hidden" name="precio" value="<?php echo $productos[1]['precio']; ?>">
                                    <input type="hidden" name="cantidad" value="<?php echo $productos[1]['cantidad']; ?>">
                                    <input type="hidden" name="iva" value="<?php echo $productos[1]['iva']; ?>">
                                    <input type="hidden" name="categoria" value="<?php echo $productos[1]['categoria']; ?>">
                                    <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <button type="submit" name="btnAgregarCarrito" class="btn btn-primary">Agregar al Carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBkKykCKRdKah68X39i4R0Lt6x3E6qC82p6F0ihM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+d4MGA96zT1KgG9KRmY9lIJO+KxO8R1pDzYxM2f6LGpAnblwY" crossorigin="anonymous"></script>
</body>

</html>