<?php

class custDashboardModel{
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

    function getNewServices($table,$userId){
        $stmt=$this->conn->prepare("SELECT * FROM $table where UserId = ?");
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getAddress($table,$sId){
    
            $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceRequestId = ?");
            $stmt->execute([$sId]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
    }
    
    function getExtraServices($table,$sId){
      
            $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceRequestId = ?");
            $stmt->execute([$sId]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
    }

    function getDashboardData($table,$sId){
        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceId = ?");
        $stmt->execute([$sId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getServicerData($table,$spId){
        $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ?");
        $stmt->execute([$spId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}