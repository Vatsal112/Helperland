<?php
session_start();
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
            $date = date('Y-m-d');

            if($data['serviceDate'] < $date){
                $this->Err = $this->Err ."not a valid date";
                echo json_encode($this->Err);
            }else{
                $userId = $_SESSION['userId'];
                $records=$this->model->getUserData('useraddress',$userId);

                if($records){
                    echo json_encode($records);
                }
            }
           
        }else{
            echo 'error occurred!! try again...';
        }
    }

    function userNewAddress(){
        $userId = $_SESSION['userId'];
        $records=$this->model->getUserData('useraddress',$userId);

        if($records){
            echo json_encode($records);
        }
    }
}
