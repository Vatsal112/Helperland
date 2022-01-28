<?php

class userModel{
    
    function __construct(){
        try{
        //  $this->conn = new PDO("mysql:host=localhost:3306;dbname=event_mgt","root","");
            $servername = "localhost:5050";
            $username = "root";
            $password = "";

            $this->conn = new PDO(
                "mysql:host=$servername; dbname=helperland",
                $username, $password
            );

    $this->conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
       }catch(PDOException $e){
                echo $e->getMessage();
       }
    }
    
    function insert($table,$array){
        $sql = "INSERT INTO $table(firstname, lastname) VALUES (:firstname,:lastname)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($array);
        // return $this->conn->lastInsertId();
    }
}