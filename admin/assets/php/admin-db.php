<?php 
require_once 'config.php';

class Admin extends Database {
    // Admin Login
    public function admin_login($username, $password) {
        $sql = "SELECT username, password FROM admin WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


   //Fetch All Registered Users
public function fetchAllUsers($val){
    $sql = "SELECT * FROM users WHERE deleted != :val";
    $stmt = $this->conn->prepare($sql); 
    $stmt->execute(['val' => $val]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}



//Fetch Users Details by ID

 public function fetchUserDetailByID($id){
     $sql = "SELECT * FROM users WHERE id = :id AND deleted != 0";
     $stmt = $this -> conn -> prepare($sql);
     $stmt -> execute(['id' => $id]);

     $result = $stmt -> fetch(PDO::FETCH_ASSOC);

     return $result;
 }


 // Delete An User

 public function userAction($id, $val){
    $sql = "UPDATE users SET deleted = $val WHERE id= :id";

    $stmt = $this -> conn -> prepare($sql);

    $stmt -> execute(['id'=> $id]);

    return true;
 }

 //fetch All Notes With Users Details
public function fetchAllNotes(){
 $sql = "SELECT datos4.id, datos4.nombre, datos4.descripcion, datos4.created_at, datos4.updated_at, users.name, users.email FROM datos4 
 INNER JOIN users ON datos4.usuario = users.username";

 $stmt = $this-> conn -> prepare($sql);

 $stmt -> execute();

 $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);

 return $result;
}


//Fetch all users drom db

public function exportAllUsers(){
    $sql = "SELECT * FROM users";
    $stmt = $this -> conn -> prepare($sql);
    $stmt -> execute();

    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

}
?>