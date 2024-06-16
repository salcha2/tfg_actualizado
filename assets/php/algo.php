<?php
require_once 'session.php';
require_once 'auth.php'; // Asumiendo que 'auth.php' contiene la clase `Auth`

$users = new Auth(); // Crear una instancia de la clase Auth


// Handle ajax request for profile update
if(isset($_FILES['image'])) {
    // Verificar que al menos uno de los campos (excepto la imagen) esté presente
    if (!isset($_POST['name']) && !isset($_POST['gender']) && !isset($_POST['dob']) && !isset($_POST['phone'])) {
        echo "No fields to update.";
        exit;
    }

    $name = isset($_POST['name']) ? $cuser->test_input($_POST['name']) : null;
    $gender = isset($_POST['gender']) ? $cuser->test_input($_POST['gender']) : null;
    $dob = isset($_POST['dob']) ? $cuser->test_input($_POST['dob']) : null;
    $phone = isset($_POST['phone']) ? $cuser->test_input($_POST['phone']) : null;
    $oldImage = $_POST['oldimage'];
    $folder = 'uploads/';

    // Imprimir valores recibidos
    echo "Name: $name<br>";
    echo "Gender: $gender<br>";
    echo "DOB: $dob<br>";
    echo "Phone: $phone<br>";
    echo "Old Image: $oldImage<br>";

    // Verificar si el usuario existe en la base de datos
    $checkSql = "SELECT * FROM users WHERE id = :id";
    $checkStmt = $cuser->conn->prepare($checkSql);
    $checkStmt->execute(['id' => $cid]);
    $userData = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if (!$userData) {
        echo "User not found in the database.";
        exit;
    }

    // Mostrar datos actuales del usuario
    echo "Current Data in DB: <br>";
    echo "Name: " . $userData['name'] . "<br>";
    echo "Gender: " . $userData['gender'] . "<br>";
    echo "DOB: " . $userData['dob'] . "<br>";
    echo "Phone: " . $userData['phone'] . "<br>";
    echo "Photo: " . $userData['photo'] . "<br>";
    echo "Deleted: " . $userData['deleted'] . "<br>";

    if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
        // Si se proporciona una nueva imagen, procesarla
        $newImage = $folder . $_FILES['image']['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], $newImage)) {
            echo "New Image Path: $newImage<br>";

            if ($oldImage != null) {
                // Eliminar la imagen anterior si existe
                if (unlink($oldImage)) {
                    echo "Deleted Old Image: $oldImage<br>";
                } else {
                    echo "Failed to delete old image<br>";
                }
            }
        } else {
            echo "Error moving uploaded file<br>";
            exit;
        }
    } else {
        // Si no se proporciona una nueva imagen, mantener la imagen existente
        $newImage = $oldImage;
        echo "No new image uploaded<br>";
    }

    // Crear una instancia de la clase Auth
    $auth = new Auth();

    // Llamada a la función update_profile de la instancia de la clase Auth
    $result = $auth->update_profile($name, $gender, $dob, $phone, $newImage, $cid);

    // Verificar si la actualización del perfil fue exitosa e imprimir el resultado
    if ($result) {
        echo "Profile updated successfully<br>";
    } else {
        // Obtener el mensaje de error específico de la consulta SQL
        $errorInfo = $checkStmt->errorInfo();
        echo "Failed to update profile<br>";
        echo "SQL Error: " . $errorInfo[2] . "<br>";
    }
} else {
    echo "Image file not received.<br>";
}


?>