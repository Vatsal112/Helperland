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
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count;
    }
    function getUserData($table,$userId){
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE UserId = ?");
        $stmt->execute([$userId]);
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $record;
    }

    function newAddress($table,$address){
        $sql = "INSERT INTO $table (UserId,AddressLine1,City,PostalCode,IsDefault,IsDeleted,Mobile) values(:UserId,:AddressLine1,:City,:PostalCode,:IsDefault,:IsDeleted,:Mobile)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($address);
        return $this->conn->lastInsertId();
    }
    function getLastUserData($table,$id){
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE AddressId = ?");
        $stmt->execute([$id]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }

    function newServiceRequest($table,$data){
        $sql = "INSERT INTO $table (UserId,ServiceId,ServiceStartDate,ZipCode,ServiceHours,SubTotal,TotalCost,Comments,PaymentDue,HasPets,Status,CreatedDate,ModifiedDate,Distance) values(:UserId,:ServiceId,:ServiceStartDate,:ZipCode,:ServiceHours,:SubTotal,:TotalCost,:Comments,:PaymentDue,:HasPets,:Status,:CreatedDate,:ModifiedDate,:Distance)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }

    function getServiceRequest($table,$id){
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE ServiceRequestId = ?");
        $stmt->execute([$id]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }

    function getServiceAddress( $userId,$date,$addressId){
        $sql = "SELECT * FROM useraddress where AddressLine1 IN (SELECT SRA.AddressLine1 FROM `servicerequestaddress` SRA JOIN servicerequest SR ON SR.ServiceRequestId = SRA.ServiceRequestId WHERE SR.UserId = ? AND SR.ServiceStartDate LIKE ?) and AddressId = ?";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([$userId,'%'.$date.'%',$addressId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    function getServiceRequestAddress($table,$address){
        $stmt = $this->conn->prepare("SELECT AddressId, UserId FROM $table where AddressId = $address");
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }

    function extraServiceRequest($table,$data){
        $sql = "INSERT INTO $table (ServiceRequestId,ServiceExtraId) values (:ServiceRequestId,:ServiceExtraId)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }

    function addServiceAddress($table, $serviceRequestId,$addressId){
        $sql = "INSERT INTO $table (ServiceRequestId, AddressLine1, City, State, PostalCode, Mobile) SELECT $serviceRequestId, AddressLine1, City, State, PostalCode, Mobile FROM useraddress WHERE AddressId=$addressId";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $this->conn->lastInsertId(); 
    }
}