<?php
    require_once 'session.php';

    // Handle Add New Note Ajax Request 
    if(isset($_POST['action']) && $_POST['action'] == 'add_note'){
        // Imprimir los datos recibidos para depuración
        var_dump($_POST);

        $nombre = $cuser->test_input($_POST['title']); // Obtener el valor del campo 'title'
        $descripcion = $cuser->test_input($_POST['note']); // Obtener el valor del campo 'note'

        // Imprimir los datos obtenidos para depuración
        echo "Nombre: $nombre<br>Descripción: $descripcion<br>";

        $cuser->add_new_note($users, $nombre, $descripcion);
    }
?>
