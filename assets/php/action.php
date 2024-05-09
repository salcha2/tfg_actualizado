<?php
session_start();

require_once 'auth.php';
$user = new Auth();

if(isset($_POST['action']) && $_POST['action'] == 'register'){
    $name = $user->test_input($_POST['name']);
    $username = $user->test_input($_POST['username']);
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

    $hpass = password_hash($pass, PASSWORD_DEFAULT);

    // Generar un token para el nuevo usuario
    $token = generateToken();

    if($user->user_exist($email)){
        echo $user->showMessage('warning', 'This E-Mail is already registered!');
    } else {
        if($user->register($name, $username, $email, $hpass, $token)){ // Pasar el token como argumento
            echo 'register';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Something went wrong! try again later!');
        }
    }
}

// Handle Login Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'login'){
    $email = $user->test_input($_POST['email']);
    $password = $user->test_input($_POST['password']);

    $loggedInUser = $user->login($email);

    if($loggedInUser != null){
        if(password_verify($password, $loggedInUser['password'])){ 
            if(!empty($_POST['rem'])){
                setcookie("email", $email, time()+(30*24*60*60), '/');
                setcookie("password", $password, time()+(30*24*60*60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }

            echo 'login';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Password is incorrect!');
        }
    } else {
        echo $user->showMessage('danger', 'User not found!');
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
    // Obtener el correo electrónico del usuario desde la solicitud POST
    $email = $_POST['email'];

    // Generar un token (puedes utilizar alguna función para generar un token único)
    $token = generateToken(); // Esta función debe ser definida por ti

    // Crear una instancia del objeto Auth
    $auth = new Auth();

    // Intentar actualizar los campos token y token_expire en la base de datos
    $result = $auth->forgot_password($token, $email);

    // Verificar si la actualización fue exitosa
    if($result) {
        // Si la actualización fue exitosa, devolver un mensaje de éxito
        echo json_encode(array('success' => true, 'message' => 'Password reset instructions sent to your email.'));
    } else {
        // Si la actualización falló, devolver un mensaje de error
        echo json_encode(array('success' => false, 'message' => 'Error resetting password.'));
    }
}


// Función para generar un token aleatorio
function generateToken($length = 32) {
    // Caracteres permitidos en el token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $token = '';
    // Generar el token aleatorio
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }
    return $token;
}






?>
