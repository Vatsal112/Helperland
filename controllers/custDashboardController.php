<?php

require 'phpmailer/mail.php';
class custDashboardController
{
    function __construct()
    {
        include 'models/custDashboardModel.php';
        $this->model = new custDashboardModel();
        $this->Err = '';
    }

    function newServices()
    {
        $services = $this->model->getNewServices('servicerequest', $_SESSION['userId']);
        return $services;
    }

    function getAddress($services)
    {
        $address = $this->model->getAddress('servicerequestaddress', $services);
        return $address;
    }

    function getExtraServices($services)
    {
        $extra = $this->model->getExtraServices('servicerequestextra', $services);
        return $extra;
    }

    function getDashboardData()
    {
        $services = $this->model->getDashboardData('servicerequest', $_POST['sId']);
        $address = $this->getAddress($services['ServiceRequestId']);
        $extra = $this->getExtraServices($services['ServiceRequestId']);

        $datetime = new DateTime($services['ServiceStartDate']);
        $sDate = $datetime->format('Y-m-d');
        $sTime = $datetime->format('H:i');
        $sHours = $services['ServiceHours'];
        $time = (strtotime($sTime) + (60 * 60 * $sHours));
        $endtime = date('H:i', $time);

        

        if($extra){
            $data =[
                "date" =>$sDate,
                "startTime"=>$sTime,
                "endTime"=>$endtime,
                "AddressLine1"=>$address['AddressLine1'],
                "City"=>$address['City'],
                "State"=>$address['State'],
                "PostalCode"=>$address['PostalCode'],
                "Mobile"=>$address['Mobile'],
                "Email"=>$address['Email'],
                "ServiceExtraId"=>$extra['ServiceExtraId']
            ];
        }else{
            $data =[
                "date" =>$sDate,
                "startTime"=>$sTime,
                "endTime"=>$endtime,
                "AddressLine1"=>$address['AddressLine1'],
                "City"=>$address['City'],
                "State"=>$address['State'],
                "PostalCode"=>$address['PostalCode'],
                "Mobile"=>$address['Mobile'],
                "Email"=>$address['Email'],
            ];
        }
        $service= array_merge($services,$data);


        echo json_encode($service);
    }
}
