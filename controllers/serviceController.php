<?php

class serviceController
{
    function __construct()
    {
        include 'models/serviceModel.php';
        $this->model = new serviceModel();
        $this->Err = '';
    }

    function checkZipCode()
    {
        if (isset($_POST)) {
            $result = $this->model->validateZipCode('zipcode', $_POST['postalCode']);

            if ($result > 0) {
                echo json_encode('Success');
            } else {
                $this->Err = $this->Err . 'Zipcode not found';
                echo json_encode($this->Err);
            }
        } else {
            echo 'error occurred!! try again...';
        }
    }

    function checkScheduleTab()
    {
        if (isset($_POST)) {
            $data = $_POST['arr'];
            echo json_encode('Success');
        }else{
            echo 'error occurred!! try again...';
        }
    }
}
