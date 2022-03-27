<?php
session_start();
require 'phpmailer/mail.php';
class servicerDashboardController
{
    function __construct()
    {
        include 'models/servicerDashboardModel.php';
        include 'models/serviceModel.php';
        $this->model = new servicerDashboardModel();
        $this->serviceObj = new serviceModel();
        $this->Err = '';
    }

    function getNewServices()
    {
        $array = [];
        $response = [];

        $newService = $this->model->getNewServices('servicerequest');

        for ($i = 0; $i < sizeof($newService); $i++) {
            $datetime = new DateTime($newService[$i]['ServiceStartDate']);
            $array[$i]['StartDate'] = $datetime->format('Y-m-d');
            $array[$i]['StartTime'] = $datetime->format('H:i');
            $array[$i]['ServiceHours'] = $newService[$i]['ServiceHours'];
            $time = (strtotime($array[$i]['StartTime']) + (60 * 60 * $array[$i]['ServiceHours']));
            $array[$i]['EndTime'] = date('H:i', $time);
            $array[$i]['Patment'] = $newService[$i]['TotalCost'];
            $array[$i]['Comments'] = $newService[$i]['Comments'];
            $array[$i]['Pets'] = $newService[$i]['HasPets'];
            $array[$i]['custData'] =  $this->model->getUserData('user', $newService[$i]['UserId']);
            $array[$i]['custAddress'] = $this->model->getAddress('servicerequestaddress', $newService[$i]['ServiceRequestId']);
            $response[$i] = array_merge($newService[$i], $array[$i]);
        }
        echo json_encode($response);
    }
    function getUserData()
    {
        $services = $this->model->getDashboardData('servicerequest', $_POST['sId']);
        $address = $this->model->getAddress('servicerequestaddress', $services['ServiceRequestId']);
        $extra = $this->model->getExtraServices('servicerequestextra', $services['ServiceRequestId']);
        $userData = $this->model->getUserData('user', $services['UserId']);

        $datetime = new DateTime($services['ServiceStartDate']);
        $sDate = $datetime->format('Y-m-d');
        $sTime = $datetime->format('H:i');
        $sHours = $services['ServiceHours'];
        $time = (strtotime($sTime) + (60 * 60 * $sHours));
        $endtime = date('H:i', $time);

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
                'UserName' => $userData['FirstName'] . " " . $userData['LastName'],
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
                'UserName' => $userData['FirstName'] . " " . $userData['LastName'],
                'Email' => $address['Email'],
            ];
        }

        $service = array_merge($services, $data);

        echo json_encode($service);
    }

    function acceptServiceRequest()
    {
        $emails = [];
        $isAccepted = $this->model->getDashboardData('servicerequest', $_POST['sId']);
        $date = explode(" ",$isAccepted['ServiceStartDate']);
        $postalCode = $this->model->getAddress('servicerequestaddress', $isAccepted['ServiceRequestId']);
        $findSpByPostalCode = $this->model->findSpByPostalCode($postalCode['PostalCode']);
        $assignedS = $this->model->getSpAssignedServices('servicerequest', $_SESSION['userId'], $date[0], $isAccepted['ServiceRequestId']);
        $currentSTime = $this->startTimeEndTimeFrmtFromDate($isAccepted['ServiceId'],$isAccepted['ServiceStartDate'],$isAccepted['ServiceHours']);

        $newStartTime = explode(":", $currentSTime['startTime']);
        $newStartTime = $newStartTime[0] + floor(($newStartTime[1] / 60) * 100) / 100;
        $newEndTime = explode(":", $currentSTime['endTime']);
        $newEndTime = $newEndTime[0] + floor(($newEndTime[1] / 60) * 100) / 100;


        if ($isAccepted['RecordVersion'] == null && $isAccepted['Status'] == 1) {

            if (sizeof($assignedS) == 0) {
                $this->findSpByPostalCode($findSpByPostalCode,$_POST['sId'],$isAccepted);
            }else{
                for($i=0; $i<sizeof($assignedS); $i++){
                    $sTimeEndTime[$i] = $this->startTimeEndTimeFrmtFromDate($assignedS[$i]['ServiceId'],$assignedS[$i]['ServiceStartDate'],$assignedS[$i]['ServiceHours']);
                }
                for ($i = 0; $i < sizeof($sTimeEndTime); $i++) {
                    $sTimeEndTime[$i]['startTime'] = explode(":", $sTimeEndTime[$i]['startTime']);
                    $sTimeEndTime[$i]['endTime'] = explode(":", $sTimeEndTime[$i]['endTime']);
                    $oldStartTime[$i] = $sTimeEndTime[$i]['startTime'][0] + floor(($sTimeEndTime[$i]['startTime'][1] / 60) * 100) / 100;
                    $oldEndTime[$i] = $sTimeEndTime[$i]['endTime'][0] + floor(($sTimeEndTime[$i]['endTime'][1] / 60) * 100) / 100;
                }

                for($i=0; $i<sizeof($oldStartTime); $i++){
                    if($sTimeEndTime[$i]['serviceDate']==$currentSTime['serviceDate']){                 
                        if ($newEndTime < $oldStartTime[$i] || $oldEndTime[$i] < $newStartTime) {
                            $this->findSpByPostalCode($findSpByPostalCode,$_POST['sId'],$isAccepted);
                        }else{
                            $this->Err .= "Another service request ".$sTimeEndTime[$i]['serviceId']." has already been assigned which has time overlap with this service request. You can’t pick this one!";
                            echo json_encode($this->Err);
                        }
                    }else{

                        $this->findSpByPostalCode($findSpByPostalCode,$_POST['sId'],$isAccepted);
                    }
                }
            }
        } else {
            echo json_encode("This service request is no more available. It has been assigned to another provider.");
        }
    }

    function startTimeEndTimeFrmtFromDate($serviceId,$date, $hours)
    {
        $datetime = new DateTime($date);
        $s['serviceId'] = $serviceId;
        $s['serviceDate'] = $datetime->format('Y-m-d');
        $s['startTime'] = $datetime->format('H:i');
        $sHours = $hours;
        $time = (strtotime($s['startTime']) + (60 * 60 * $sHours));
        $s['endTime'] = date('H:i', $time);
        return $s;
    }

    function findSpByPostalCode($findSpByPostalCode,$sId,$isAccepted){
        $emails=[];
        if(sizeof($findSpByPostalCode)==0){
            $acceptService = $this->model->acceptServiceRequest('servicerequest', $sId, $_SESSION['userId']);
                $body = "this service request " . $isAccepted['ServiceId'] . " has already been accepted by someone and is no more available to you";
                sendmail([$_SESSION['userEmail']], "Service Request", $body, "");
                echo json_encode('Success');
        }
        else{
            foreach ($findSpByPostalCode as $sp) {
                if ($sp['UserId'] != $_SESSION['userId']) {
                    
                    $acceptService = $this->model->acceptServiceRequest('servicerequest', $sId, $_SESSION['userId']);
                    array_push($emails, $sp['Email']);
                    $body = "this service request " . $isAccepted['ServiceId'] . " has already been accepted by someone and is no more available to you";
                    sendmail($emails, "Service Request", $body, "");
                    echo json_encode('Success');
                }
            }
        }
    }

    function getUpcomingService(){
        $data = $this->model->getUpcomingService('servicerequest');
        $array = [];
        $response = [];

        for ($i = 0; $i < sizeof($data); $i++) {
            $datetime = new DateTime($data[$i]['ServiceStartDate']);
            $array[$i]['StartDate'] = $datetime->format('Y-m-d');
            $array[$i]['StartTime'] = $datetime->format('H:i');
            $array[$i]['ServiceHours'] = $data[$i]['ServiceHours'];
            $time = (strtotime($array[$i]['StartTime']) + (60 * 60 * $array[$i]['ServiceHours']));
            $array[$i]['EndTime'] = date('H:i', $time);
            $array[$i]['Patment'] = $data[$i]['TotalCost'];
            $array[$i]['Comments'] = $data[$i]['Comments'];
            $array[$i]['Pets'] = $data[$i]['HasPets'];
            $array[$i]['custData'] =  $this->model->getUserData('user', $data[$i]['UserId']);
            $array[$i]['custAddress'] = $this->model->getAddress('servicerequestaddress', $data[$i]['ServiceRequestId']);
            $response[$i] = array_merge($data[$i], $array[$i]);
        }
        echo json_encode($response);
    }

    function completeServiceRequest(){
        $completeReq = $this->model->completeServiceRequest('servicerequest',$_POST['sId']);
        $data= $this->model->getDashboardData('servicerequest',$_POST['sId']);
        $addToFav = $this->model->addToFav('favoriteandblocked',$data['UserId'],$_SESSION['userId']);
        if($completeReq && $addToFav){
            echo json_encode("Success");
        }
    }

    function cancelServiceRequest(){
        $cancelReq = $this->model->cancelServiceRequest('servicerequest',$_POST['sId']);

        if($cancelReq){
            echo json_encode("Success");
        }
    }
}
