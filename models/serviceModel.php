<?php
class serviceModel{
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

    function validateZipCode($table,$zipCode){
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE ZipcodeValue = ?");
        $stmt->execute([$zipCode]);
        $count = $stmt->rowCount();
        return $count;
    }
    function getUserData($table,$userId){
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE UserId = ?");
        $stmt->execute([$userId]);
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $record;
    }
}