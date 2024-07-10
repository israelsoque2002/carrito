<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viveres</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        .card-body {
            text-align: center;
            /* Centra el texto debajo de las imágenes */
        }

        .cantidad-form {
            border: 1px solid #ccc;
            /* Reducir el borde */
            text-align: center;
            /* Centrar el contenido del borde */
            padding: 5px;
            /* Añadir espacio interno */
            margin-top: 5px;
            /* Separación del botón de agregar al carrito */
        }

        .cantidad-form input[type="number"] {
            width: 50px;
            /* Tamaño inicial del campo de cantidad */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Tienda Online</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownProductos">
                        <a class="dropdown-item" href="viveres.php">Viveres</a>
                        <a class="dropdown-item" href="bebidas.php">Bebidas</a>
                        <a class="dropdown-item" href="snacks.php">Snacks</a>
                        <a class="dropdown-item" href="limpieza.php">Limpieza</a>
                        <a class="dropdown-item" href="aseo_personal.php">Aseo Personal</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contacto.php">Contáctanos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="carrito.php">Carrito <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <br><br>
    <?php
    session_start();

    // Verifica si hay productos en el carrito
    $numProductos = !empty($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0;
    ?>

    <div class="container">
        <br>
        <div class="alert alert-success" role="alert">
            <img src="images/carrito (2).png" alt="">
            <a href="carrito.php" class="badge badge-success">Ver carrito (<?php echo $numProductos; ?>)</a>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <?php
            // Incluir el archivo de conexión a la base de datos
            include_once 'config.php';

            // Verificar si la conexión se estableció correctamente
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Consulta SQL para obtener los productos de viveres
            $sql = "SELECT ProductoID, Nombre, Precio, RutaImagen FROM producto WHERE ProductoCategoriaID = 'Víveres' AND Activo = 1";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nombre = $row['Nombre'];
                    $precio = $row['Precio'];
                    $imagen = $row['RutaImagen'];
            ?>

                    <div class="col-3">
                        <div class="card">
                            <img title="<?php echo htmlspecialchars($nombre); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="card-img-top" src="<?php echo htmlspecialchars($imagen); ?>" height="200px" alt="">
                            <div class="card-body">
                                <span><?php echo htmlspecialchars($nombre); ?></span>
                                <h5 class="card-title">$ <?php echo htmlspecialchars($precio); ?></h5>
                                <p class="card-text">Descripción</p>
                                <form action="carrito.php" method="post" enctype="multipart/form-data" class="cantidad-form">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['ProductoID']); ?>">
                                    <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
                                    <input type="hidden" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
                                    <input type="hidden" name="iva" value="15">
                                    <input type="number" name="cantidad" value="1" min="1" class="form-control-sm">
                                    <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                                    <button class="btn btn-primary mt-2" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "No se encontraron productos de viveres.";
            }

            // Cerrar resultado
            $result->close();

            // Cerrar conexión
            $conn->close();
            ?>

        </div>
    </div>


</body>

</html>