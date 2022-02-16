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
    
    function insert_Contactus($table,$array){
        $sql = "INSERT INTO $table(FirstName,LastName,Email,Subject,PhoneNumber,Message,CreatedOn) VALUES (:firstname,:lastname,:email,:subject,:phone,:message,:createdOn)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($array);
        return $this->conn->lastInsertId();
    }
    function insert_Customer($table,$array){
        $sql = "INSERT INTO $table(FirstName,LastName,Email,Password,Mobile,UserTypeId,WorksWithPets,CreatedDate,ModifiedDate,ModifiedBy,IsApproved,IsActive,IsDeleted,Status) VALUES (:firstname,:lastname,:email,:password,:phone,:userTypeId,:workWithPets,:createdDate,:modifiedDate,:modifiedBy,:isApproved,:isActive,:isDeleted,:status)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($array);
        return $this->conn->lastInsertId();
    }
    function insert_Sp($table,$array){
        $sql = "INSERT INTO $table(FirstName,LastName,Email,Password,Mobile,UserTypeId,WorksWithPets,CreatedDate,ModifiedDate,ModifiedBy,IsApproved,IsActive,IsDeleted,Status) VALUES (:firstname,:lastname,:email,:password,:phone,:userTypeId,:workWithPets,:createdDate,:modifiedDate,:modifiedBy,:isApproved,:isActive,:isDeleted,:status)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($array);
        return $this->conn->lastInsertId();
    }

    function checkMail($table,$mail){
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE Email = ?");
        $stmt->execute([$mail]);
        $count = $stmt->rowCount();
        return $count;
    }

    function activateAccount($table,$id){
        $sql = "UPDATE $table SET Status = 1 WHERE UserId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    function checkIdPass($mail){
        $stmt= $this->conn->prepare("SELECT UserId,FirstName, Email,Password,Status FROM User WHERE Email = ?");
        $stmt->execute([$mail]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    function updatePassword($table,$pass,$id){ 
        $sql = "UPDATE $table SET Password = ? WHERE UserId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$pass,$id]);  
        return true;
    }
}