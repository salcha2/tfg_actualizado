<?php require_once 'assets/php/auth.php';
// Obtener el ID del registro de la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si se proporcionó un ID válido
if ($id !== null) {
    // Incluir el archivo que contiene la clase o función get_note_details

    // Instanciar la clase o utilizar la función
    $cuser = new Auth(); // Reemplaza YourClass por el nombre de tu clase si es diferente
    $registro = $cuser->get_note_details($id);
    
    // Verificar si se encontraron detalles del registro
    if ($registro) {
        // Asignar los detalles a variables para mostrarlos en la página HTML
        $noteId = $registro['id'];
        $noteTitle = $registro['nombre'];
        $createdAt = $registro['created_at'];
        $updatedAt = $registro['updated_at'];
    } else {
        // Mostrar un mensaje de error o redirigir al usuario a otra página
        header('Location: pagina_de_error.php');
        exit; // Asegúrate de salir del script después de redirigir
    }
} else {
    // Si no se proporcionó un ID válido, puedes mostrar un mensaje de error o redirigir al usuario a otra página
    // Por ejemplo:
    header('Location: pagina_de_error.php');
    exit; // Asegúrate de salir del script después de redirigir
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Registro</title>
    <style>
        /* Estilos CSS para el diseño de la página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles del Registro</h1>
        <div class="details">
            <p><strong>ID:</strong> <span id="noteId"><?php echo $noteId; ?></span></p>
            <p><strong>Título:</strong> <span id="noteTitle"><?php echo $noteTitle; ?></span></p>
            <p><strong>Fecha de Creación:</strong> <span id="createdAt"><?php echo $createdAt; ?></span></p>
            <p><strong>Fecha de Actualización:</strong> <span id="updatedAt"><?php echo $updatedAt; ?></span></p>
        </div>
        <a href="javascript:history.back()" style="text-decoration: none;">Volver atrás</a>
    </div>
</body>
</html>
