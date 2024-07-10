<?php
session_start();

// Ejemplo de categorías y productos estáticos
$categorias = array(
    'Viveres',
    'Bebidas',
    'Snacks',
    'Limpieza',
    'Aseo Personal'
);

$productos = array(
    'Viveres' => array(
        array('id' => 1, 'nombre' => 'Arroz (1 kg)', 'precio' => 1.50, 'iva' => 16, 'pagina' => 'viveres.php', 'imagen' => 'images/productos/thumbnails/alimentos/viveres1.png'),
        array('id' => 2, 'nombre' => 'Pasta (500 g)', 'precio' => 1.20, 'iva' => 16, 'pagina' => 'viveres.php'),
        array('id' => 3, 'nombre' => 'Lentejas (1 kg)', 'precio' => 2.00, 'iva' => 16, 'pagina' => 'viveres.php'),
        // Agrega más productos de la categoría Viveres según sea necesario
    ),
    'Bebidas' => array(
        array('id' => 11, 'nombre' => 'Jugo de naranja (1 litro)', 'precio' => 0.70, 'iva' => 16, 'pagina' => 'bebidas.php'),
        array('id' => 12, 'nombre' => 'Refresco (2 litros)', 'precio' => 1.50, 'iva' => 16, 'pagina' => 'bebidas.php'),
        array('id' => 13, 'nombre' => 'Café (250 g)', 'precio' => 4.00, 'iva' => 16, 'pagina' => 'bebidas.php'),
        // Agrega más productos de la categoría Bebidas según sea necesario
    ),
    'Snacks' => array(
        array('id' => 21, 'nombre' => 'Papas fritas (bolsa)', 'precio' => 1.50, 'iva' => 16, 'pagina' => 'snacks.php'),
        array('id' => 22, 'nombre' => 'Galletas (paquete)', 'precio' => 2.50, 'iva' => 16, 'pagina' => 'snacks.php'),
        array('id' => 23, 'nombre' => 'Chocolate (barra)', 'precio' => 1.50, 'iva' => 16, 'pagina' => 'snacks.php'),
        // Agrega más productos de la categoría Snacks según sea necesario
    ),
    'Limpieza' => array(
        array('id' => 31, 'nombre' => 'Detergente (1 litro)', 'precio' => 3.00, 'iva' => 16, 'pagina' => 'limpieza.php'),
        array('id' => 32, 'nombre' => 'Suavizante (1 litro)', 'precio' => 2.50, 'iva' => 16, 'pagina' => 'limpieza.php'),
        array('id' => 33, 'nombre' => 'Limpiador multiusos (1 litro)', 'precio' => 2.00, 'iva' => 16, 'pagina' => 'limpieza.php'),
        // Agrega más productos de la categoría Limpieza según sea necesario
    ),
    'Aseo Personal' => array(
        array('id' => 41, 'nombre' => 'Jabón (1 unidad)', 'precio' => 1.00, 'iva' => 16, 'pagina' => 'aseo_personal.php'),
        array('id' => 42, 'nombre' => 'Champú (500 ml)', 'precio' => 3.00, 'iva' => 16, 'pagina' => 'aseo_personal.php'),
        array('id' => 43, 'nombre' => 'Pasta de dientes (1 tubo)', 'precio' => 2.00, 'iva' => 16, 'pagina' => 'aseo_personal.php'),
        // Agrega más productos de la categoría Aseo Personal según sea necesario
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

                // Redireccionar a la página de productos (ajusta según tu configuración)
                header('Location: ' . $redirect_url);
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
            margin: 0;
            padding: 0;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .carousel-container {
            width: 100%;
            /* Ancho completo */
            height: 50vh;
            /* Altura ajustable */
            overflow: hidden;
            position: relative;
            margin-top: -20px;
            /* Ajusta este margen para que el carrusel se posicione correctamente */
            z-index: 1;
            /* Ajusta el z-index si es necesario para que el carrusel se superponga al menú */
        }

        .carousel-slide {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: auto;
            background: transparent;
            border: none;
        }

        .carousel-indicators {
            bottom: -30px;
        }

        .carousel-indicators li {
            background-color: rgba(0, 0, 0, 0.5);
            width: 10px;
            height: 10px;
            margin: 0 5px;
            border-radius: 50%;
        }

        .carousel-indicators .active {
            background-color: #007bff;
        }

        .categoria-section {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .categoria-title {
            margin-bottom: 20px;
        }

        .producto-card {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Mi Tienda Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viveres.php">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php">
                        CARRITO
                        <img src="images/carrito (2).png" class="img-fluid" alt="Carrito de Compras">
                        <span class="badge badge-light"><?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Carrusel de imágenes -->
    <div class="carousel-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="Imágenes banner/uno.png" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Imágenes banner/dos.png" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Imágenes banner/tres.png" alt="Banner 3">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Imágenes banner/cuatro.png" alt="Banner 4">
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
    </div>

    <!-- Categorías y productos -->
    <div class="container">
        <?php foreach ($categorias as $categoria) : ?>
            <section class="categoria-section">
                <h2 class="categoria-title"><?php echo $categoria; ?></h2>
                <div class="row">
                    <?php foreach ($productos[$categoria] as $producto) : ?>
                        <div class="col-md-4">
                            <div class="card producto-card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                    <p class="card-text">$<?php echo number_format($producto['precio'], 2); ?></p>
                                    <form method="post" action="<?php echo $producto['pagina']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                        <input type="hidden" name="nombre" value="<?php echo $producto['nombre']; ?>">
                                        <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                                        <input type="hidden" name="cantidad" value="1">
                                        <input type="hidden" name="iva" value="<?php echo $producto['iva']; ?>">
                                        <input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
                                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <button type="submit" class="btn btn-primary">Visitar página del producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // Inicializar el carrusel con navegación automática y manual
            $('.carousel').carousel({
                interval: 3000, // Intervalo de 3 segundos entre cada slide
                pause: 'hover' // Pausa en hover
            });

            // Navegación manual con controles
            $('.carousel-control-prev').click(function() {
                $('.carousel').carousel('prev');
            });

            $('.carousel-control-next').click(function() {
                $('.carousel').carousel('next');
            });
        });
    </script>
</body>

</html>