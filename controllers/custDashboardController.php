<?php
require 'phpmailer/mail.php';

if(!isset($_SESSION)) { 
    session_start(); 
  }

class custDashboardController
{
    public $pendingServiceRequests;
    function __construct()
    {
        include 'models/custDashboardModel.php';
        include 'models/serviceModel.php';
        include 'models/userModel.php';

        $this->model = new custDashboardModel();
        $this->serviceObj = new serviceModel();
        $this->userModel = new userModel();
        $this->Err = '';
        $this->services = [];
        $this->pendingServiceRequests = [];
    }

    function getPendingServiceRequests()
    {
        $array = [];
        $response = [];

        $pendingServiceRequests = $this->model->getPendingServiceRequests($_SESSION['userId']);

        for ($i = 0; $i < sizeof($pendingServiceRequests); $i++) {
            $datetime = new DateTime($pendingServiceRequests[$i]['ServiceStartDate']);
            $array[$i]['StartDate'] = $datetime->format('Y-m-d');
            $array[$i]['StartTime'] = $datetime->format('H:i');
            $array[$i]['ServiceHours'] = $pendingServiceRequests[$i]['ServiceHours'];
            $time = (strtotime($array[$i]['StartTime']) + (60 * 60 * $array[$i]['ServiceHours']));
            $array[$i]['EndTime'] = date('H:i', $time);
            $array[$i]['Patment'] = $pendingServiceRequests[$i]['TotalCost'];
            $array[$i]['Comments'] = $pendingServiceRequests[$i]['Comments'];
            $array[$i]['Pets'] = $pendingServiceRequests[$i]['HasPets'];
            $array[$i]['SpData'] = $this->getServicerData($pendingServiceRequests[$i]['ServiceProviderId']);
            $response[$i] = array_merge($pendingServiceRequests[$i], $array[$i]);
        }
        echo json_encode($response);
    }

    function newServices()
    {
        $this->services = $this->model->getNewServices2('servicerequest', $_SESSION['userId']);
    }

    function newServices2()
    {
        $services = $this->model->getNewServices('servicerequest', $_SESSION['userId']);
        echo json_encode($services);
    }

    function getAddress($services)
    {
        $address = $this->model->getAddress('servicerequestaddress', $services);
        return $address;
        // echo json_encode($address);
    }

    function getExtraServices($services)
    {
        $extra = $this->model->getExtraServices('servicerequestextra', $services);
        return $extra;
        // echo json_encode($extra);
    }

    function getDashboardData()
    {
        $services = $this->model->getDashboardData('servicerequest', $_POST['sId']);
        $address = $this->getAddress($services['ServiceRequestId']);
        $extra = $this->getExtraServices($services['ServiceRequestId']);
        $spData = $this->model->getServicerData('user',$services['ServiceProviderId']);

        $datetime = new DateTime($services['ServiceStartDate']);
        $sDate = $datetime->format('Y-m-d');
        $sTime = $datetime->format('H:i');
        $sHours = $services['ServiceHours'];
        $time = (strtotime($sTime) + (60 * 60 * $sHours));
        $endtime = date('H:i', $time);
        
        if($services['ServiceProviderId']==null){
            if ($extra) {
                $data = [
                    'date' => $sDate,
                    'startTime' => $sTime,
                    'endTime' => $endtime,
                    'AddressLine1' => $address['AddressLine1'],
                    'City' => $address['City'],
                    'State' => $address['State'],
                    'PostalCode' => $address['PostalCode'],
                    'Mobile' => $address['Mobile'],
                    'Email' => $address['Email'],
                    'ServiceExtraId' => $extra['ServiceExtraId']
                ];
            } else {
                $data = [
                    'date' => $sDate,
                    'startTime' => $sTime,
                    'endTime' => $endtime,
                    'AddressLine1' => $address['AddressLine1'],
                    'City' => $address['City'],
                    'State' => $address['State'],
                    'PostalCode' => $address['PostalCode'],
                    'Mobile' => $address['Mobile'],
                    'Email' => $address['Email'],
                ];
            }
        }else{
            if ($extra) {
                $data = [
                    'date' => $sDate,
                    'startTime' => $sTime,
                    'endTime' => $endtime,
                    'AddressLine1' => $address['AddressLine1'],
                    'City' => $address['City'],
                    'State' => $address['State'],
                    'PostalCode' => $address['PostalCode'],
                    'Mobile' => $address['Mobile'],
                    'Email' => $address['Email'],
                    'Spname'=>$spData['FirstName']." ".$spData['LastName'],
                    'ServiceExtraId' => $extra['ServiceExtraId']
                ];
            } else {
                $data = [
                    'date' => $sDate,
                    'startTime' => $sTime,
                    'endTime' => $endtime,
                    'AddressLine1' => $address['AddressLine1'],
                    'City' => $address['City'],
                    'State' => $address['State'],
                    'PostalCode' => $address['PostalCode'],
                    'Mobile' => $address['Mobile'],
                    'Spname'=>$spData['FirstName']." ".$spData['LastName'],
                    'Email' => $address['Email'],
                ];
            }
        }
        
        $service = array_merge($services, $data);

        echo json_encode($service);
    }

