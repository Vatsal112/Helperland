<?php
class servicerDashboardModel
{
    function __construct()
    {
        try {
            $servername = "localhost:3307";
            $username = "root";
            $password = "";

            $this->conn = new PDO(
                "mysql:host=$servername; dbname=helperland",
                $username,
                $password
            );

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getNewServices($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table where (Status=1)");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getAddress($table, $sId)
    {

        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceRequestId = ?");
        $stmt->execute([$sId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getExtraServices($table, $sId)
    {

        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceRequestId = ?");
        $stmt->execute([$sId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getDashboardData($table, $sId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceRequestId = ?");
        $stmt->execute([$sId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getUserData($table,$userId){
        
        $stmt = $this->conn->prepare("SELECT FirstName, LastName, Email FROM $table where UserId = ?");
        $stmt->execute([$userId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    function findSpByPostalCode($postalCode){
        $stmt = $this->conn->prepare("SELECT * FROM `user` INNER JOIN useraddress on user.UserId = useraddress.UserId where user.UserTypeId = 2 and useraddress.PostalCode = ?");
        $stmt->execute([$postalCode]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getSpAssignedServices($table,$date,$sId,$spId){
        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceProviderId = ? AND ServiceStartDate LIKE '%$date%' AND ServiceRequestId NOT IN ('$sId')");
        $stmt->execute([$spId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $data;
    }

    function acceptServiceRequest($table,$sId,$spId){
        $sql = "UPDATE $table SET RecordVersion = 1, Status=3, ServiceProviderId = ? where ServiceRequestId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$spId,$sId]);
        return true;
    }
}
