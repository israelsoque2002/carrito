<?php

// get database connection
include_once '../config/database.php';

// instantiate user object
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// Check if 'username' and 'password' are set in the request
if (isset($_POST['username']) && isset($_POST['password'])) { // Debe ser $_POST en lugar de $_GET para la contraseña
    // set user property values
    $user->username = $_POST['username']; // Debe ser $_POST para el nombre de usuario
    $user->password = base64_encode($_POST['password']); // Debe ser $_POST para la contraseña
    $user->created = date('Y-m-d H:i:s');

    // create the user
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
    // Handle missing username or password
    $user_arr = array(
        "status" => false,
        "message" => "Username and password are required."
    );
}

print_r(json_encode($user_arr));
?>