    function getServicerData($spId)
    {
        $data = $this->model->getServicerData('user', $spId);
        return $data;
    }

    function getServiceHistoryData()
    {
        $array = [];
        $response = [];
        $response2 = [];
        $sData = [];
        $setItemCount = $_POST['serviceHistoryRowsPerPage'];
        $itemCount = $this->services;
        $page = $_POST['pageno'] ?? 0;
        $itemCount = $this->model->getRemainingServices('servicerequest', $_SESSION['userId'], $setItemCount, $_POST['serviceHistoryLastRecordIndex'],$_POST['serviceHistoryIsNext']);

        $data = [];
        $data['total_count_service_history'] = (int)$this->model->getServiceHistoryTotalCount('servicerequest', $_SESSION['userId']);
        $data['set_count_service_history'] = $setItemCount;
        $data['current_page_item_count_service_history'] = sizeOf($itemCount);
        $sData = $itemCount;
        $data['current_page_service_history'] = (int) $page;

        for ($i = 0; $i < sizeof($sData); $i++) {
            $datetime = new DateTime($sData[$i]['ServiceStartDate']);
            $array[$i]['StartDate'] = $datetime->format('Y-m-d');
            $array[$i]['StartTime'] = $datetime->format('H:i');
            $array[$i]['ServiceHours'] = $sData[$i]['ServiceHours'];
            $time = (strtotime($array[$i]['StartTime']) + (60 * 60 * $array[$i]['ServiceHours']));
            $array[$i]['EndTime'] = date('H:i', $time);
            $array[$i]['Patment'] = $sData[$i]['TotalCost'];
            $array[$i]['Comments'] = $sData[$i]['Comments'];
            $array[$i]['Pets'] = $sData[$i]['HasPets'];
            $array[$i]['SpData'] = $this->getServicerData($sData[$i]['ServiceProviderId']);
            $array[$i]['SpRatings'] = $this->model->getRatings('rating',$sData[$i]['ServiceRequestId']);
            $response[$i] = array_merge($sData[$i], $array[$i]);
        }

        $response2 = array_merge($response, $data);
        echo json_encode($response2);
    }

    function mergeDateTimeInFormat($date, $time)
    {
        $newDate = $date;
        $cleaningStartTime = $time;
        $date = new DateTime($newDate);
        $date->setTime(floor($cleaningStartTime), floor($cleaningStartTime) == $cleaningStartTime ? "00" : (("0." . substr($cleaningStartTime, 2) * 60) * 100));
        $newDate = $date->format('Y-m-d H:i:s');
        return $newDate;
    }

