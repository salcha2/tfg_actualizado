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
    
    
    
    
    


}



?>