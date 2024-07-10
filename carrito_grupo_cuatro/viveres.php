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

    <br><br>
    <div class="container">
        <br>
        <div class="alert alert-success" role="alert">
            Pantalla de mensaje...... <img src="Imagenes/carrito (2).png" alt="">
            <a href="carrito.php" class="badge badge-success">Ver carrito</a>
        </div>
    </div>

    <div class="row">
        <!-- Producto 1 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/Designer (2).jpeg" alt="" height="200px">
                <div class="card-body">
                    <span>Arroz (1 kg)</span>
                    <h5 class="card-title">$ 1.50</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="nombre" value="Arroz (1 kg)">
                        <input type="hidden" name="precio" value=" 1.50">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Producto 2 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/Designer (1).jpeg" height="200px" alt="">
                <div class="card-body">
                    <span>Pasta (500 g)</span>
                    <h5 class="card-title">$ 1.20</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="nombre" value="Pasta (500 g)">
                        <input type="hidden" name="precio" value="1.20">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Producto 3 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/Designer (2).jpeg" height="200px" alt="">
                <div class="card-body">
                    <span>Lentejas (1 kg)</span>
                    <h5 class="card-title">$ 2.00</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="nombre" value="Lentejas (1 kg)">
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
        <!-- Producto 4 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/f.elconfidencial.com_original_6be_87b_448_6be87b448c2cf27ea55a994c163556d6.jpg" alt="" height="200px">
                <div class="card-body">
                    <span>Harina (1 kg)</span>
                    <h5 class="card-title">$ 1.00</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="4">
                        <input type="hidden" name="nombre" value="Harina (1 kg)">
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
        <!-- Producto 5 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/lukasz-rawa-h-xmD_Sg_08-unsplash.jpg" alt="" height="200px">
                <div class="card-body">
                    <span>Frijoles (1 kg)</span>
                    <h5 class="card-title">$ 2.50</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="5">
                        <input type="hidden" name="nombre" value="Frijoles (1 kg)">
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
        <!-- Producto 6 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/roberta-sorge-uOBApnN_K7w-unsplash.jpg" alt="" height="200px">
                <div class="card-body">
                    <span>Aceite de oliva (1 litro)</span>
                    <h5 class="card-title">$ 6.00</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="6">
                        <input type="hidden" name="nombre" value="Aceite de oliva (1 litro)">
                        <input type="hidden" name="precio" value="6.00">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Producto 7 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/charlesdeluvio-sSLI7KXPwzU-unsplash.png" alt="" height="200px">
                <div class="card-body">
                    <span>Sal (1 kg)</span>
                    <h5 class="card-title">$ 0.50</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="7">
                        <input type="hidden" name="nombre" value="Sal (1 kg)">
                        <input type="hidden" name="precio" value="0.50">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="iva" value="15">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Producto 8 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/mathilde-langevin-ymEgsqhdOXw-unsplash.jpg" alt="" height="200px">
                <div class="card-body">
                    <span>Azúcar (1 kg)</span>
                    <h5 class="card-title">$ 1.00</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="8">
                        <input type="hidden" name="nombre" value="Azúcar (1 kg)">
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
        <!-- Producto 9 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/howtogym-S9NchuPb79I-unsplash.jpg" alt="" height="200px">
                <div class="card-body">
                    <span>Leche en polvo (500 g)</span>
                    <h5 class="card-title">$ 3.00</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="nombre" value="Leche en polvo (500 g)">
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
        <!-- Producto 10 -->
        <div class="col-3">
            <div class="card">
                <img title="Titulo del producto" alt="Titulo" class="card-img-top" src="Imagenes/viveres/margarita-zueva-CY-OkOICA9o-unsplash.jpg" alt="" height="200px">
                <div class="card-body">
                    <span>Avena (500 g)</span>
                    <h5 class="card-title">$ 2.00</h5>
                    <p class="card-text">Descripción</p>
                    <form action="carrito.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="10">
                        <input type="hidden" name="nombre" value="Avena (500 g)">
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