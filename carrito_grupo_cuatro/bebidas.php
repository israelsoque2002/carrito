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
            Pantalla de mensaje...... <img src="Imagenes/carrito (2).png" alt="">
            <a href="mostrar_carrito.php" class="badge badge-success">Ver carrito</a>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="card">
                <img title="Agua embotellada (1.5 litros)" alt="Agua embotellada (1.5 litros)" class="card-img-top" src="Imagenes/bebidas/nathan-dumlao-sIVjw-ps25g-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Agua embotellada (1.5 litros)</span>
                    <h5 class="card-title">$ 0.70</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="nombre" value="Agua embotellada (1.5 litros)">
                        <input type="hidden" name="precio" value="0.70">
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
                <img title="Jugo de naranja (1 litro)" alt="Jugo de naranja (1 litro)" class="card-img-top" src="Imagenes/bebidas/paul-hanaoka-8WYjqXqNZs4-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Jugo de naranja (1 litro)</span>
                    <h5 class="card-title">$ 2.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="nombre" value="Jugo de naranja (1 litro)">
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
                <img title="Refresco (2 litros)" alt="Refresco (2 litros)" class="card-img-top" src="Imagenes/bebidas/andrey-ilkevich-Qvnohn4GyJA-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Refresco (2 litros)</span>
                    <h5 class="card-title">$ 1.50</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="nombre" value="Refresco (2 litros)">
                        <input type="hidden" name="precio" value="1.50">
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
                <img title="Café (250 g)" alt="Café (250 g)" class="card-img-top" src="Imagenes/bebidas/clay-banks-_wkd7XBRfU4-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Café (250 g)</span>
                    <h5 class="card-title">$ 4.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="4">
                        <input type="hidden" name="nombre" value="Café (250 g)">
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
                <img title="Té" alt="Té" class="card-img-top" src="Imagenes/bebidas/aniketh-kanukurthi-Qaor6nxikUM-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Té</span>
                    <h5 class="card-title">$ 2.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="5">
                        <input type="hidden" name="nombre" value="Té">
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
                <img title="Cerveza (6 pack)" alt="Cerveza (6 pack)" class="card-img-top" src="Imagenes/bebidas/giovanna-gomes-_8KV86shhPo-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Cerveza (6 pack)</span>
                    <h5 class="card-title">$ 8.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="6">
                        <input type="hidden" name="nombre" value="Cerveza (6 pack)">
                        <input type="hidden" name="precio" value="8.00">
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
                <img title="Vino (botella)" alt="Vino (botella)" class="card-img-top" src="Imagenes/bebidas/hector-j-rivas-N7M7mSgUgwo-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Vino (botella)</span>
                    <h5 class="card-title">$ 10.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="7">
                        <input type="hidden" name="nombre" value="Vino (botella)">
                        <input type="hidden" name="precio" value="10.00">
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
                <img title="Leche de almendras (1 litro)" alt="Leche de almendras (1 litro)" class="card-img-top" src="Imagenes/bebidas/sandi-benedicta-8Pp9M13xuzs-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Leche de almendras (1 litro)</span>
                    <h5 class="card-title">$ 3.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="8">
                        <input type="hidden" name="nombre" value="Leche de almendras (1 litro)">
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
                <img title="Bebida energética (1 unidad)" alt="Bebida energética (1 unidad)" class="card-img-top" src="Imagenes/bebidas/gkgraphix-53-Bf-K7BbYIMo-unsplash.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Bebida energética (1 unidad)</span>
                    <h5 class="card-title">$ 2.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="nombre" value="Bebida energética (1 unidad)">
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
                <img title="Sidra (1 litro)" alt="Sidra (1 litro)" class="card-img-top" src="Imagenes/bebidas/sidra2.jpg" height="200px" alt="">
                <div class="card-body">
                    <span>Sidra (1 litro)</span>
                    <h5 class="card-title">$ 5.00</h5>
                    <p class="card-text">Descripcion</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="10">
                        <input type="hidden" name="nombre" value="Sidra (1 litro)">
                        <input type="hidden" name="precio" value="5.00">
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