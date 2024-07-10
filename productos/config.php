<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Función para obtener y mostrar productos por categoría
function mostrarProductosPorCategoria($conn, $categoria) {
    $sql = "SELECT ProductoID, Nombre, Precio, RutaImagen
            FROM producto
            WHERE ProductoCategoriaID = (
                SELECT ProductoCategoriaID
                FROM productocategoria
                WHERE Nombre = ?
            ) AND Activo = 1";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $categoria);

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>$categoria</h2>";
        echo "<div class='row'>";

        while ($row = $result->fetch_assoc()) {
            $nombre = htmlspecialchars($row["Nombre"]);
            $precio = number_format($row["Precio"], 2);
            $imagen = htmlspecialchars($row["RutaImagen"]);
            $productoID = htmlspecialchars($row["ProductoID"]);

            // Imprimir la ruta de la imagen para depuración
            echo "<!-- Ruta de la imagen: " . $imagen . " -->";

            echo "<div class='col-3'>";
            echo "<div class='card'>";
            echo "<img title='$nombre' alt='$nombre' class='card-img-top' src='$imagen' height='200px'>";
            echo "<div class='card-body'>";
            echo "<span>$nombre</span>";
            echo "<h5 class='card-title'>$ $precio</h5>";
            echo "<p class='card-text'>Descripción</p>";
            echo "<form action='carrito.php' method='post' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='id' value='$productoID'>";
            echo "<input type='hidden' name='nombre' value='$nombre'>";
            echo "<input type='hidden' name='precio' value='$precio'>";
            echo "<input type='number' name='cantidad' value='1' min='1' class='form-control'>";
            echo "<input type='hidden' name='iva' value='15'>";
            echo "<input type='hidden' name='redirect_url' value='" . htmlspecialchars($_SERVER['REQUEST_URI']) . "'>";
            echo "<button class='btn btn-primary mt-2' name='btnAccion' value='Agregar' type='submit'>Agregar al carrito</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>";
    } else {
        echo "No se encontraron productos en la categoría '$categoria'.";
    }

    // Cerrar consulta
    $stmt->close();
}
?>
