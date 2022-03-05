<?php

class custDashboardModel
{

    function __construct()
    {
        try {
            //  $this->conn = new PDO("mysql:host=localhost:3306;dbname=event_mgt","root","");
            $servername = "localhost:5050";
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

    function getNewServices($table, $userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ?");
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getNewServices2($table, $userId, $count, $lastRecordIndex = 0, $isNext)
    {
        if ($isNext == 0) {
            $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ? AND (Status=1 OR Status=2 OR Status=3) AND ServiceRequestId > $lastRecordIndex LIMIT $count");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ? AND (Status=1 OR Status=2 OR Status=3) AND ServiceRequestId < $lastRecordIndex LIMIT $count");
        }

        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getPendingServiceRequests($userId){
        $stmt = $this->conn->prepare("SELECT * FROM `servicerequest` where UserId = ? AND (Status=1 OR Status=2 OR Status=3)");
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getPendingServicesTotalCount($table, $userId)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(UserId = ?) AS 'count' FROM $table where (Status=1 OR Status=2 OR Status=3)
        ");
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($data[0]['count']);
    }

    function getServiceHistoryTotalCount($table, $userId)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(UserId = ?) AS 'count' FROM $table where (Status=4 OR Status=5 OR Status=6)
        ");
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($data[0]['count']);
    }


    function getRemainingServices($table, $userId, $count, $lastRecordIndex,$serviceHistoryIsNext)
    {
        if ($serviceHistoryIsNext == 0) {
            $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ? AND  (Status=4 OR Status=5 OR Status=6) AND ServiceRequestId > $lastRecordIndex LIMIT $count");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ? AND  (Status=4 OR Status=5 OR Status=6) AND ServiceRequestId < $lastRecordIndex LIMIT $count");
        }
        $stmt->execute([$userId]);
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
        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceId = ?");
        $stmt->execute([$sId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getServicerData($table, $spId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ?");
        $stmt->execute([$spId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getServiceProviderDetails($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table where UserTypeId = 2");
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $record;
    }
    function getSpAssignedServices($table, $spId, $date)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceProviderId = ? AND ServiceStartDate LIKE '%$date%'");
        $stmt->execute([$spId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function rescheduleService($table, $userId, $date, $sId)
    {
        $sql = "UPDATE $table SET ServiceStartDate = ?, ModifiedDate=?,ModifiedBy = ? WHERE ServiceId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$date, $date, $userId, $sId]);
        return true;
    }

    function cancelService($table, $sId, $message)
    {
        $sql = "UPDATE $table SET Status =4 , HasIssue = ? WHERE ServiceId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$message, $sId]);
        return true;
    }

    function submitRating($table,$data){
        $sql = "INSERT INTO $table (ServiceRequestId,RatingFrom,RatingTo,Ratings,Comments,RatingDate,OnTimeArrival,Friendly,QualityOfService) VALUES (:ServiceRequestId,:RatingFrom,:RatingTo,:Ratings,:Comments,:RatingDate,:OnTimeArrival,:Friendly,:QualityOfService)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }

    function getRatings($table,$sId){
        $stmt = $this->conn->prepare("SELECT * FROM $table where ServiceRequestId = ? ");
        $stmt->execute([$sId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function updateCustomerDetails($table,$userId,$data){
        $sql = "UPDATE $table SET FirstName = ?, LastName = ?, Mobile = ?, DateOfBirth = ?, LanguageId = ? WHERE UserId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$data['Firstname'],$data['Lastname'],$data['Phone'],$data['DOB'],$data['Language'],$userId]);
        return true;
    }

    function loadCustomerAddress($table,$sId){
        $stmt = $this->conn->prepare("SELECT * FROM $table where UserId = ? ");
        $stmt->execute([$sId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function updateAddress($table,$addressLine){
        $sql = "UPDATE $table SET AddressLine1 = ?, City = ?, PostalCode = ?, Mobile = ?  WHERE AddressId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$addressLine['AddressLine1'],$addressLine['City'],$addressLine['PostalCode'],$addressLine['Mobile'],$addressLine['AddressId']]);
        return true;
    }
    function getCity($table,$postalCode){
        $stmt = $this->conn->prepare("SELECT CityName FROM $table where Id in (SELECT zipcode.CityId FROM zipcode where zipcode.ZipcodeValue = ?) ");
        $stmt->execute([$postalCode]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function deleteAddress($table,$addressId){
        $stmt = $this->conn->prepare("UPDATE $table set IsDeleted=1 where AddressId = ? ");
        $stmt->execute([$addressId]);
        return true;
    }

    function getFavSp($userId){
        $stmt = $this->conn->prepare("SELECT * FROM user INNER JOIN favoriteandblocked ON favoriteandblocked.TargetUserId = user.UserId WHERE favoriteandblocked.UserId = ?");
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getFavSpRatings($userId){
        $stmt = $this->conn->prepare("SELECT * FROM servicerequest INNER JOIN rating ON rating.ServiceRequestId = servicerequest.ServiceRequestId where servicerequest.UserId = ?");
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function removeFromFav($table,$userId){
        $stmt = $this->conn->prepare("UPDATE $table set IsFavorite =0 where UserId = ? ");
        $stmt->execute([$userId]);
        return true;
    }
    function addFavSp($table,$userId){
        $stmt = $this->conn->prepare("UPDATE $table set IsFavorite =1 where UserId = ? ");
        $stmt->execute([$userId]);
        return true;
    }

    function blockSp($table,$userId){
        $stmt = $this->conn->prepare("UPDATE $table set IsBlocked =1 where UserId = ? ");
        $stmt->execute([$userId]);
        return true;
    }

    function unblockSp($table,$userId){
        $stmt = $this->conn->prepare("UPDATE $table set IsBlocked =0 where UserId = ? ");
        $stmt->execute([$userId]);
        return true;
    }
}