    function startTimeEndTimeFrmtFromDate($date, $hours)
    {
        $datetime = new DateTime($date);
        $s['serviceDate'] = $datetime->format('Y-m-d');
        $s['startTime'] = $datetime->format('H:i');
        $sHours = $hours;
        $time = (strtotime($s['startTime']) + (60 * 60 * $sHours));
        $s['endTime'] = date('H:i', $time);
        return $s;
    }

    function rescheduleService()
    {
        $emails = [];
        $sTimeEndTime = [];
        $oldStartTime = [];
        $oldEndTime = [];
        $date = $this->mergeDateTimeInFormat($_POST['newDate'], $_POST['newTime']);
        $service = $this->model->getDashboardData('servicerequest', $_POST['sId']);

        $currentSTime = $this->startTimeEndTimeFrmtFromDate($date, $service['ServiceHours']);

        $newStartTime = explode(":", $currentSTime['startTime']);
        $newStartTime = $newStartTime[0] + floor(($newStartTime[1] / 60) * 100) / 100;
        $newEndTime = explode(":", $currentSTime['endTime']);
        $newEndTime = $newEndTime[0] + floor(($newEndTime[1] / 60) * 100) / 100;

        if ($service['ServiceProviderId'] == null) {
      
            $serviceReschedule = $this->model->rescheduleService('servicerequest', $_SESSION['userId'], $date, $_POST['sId']);

            if ($serviceReschedule) {
                $body = "Service Request " . $_POST['sId'] . " has rescheduled by customer. New date and time are $date .";
                sendmail($emails, 'Reschedule Service', $body, '');
                echo json_encode("Success");
            }
        } else {
          
            $assignedS = $this->model->getSpAssignedServices('servicerequest', $service['ServiceProviderId'], $_POST['newDate']);
            $emailId = $this->model->getServicerData('user', $service['ServiceProviderId']);

            if($assignedS){
                for ($i = 0; $i < sizeof($assignedS); $i++) {
                    array_push($sTimeEndTime, $this->startTimeEndTimeFrmtFromDate($assignedS[$i]['ServiceStartDate'], $assignedS[$i]['ServiceHours']));
                }
    
                for ($i = 0; $i < sizeof($sTimeEndTime); $i++) {
                    $sTimeEndTime[$i]['startTime'] = explode(":", $sTimeEndTime[$i]['startTime']);
                    $sTimeEndTime[$i]['endTime'] = explode(":", $sTimeEndTime[$i]['endTime']);
                    $oldStartTime[$i] = $sTimeEndTime[$i]['startTime'][0] + floor(($sTimeEndTime[$i]['startTime'][1] / 60) * 100) / 100;
                    $oldEndTime[$i] = $sTimeEndTime[$i]['endTime'][0] + floor(($sTimeEndTime[$i]['endTime'][1] / 60) * 100) / 100;
                }
                $spData = $this->model->getServiceProviderDetails('user');
                foreach ($spData as $s) {
                    array_push($emails, $s['Email']);
                }

                for ($i = 0; $i < sizeof($oldStartTime); $i++) {
                   
                    if ($sTimeEndTime[$i]['serviceDate'] == $currentSTime['serviceDate']) {
    
                        if ($newEndTime < $oldStartTime[$i] || $oldEndTime[$i] < $newStartTime) {
                            $serviceReschedule = $this->model->rescheduleService('servicerequest', $_SESSION['userId'], $date, $_POST['sId']);
    
                            if ($serviceReschedule) {
                                $body = "service number " . $_POST['sId'] . " is rescheduled & assigned to you.";
                                sendmail([$emailId['Email']], 'Reschedule Service', $body, '');
                                echo json_encode("Success");
                            }
                        } else {
                            $this->Err .= "Another service request has been assigned to the service provider on " . $sTimeEndTime[$i]['serviceDate'] . " from " . $oldStartTime[$i] . " to " . $oldEndTime[$i] . ". Either choose another date or pick up a different time slot.";
                            echo json_encode($this->Err);
                        }
                    } else {
                        $serviceReschedule = $this->model->rescheduleService('servicerequest', $_SESSION['userId'], $date, $_POST['sId']);
                        if ($serviceReschedule) {
                            $body = "service number " . $_POST['sId'] . " is rescheduled";
                            sendmail([$emailId['Email']], 'Reschedule Service', $body, '');
                            echo json_encode("Success");
                        }
                    }
                }
            }else{
                $serviceReschedule = $this->model->rescheduleService('servicerequest', $_SESSION['userId'], $date, $_POST['sId']);
                if ($serviceReschedule) {
                    $body = "service number " . $_POST['sId'] . " is rescheduled";
                    sendmail([$emailId['Email']], 'Reschedule Service', $body, '');
                    echo json_encode("Success");
                }
            }      
        }
    }

