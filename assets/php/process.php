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
?>
