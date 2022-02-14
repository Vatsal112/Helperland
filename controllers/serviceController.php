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

            if ($data['serviceDate'] < $date) {
                $this->Err = $this->Err . "not a valid date";
                echo json_encode($this->Err);
            } else {
                $userId = $_SESSION['userId'];
                $records = $this->model->getUserData('useraddress', $userId);

                if ($records) {
                    echo json_encode($records);
                }
            }
        } else {
            echo 'error occurred!! try again...';
        }
    }

    function getData()
    {
        $userId = $_SESSION['userId'];
        $records = $this->model->getUserData('useraddress', $userId);

        if ($records) {
            echo json_encode($records);
        }
    }

    function validateFields($sname, $hnum, $phone)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $sname)) {
            $this->Err =  "Only letters and white space allowed in Street name field" . "<br>";
        }
        if (!preg_match('/^[0-9]{5}+$/', $hnum)) {
            $this->Err = "Only Numbers are allowed in house number field." . "<br>";
        }
        if (!preg_match('/^[0-9]{10}+$/', $phone)) {
            $this->Err = $this->Err  . "phone number size must be 10." . "<br>";
        }
    }


    function addNewAddress()
    {
        if (isset($_POST)) {
            $data = $_POST['array'];

            $address = [
                'UserId'=>$_SESSION['userId'],
                'AddressLine1'=>$data['streetName'].", ".$data['houseNum']." ".$data['city']." ".$data['postalCode'],
                'City'=>$data['city'],
                'PostalCode'=>$data['postalCode'],
                'IsDefault'=>0,
                'IsDeleted'=>0,
                'Mobile'=>$data['phone']
            ];
            $this->validateFields($data['streetName'], $data['houseNum'], $data['phone']);

            if ($this->Err == '') {
                $lastId = $this->model->newAddress('useraddress',$address);
                // $userId = $_SESSION['userId'];
                $record = $this->model->getLastUserData('useraddress', $lastId);
                if ($record) {
                    echo json_encode($record);
                }
            } else {
                echo json_encode($this->Err);
            }
        }
    }
}
