<?php
session_start();
require 'assets/php/db.php'; // Asegúrate de incluir el archivo que maneja la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $name = trim($_POST['name']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $cpassword = trim($_POST['cpassword']);

        // Validar las entradas y la lógica de contraseñas
        if ($password === $cpassword) {
            // Hash de la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Consulta SQL para insertar el usuario con la fecha de creación
            $sql = "INSERT INTO users (name, username, email, password, created_at) VALUES (:name, :username, :email, :password, CURRENT_TIMESTAMP)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashed_password
            ]);

            if ($stmt) {
                // Redirigir o mostrar mensaje de éxito
                $_SESSION['success'] = "Registration successful!";
                header('Location: login.php');
                exit();
            } else {
                $_SESSION['error'] = "Something went wrong. Please try again.";
            }
        } else {
            $_SESSION['error'] = "Passwords do not match.";
        }
    }
}
?>
