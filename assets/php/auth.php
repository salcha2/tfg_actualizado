<?php

require_once 'config.php';


class Auth extends Database{

    public function register($name, $username, $email, $password){
        $sql = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'username'=>$username, 'email'=>$email, 'pass'=>$password]);
        return true;
    }

    //Check if user already registered
    public function user_exist($email){
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=> $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //Login Existing User
    public function login($email){
        $sql= "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    //Current User In Session
    public function currentUser($email){
        $sql = "SELECT * FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute(['email'=> $email]);
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    //Forgot Password

    public function forgot_password($token, $email){
        $sql = "UPDATE users SET token = :token, token_expire = CURRENT_TIMESTAMP + INTERVAL '10 MINUTE' WHERE email = :email";
        
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute(['token' => $token, 'email' => $email])) {
            return true; // Si la consulta se ejecuta con éxito, devuelve verdadero
        } else {
            return false; // Si hay algún error en la ejecución de la consulta, devuelve falso
        }
    }


     // Método para obtener las credenciales de correo electrónico de un usuario
     public function getUserEmailCredentials($email) {
        $sql = "SELECT email_smtp_username, email_smtp_password FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    // Add new note

    public function add_new_note($usuario, $nombre, $descripcion){
        $sql = "INSERT INTO datos4 (usuario, nombre, descripcion) VALUES (:usuario, :nombre, :descripcion)";
    
        $stmt = $this->conn->prepare($sql);
    
        // Imprimir los valores que se pasarán a la consulta SQL
        echo "Usuario: $usuario<br>";
        echo "Nombre: $nombre<br>";
        echo "Descripción: $descripcion<br>";
    
        $stmt->execute(['usuario' => $usuario, 'nombre'=> $nombre , 'descripcion' => $descripcion]);
    
        // Verificar si hay errores durante la ejecución de la consulta
        $errorInfo = $stmt->errorInfo();
        if ($errorInfo[0] !== '00000') {
            // Si hay errores, imprimir el mensaje de error
            echo "Error al ejecutar la consulta: " . $errorInfo[2];
            return false;
        }
    
        return true;
    }
    



    
    
    
    
    


}



?>