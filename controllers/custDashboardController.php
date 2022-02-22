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
        $address = $this->model->getAddress('servicerequestaddress',$services);
        return $address;
    }

    function getExtraServices($services){
        $extra = $this->model->getExtraServices('servicerequestextra',$services);
        return $extra;
    }
}
