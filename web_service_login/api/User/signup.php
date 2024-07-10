<?php
// Incluir el archivo de configuración de la base de datos y la definición de la clase User
include_once '../config/database.php';
include_once '../objects/user.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mostrar el contenido de $_POST para depuración
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    // Verificar si 'username' y 'password' están seteados en la solicitud POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener la conexión a la base de datos
        $database = new Database();
        $db = $database->getConnection();

        // Instanciar el objeto User
        $user = new User($db);

        // Establecer los valores de las propiedades del usuario
        $user->username = $_POST['username'];
        $user->password = base64_encode($_POST['password']);
        $user->created = date('Y-m-d H:i:s');

        // Crear el usuario
        if ($user->signup()) {
            $user_arr = array(
                "status" => true,
                "message" => "Successfully Signup!",
                "id" => $user->id,
                "username" => $user->username
            );
        } else {
            $user_arr = array(
                "status" => false,
                "message" => "Username already exists!"
            );
        }
    } else {
        // Manejar caso en que falta 'username' o 'password'
        $user_arr = array(
            "status" => false,
            "message" => "Username and password are required."
        );
    }

    // Mostrar la respuesta como JSON
    echo json_encode($user_arr);
} else {
    // Mostrar mensaje si no se ha enviado el formulario
    echo json_encode(array(
        "status" => false,
        "message" => "Form not submitted."
    ));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Signup</title>
</head>
<body>
    <h2>User Signup Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Signup">
    </form>
</body>
</html>
