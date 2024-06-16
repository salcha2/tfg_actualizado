<?php
require_once 'session.php';
require_once 'auth.php'; // Asumiendo que 'auth.php' contiene la clase `Auth`

$users = new Auth(); // Crear una instancia de la clase Auth

// Handle Add New Note Ajax Request 
if (isset($_POST['action']) && $_POST['action'] == 'add_note') {
    // Obtener los datos del formulario
    $nombre = $users->test_input($_POST['title']);
    $descripcion = $users->test_input($_POST['note']);

    // Obtener el nombre de usuario de la sesión
    session_start();
    $usuario = $_SESSION['usuario'];

    // Llamar a la función para agregar una nueva nota
    $users->add_new_note($usuario, $nombre, $descripcion);
}

// Handle Display Notes Ajax Request
if (isset($_POST['action']) && $_POST['action'] == 'display_notes') {
    // Iniciar la sesión
    session_start();

    // Verificar si el nombre de usuario está en la sesión
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario']; // Obtener el nombre de usuario de la sesión

        // Llamar a la función para obtener las notas del usuario actual
        $notes = $users->get_notes($usuario);

        // Preparar la respuesta
        $response = [
            'notes' => $notes // Array de notas del usuario
        ];

        // Enviar la respuesta al cliente
        echo json_encode($response);
    } else {
        // Si el nombre de usuario no está en la sesión, enviar una respuesta vacía
        echo json_encode(['notes' => []]);
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $row = $cuser -> edit_note($id);

    echo json_encode($row);
    
}



if (isset($_POST['action']) && $_POST['action'] == 'update_note') {
    // Depurar datos recibidos
    print_r($_POST); 

    // Verificación y sanitización de entradas
    if (!empty($_POST['note_id']) && !empty($_POST['edit_title']) && !empty($_POST['edit_note'])) {
        $id = $cuser->test_input($_POST['note_id']);
        $nombre = $cuser->test_input($_POST['edit_title']);
        $descripcion = $cuser->test_input($_POST['edit_note']);

        // Verificación de la existencia del ID en la base de datos
        if ($cuser->note_exists($id)) {
            // Intentar actualizar la nota
            $update_result = $cuser->update_note($id, $nombre, $descripcion);
            if ($update_result) {
                echo json_encode(["status" => "success", "message" => "Note updated successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to update note."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Note with specified ID does not exist."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
    }
}


//HAndle delete a note of an User ajax request


if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];
    print_r($_POST); // Para depuración, verifica que el ID se está recibiendo correctamente

    $cuser->delete_note($id);
}






//Handle Change Password Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'change_pass'){
    $currentPass = $_POST['curpass'];
    $newPass = $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];

    $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

    if($newPass != $cnewPass){
        echo $cuser->showMessage('danger', 'Passwords did not match!');
    }
    else{
        if(password_verify($currentPass, $cpass)){
            $cuser->change_password($hnewPass, $cid);
            echo $cuser->showMessage('success', 'Password Changed Successfully!');
        }
        else{
            echo $cuser->showMessage('danger', 'Current Password is Wrong!');
        }
    }
}





?>