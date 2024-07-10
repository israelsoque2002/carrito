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
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/alecsander-alves-WeEaKXZkBsQ-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Jabón (1 unidad)</span>
                    <h5 class="card-title">$ 1.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="nombre" value="Jab'on">
                        <input type="hidden" name="precio" value="1.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/pmv-chamara-OXYOFT9gTOE-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Champú (500 ml)</span>
                    <h5 class="card-title">$ 3.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="nombre" value="Chamú (500 ml)">
                        <input type="hidden" name="precio" value="3.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/jonathan-cooper-WdJRLZrWAvQ-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Pasta de dientes (1 tubo)</span>
                    <h5 class="card-title">$ 2.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="nombre" value="Pasta de dientes (1 tubo)">
                        <input type="hidden" name="precio" value="2.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/mojtaba-mosayebzadeh-Uirh8KpGMrU-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Desodorante (1 unidad)</span>
                    <h5 class="card-title">$ 3.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="4">
                        <input type="hidden" name="nombre" value="Desodorante (1 unidad)">
                        <input type="hidden" name="precio" value="3.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/neauthy-skincare-8jg7vumdUlU-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Acondicionador (500 ml)</span>
                    <h5 class="card-title">$ 3.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="5">
                        <input type="hidden" name="nombre" value="Acondicionador (500 ml)">
                        <input type="hidden" name="precio" value="3.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/mishaal-zahed-KDJ1TbLDoOo-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Enjuague bucal (500 ml)</span>
                    <h5 class="card-title">$ 4.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="6">
                        <input type="hidden" name="nombre" value="Enjuague bocal (500 ml)">
                        <input type="hidden" name="precio" value="4.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/taylor-beach-kwu9Ny5dKOE-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Crema corporal (250 ml)</span>
                    <h5 class="card-title">$ 3.50</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="7">
                        <input type="hidden" name="nombre" value="Crema corporal (250 ml)">
                        <input type="hidden" name="precio" value="3.50">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/claire-mueller-3HoHDoFL5gM-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Papel higiénico (4 rollos)</span>
                    <h5 class="card-title">$ 2.50</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="8">
                        <input type="hidden" name="nombre" value="Papel higiénico (4 rollos)">
                        <input type="hidden" name="precio" value="2.50">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/natracare-2eDUzkOfNpA-unsplash (1).jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Toallas sanitarias (paquete de 10)</span>
                    <h5 class="card-title">$ 3.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="nombre" value="Toallas sanitarias (paquete de 10)">
                        <input type="hidden" name="precio" value="3.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes\aseo_personal/brett-jordan-SlBPJExlseU-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Rasuradoras desechables (paquete de 5)</span>
                    <h5 class="card-title">$ 2.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="10">
                        <input type="hidden" name="nombre" value="Rasuradoras desechables (paquete de 5)">
                        <input type="hidden" name="precio" value="2.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>