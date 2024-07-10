<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Tienda Online</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Tienda Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#my-nav"
            aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="my-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProductos" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownProductos">
                        <a class="dropdown-item" href="viveres.php">Víveres</a>
                        <a class="dropdown-item" href="bebidas.php">Bebidas</a>
                        <a class="dropdown-item" href="snacks.php">Snacks</a>
                        <a class="dropdown-item" href="limpieza.php">Limpieza</a>
                        <a class="dropdown-item" href="aseo_personal.php">Aseo Personal</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contacto.php">Contáctanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <br><br><br>
    <div class="container">
        <h1 class="mt-4 mb-3">Contáctanos</h1>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Envíanos un mensaje</h3>
                <form>
                    <div class="form-group">
                        <label for="contact-name">Nombre</label>
                        <input type="text" class="form-control" id="contact-name" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Correo electrónico</label>
                        <input type="email" class="form-control" id="contact-email" placeholder="Tu correo electrónico"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="contact-phone">Teléfono</label>
                        <input type="tel" class="form-control" id="contact-phone" placeholder="Tu teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Mensaje</label>
                        <textarea class="form-control" id="contact-message" rows="5" placeholder="Tu mensaje"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-lg-4 mb-4">
                <h3>Detalles de contacto</h3>
                <p>
                    Dirección de la tienda<br>
                    Quito, Ecuador<br>
                    <br>
                </p>
                <p>
                    <abbr title="Teléfono">Teléfono:</abbr> (+593) 456-7890
                </p>
                <p>
                    <abbr title="Email">Correo electrónico:</abbr>
                    <a href="mailto:tiendaonline@gmail.com">tiendaonline@gmail.com</a>
                </p>
                <p>
                    <abbr title="Horas">Horas:</abbr> Lunes - Viernes: 9:00 AM a 5:00 PM
                </p>
            </div>
        </div>
    </div>

    <!-- Modal de inicio de sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="login-email">Correo electrónico</label>
                            <input type="email" class="form-control" id="login-email"
                                placeholder="Tu correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="login-password">Contraseña</label>
                            <input type="password" class="form-control" id="login-password" placeholder="Tu contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
