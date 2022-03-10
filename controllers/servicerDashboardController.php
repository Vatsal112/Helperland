<?php
session_start();
require 'phpmailer/mail.php';
class servicerDashboardController
{
    function __construct()
    {
        include 'models/servicerDashboardModel.php';
        include 'models/serviceModel.php';
        include 'models/custDashboardModel.php';

        $this->model = new servicerDashboardModel();
        $this->serviceObj = new serviceModel();
        $this->custDashModel = new custDashboardModel();
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
        $postalCode = $this->model->getAddress('servicerequestaddress', $isAccepted['ServiceRequestId']);
        $findSpByPostalCode = $this->model->findSpByPostalCode($postalCode['PostalCode']);
        $assignedS = $this->model->getSpAssignedServices('servicerequest', $_SESSION['userId'], $isAccepted['ServiceStartDate'], $_POST['sId']);

        if ($isAccepted['RecordVersion'] == null && $isAccepted['Status'] == 1) {

            echo "<pre>";
            print_r($assignedS);
            echo $_SESSION['userId']." ".$isAccepted['ServiceStartDate']." ".$_POST['sId'];
            // if (sizeof($assignedS) == 0) {
            //     foreach ($findSpByPostalCode as $sp) {
            //         if ($sp['UserId'] != $_SESSION['userId']) {
            //             $acceptService = $this->model->acceptServiceRequest('servicerequest', $_POST['sId'], $_SESSION['userId']);
            //             array_push($emails, $sp['Email']);
            //             $body = "this service request " . $isAccepted['ServiceId'] . " has already been accepted by someone and is no more available to you";
            //             sendmail($emails, "Service Request", $body, "");
            //             echo json_encode('Success');
            //         }
            //     }
            // }else{
                
            // }
        } else {
            echo json_encode("This service request is no more available. It has been assigned to another provider.");
        }
    }
}