    function cancelService(){
        $cancelReq = $this->model->cancelService('servicerequest',$_POST['sId'],$_POST['message']);
        if($cancelReq){
            echo json_encode("Success");
        }
    }

    function submitRating(){

        $serviceData = $this->model->getDashboardData('servicerequest',$_POST['sId']);
        $totalRating = $_POST['onTimeRating'] + $_POST['friendlyRating'] + $_POST['qualityRating'];

        $averageRating = $totalRating/3;

        date_default_timezone_set('Asia/Kolkata');
        $data = [
            "ServiceRequestId"=>$serviceData['ServiceRequestId'],
            "RatingFrom"=>$_SESSION['userId'],
            "RatingTo"=>$serviceData['ServiceProviderId'],
            "Ratings" => $averageRating,
            "Comments"=>$_POST['ratingMessage'],
            "RatingDate"=>date("Y-m-d H:i:s"),
            "OnTimeArrival"=>$_POST['onTimeRating'],
            "Friendly"=>$_POST['friendlyRating'],
            "QualityOfService"=>$_POST['qualityRating']
        ];

        $insertRating = $this->model->submitRating('rating',$data);

        if($insertRating){
            echo json_encode("Success");
        }else{
            echo json_encode("error");
        }

    }

    function loadCustomerData(){
        $customerData= $this->model->getServicerData('user',$_SESSION['userId']);
        return $customerData;
    }

    function customerMyDetails(){
        $data=$_POST['data'];

        $this->validateFields($data['Firstname'],$data['Lastname'],$data['Phone'],'','');

        if($this->Err==''){
            $update = $this->model->updateCustomerDetails('user',$_SESSION['userId'],$data);
            if($update){
                echo json_encode("Success");
            }
        }else{
            echo json_encode($this->Err);
        }  
    }

