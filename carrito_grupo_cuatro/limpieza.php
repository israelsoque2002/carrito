<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
                <!-- Fin del menú desplegable -->

                <li class="nav-item active">
                    <a class="nav-link" href="contacto.php">Contáctanos <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="carrito.php">Carrito <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>

    <br>
    <br>
    <div class="container">
        <br>
        <div class="alert alert-success" role="alert">
            Pantalla de mensaje...... <img src="Imagenes/carrito (2).png " alt="">
            <a href="carrito.php" class="badge badge-success">Ver carrito</a>
        </div>
    </div>

        <div class="row">
            <!-- Producto 1 -->
            <div class="col-3">
                <div class="card">
                    <img title="Detergente (1 litro)" alt="Detergente" class="card-img-top" src="Imagenes/limpieza/clay-banks-kBaf0DwBPbE-unsplash.jpg" height="200px">
                    <div class="card-body">
                        <span>Detergente (1 litro)</span>
                        <h5 class="card-title">$ 3.00</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="1">
                            <input type="hidden" name="nombre" value="Detergente (1 litro)">
                            <input type="hidden" name="precio" value="3.00">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="col-3">
                <div class="card">
                    <img title="Suavizante (1 litro)" alt="Suavizante" class="card-img-top" src="Imagenes/limpieza/29168_G.jpg" height="200px">
                    <div class="card-body">
                        <span>Suavizante (1 litro)</span>
                        <h5 class="card-title">$ 2.50</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="2">
                            <input type="hidden" name="nombre" value="Suavizante (1 litro)">
                            <input type="hidden" name="precio" value="2.50">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="col-3">
                <div class="card">
                    <img title="Limpiador multiusos (1 litro)" alt="Limpiador multiusos" class="card-img-top" src="Imagenes/limpieza/pan-xiaozhen-pj-BrFZ9eAA-unsplash.jpg" height="200px">
                    <div class="card-body">
                        <span>Limpiador multiusos (1 litro)</span>
                        <h5 class="card-title">$ 2.00</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="3">
                            <input type="hidden" name="nombre" value="Limpiador multiusos (1 litro)">
                            <input type="hidden" name="precio" value="2.00">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="col-3">
                <div class="card">
                    <img title="Papel higiénico (4 rollos)" alt="Papel higiénico" class="card-img-top" src="Imagenes/limpieza/colourblind-kevin-jEMcrcWSf3M-unsplash.jpg" height="200px">
                    <div class="card-body">
                        <span>Papel higiénico (4 rollos)</span>
                        <h5 class="card-title">$ 2.50</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="4">
                            <input type="hidden" name="nombre" value="Papel higiénico (4 rollos)">
                            <input type="hidden" name="precio" value="2.50">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="col-3">
                <div class="card">
                    <img title="Toallas de papel (rollo)" alt="Toallas de papel" class="card-img-top" src="Imagenes/limpieza/toalla-z-economica-2.jpg" height="200px">
                    <div class="card-body">
                        <span>Toallas de papel (rollo)</span>
                        <h5 class="card-title">$ 1.50</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="5">
                            <input type="hidden" name="nombre" value="Toallas de papel (rollo)">
                            <input type="hidden" name="precio" value="1.50">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 6 -->
            <div class="col-3">
                <div class="card">
                    <img title="Desinfectante (1 litro)" alt="Desinfectante" class="card-img-top" src="Imagenes/limpieza/no-revisions-MzKfGx6Kyd8-unsplash.jpg" height="200px">
                    <div class="card-body">
                        <span>Desinfectante (1 litro)</span>
                        <h5 class="card-title">$ 2.50</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="6">
                            <input type="hidden" name="nombre" value="Desinfectante (1 litro)">
                            <input type="hidden" name="precio" value="2.50">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 7 -->
            <div class="col-3">
                <div class="card">
                    <img title="Lavaplatos líquido (1 litro)" alt="Lavaplatos líquido" class="card-img-top" src="Imagenes/limpieza/nathan-dumlao-mAWTLZIjI8k-unsplash.jpg" height="200px">
                    <div class="card-body">
                        <span>Lavaplatos líquido (1 litro)</span>
                        <h5 class="card-title">$ 2.00</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="7">
                            <input type="hidden" name="nombre" value="Lavaplatos líquido (1 litro)">
                            <input type="hidden" name="precio" value="2.00">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 8 -->
            <div class="col-3">
                <div class="card">
                    <img title="Limpiador de vidrios (500 ml)" alt="Limpiador de vidrios" class="card-img-top" src="Imagenes/limpieza/monika-borys-Jev1bpIZj2Y-unsplash.jpg" height="200px">
                    <div class="card-body">
                        <span>Limpiador de vidrios (500 ml)</span>
                        <h5 class="card-title">$ 1.50</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="8">
                            <input type="hidden" name="nombre" value="Limpiador de vidrios (500 ml)">
                            <input type="hidden" name="precio" value="1.50">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 9 -->
            <div class="col-3">
                <div class="card">
                    <img title="Cloro (1 litro)" alt="Cloro" class="card-img-top" src="Imagenes/limpieza/Copia-de-220224_CBX_CH_CLX_Splashless_Original_950g.webp" height="200px">
                    <div class="card-body">
                        <span>Cloro (1 litro)</span>
                        <h5 class="card-title">$ 1.00</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="9">
                            <input type="hidden" name="nombre" value="Cloro (1 litro)">
                            <input type="hidden" name="precio" value="1.00">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Producto 10 -->
            <div class="col-3">
                <div class="card">
                    <img title="Bolsas de basura (paquete de 20)" alt="Bolsas de basura" class="card-img-top" src="Imagenes/limpieza/la-autentica-funda-de-basura-industrial-76-cm-x-92-cm.jpg" height="200px">
                    <div class="card-body">
                        <span>Bolsas de basura (paquete de 20)</span>
                        <h5 class="card-title">$ 3.00</h5>
                        <p class="card-text">Descripcion</p>
                        <form action="carrito.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="10">
                            <input type="hidden" name="nombre" value="Bolsas de basura (paquete de 20)">
                            <input type="hidden" name="precio" value="3.00">
                            <input type="hidden" name="cantidad" value="1">
                            <input type="hidden" name="iva" value="15">
                            <input type="number" name="cantidad" value="1" min="1">
                            <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>