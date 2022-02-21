<?php

require 'phpmailer/mail.php';
class custDashboardController{
    function __construct()
    {
        include 'models/custDashboardModel.php';
        $this->model = new custDashboardModel();
        $this->Err = '';
    }

    function newServices(){
        $services = $this->model->getNewServices('servicerequest',$_SESSION['userId']);

        return $services;
    }

}