    function validateFields($fname, $lname, $phone,$sname,$hnum)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $fname) && !preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $this->Err = $this->Err .  "Only letters and white space allowed in name field" . "<br>";
        }
       
        if (!preg_match("/^[a-zA-Z ]*$/", $sname)) {
            $this->Err =  "Only letters and white space allowed in Street name field" . "<br>";
        }
        if (!preg_match('/^[0-9]{0,3}+$/', $hnum)) {
            $this->Err = "Only Numbers are allowed in house number field." . "<br>";
        }
        if (!preg_match('/^[0-9]{10}+$/', $phone)) {
            $this->Err = $this->Err  . "phone number size must be 10." . "<br>";
        }
    }

    function loadCustomerAddress(){
        $address = $this->model->loadCustomerAddress('useraddress',$_SESSION['userId']);
        return $address;
    }

    function updateAddress(){
        $address = $_POST['address'];
        $this->validateFields('','',$address['Phone'],$address['Street'],$address['HouseNo']);
        $addressLine = [
            'AddressLine1' => $address['Street'] . " " . $address['HouseNo'] . ", " . $address['City'] . " " . $address['Postalcode'],
            'City' => $address['City'],
            'PostalCode' => $address['Postalcode'],
            'Mobile' => $address['Phone'],
            'AddressId'=>$address['AddressId']
        ];

        $result = $this->serviceObj->validateZipCode('zipcode',$address['Postalcode']);

        if($this->Err == ''){
            if($result){
                $update = $this->model->updateAddress('useraddress',$addressLine);
                if($update){
                    echo json_encode("Success");
                }
            }else{
                $this->Err = $this->Err ."Invalid Zipcode."."<br>";
                echo json_encode($this->Err);
            }
        }else{
            echo json_encode($this->Err);
        }
    }

    function getCity(){
        $city = $this->model->getCity('city',$_POST['newCode']);
        echo json_encode($city);
    }

    function addNewAddress(){
        $address = $_POST['address'];
        $this->validateFields('','',$address['Phone'],$address['Street'],$address['HouseNo']);

        $addressLine = [
            'UserId' => $_SESSION['userId'],
            'AddressLine1' => $address['Street'] . " " . $address['HouseNo'] . ", " . $address['City'] . " " . $address['Postalcode'],
            'City' => $address['City'],
            'PostalCode' => $address['Postalcode'],
            'IsDefault' => 0,
            'IsDeleted' => 0,
            'Mobile' => $address['Phone'],
            'Email' => $_SESSION['userEmail']
        ];

        if ($this->Err == '') {
            $lastId = $this->serviceObj->newAddress('useraddress', $addressLine);

            $record = $this->serviceObj->getLastUserData('useraddress', $lastId);
            if ($record) {
                $data = array("Status"=>true,"Address"=>$record);
                echo json_encode($data);
            }
        } else {
            echo json_encode($this->Err);
        }
    }

    function deleteAddress(){
        $deleteAddr = $this->model->deleteAddress('useraddress',$_POST['addressId']);
        if($deleteAddr){
            echo json_encode("Success");
        }
    }

    function checkPasswordStrength($password)
    {
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if ($password < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            $this->Err = $this->Err . "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character." . "<br>";
        } else {
            $res = $this->validatePassword($password, $_POST['confirmPass']);

            if ($res == true) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $password = $hash;
            }
        }
        return $password;
    }


    function validatePassword($pass, $c_pass)
    {
        if ($pass == $c_pass) {
            return true;
        } else {
            $this->Err = $this->Err . "Password does not matched." . "<br>";
        }
    }

    function changePassword(){
        $record = $this->userModel->checkIdPass($_SESSION['userEmail']);

        $match = password_verify($_POST['oldPassword'],$record['Password']);
        $pass = $this->checkPasswordStrength($_POST['newPass']);
        $_POST['newPass'] = $pass;

        if($match == 1){
            if($this->Err == ''){
                $updatePass = $this->userModel->updatePassword('user',$_POST['newPass'],$_SESSION['userId']);
                if($updatePass){
                    echo json_encode("Success");
                }
            }else{  
                echo json_encode($this->Err);
            }
        }else{
            $this->Err .= "Please Enter correct old password."."<br>";
            echo json_encode($this->Err);
        }
    }

    function getFavSp(){
      
        $result = $this->model->getFavSpRatings($_SESSION['userId']);

        echo json_encode( $result);

    }

    // function getFavSpRatings(){
       
    //     echo json_encode( $ratings);
    // }
    // function getTotalCleanings(){
       
    //     echo json_encode( $totalCleaning);
    // }

    function removeFromFav(){
        $remove = $this->model->removeFromFav('favoriteandblocked',$_SESSION['userId']);
        if($remove){
            echo json_encode("Success");
        }
    }

    function addFavSp(){
        $add = $this->model->addFavSp('favoriteandblocked',$_SESSION['userId']);
        if($add){
            echo json_encode("Success");
        }
    }

    function blockSp(){
        $block = $this->model->blockSp('favoriteandblocked',$_SESSION['userId']);
        if($block){
            echo json_encode("Success");
        }
    }

    function unblockSp(){
        $unblock = $this->model->unblockSp('favoriteandblocked',$_SESSION['userId']);
        if($unblock){
            echo json_encode("Success");
        }
    }
}
