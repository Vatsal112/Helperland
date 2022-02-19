<?php

session_start();
require 'phpmailer/mail.php';
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

            if ($result) {
                echo json_encode($result);
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
        if (!preg_match('/^[0-9]{0,3}+$/', $hnum)) {
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
                'UserId' => $_SESSION['userId'],
                'AddressLine1' => $data['streetName'] . " " . $data['houseNum'] . ", " . $data['city'] . " " . $data['postalCode'],
                'City' => $data['city'],
                'PostalCode' => $data['postalCode'],
                'IsDefault' => 0,
                'IsDeleted' => 0,
                'Mobile' => $data['phone']
            ];
            $this->validateFields($data['streetName'], $data['houseNum'], $data['phone']);

            if ($this->Err == '') {
                $lastId = $this->model->newAddress('useraddress', $address);

                $record = $this->model->getLastUserData('useraddress', $lastId);
                if ($record) {
                    echo json_encode($record);
                }
            } else {
                echo json_encode($this->Err);
            }
        }
    }

    function validateAddress()
    {
        if (isset($_POST)) {
            $addressData = $_POST['data'];

            $address = $this->model->getServiceRequestAddress('useraddress', $addressData['addressId']);

            $serviceReq = $this->model->getServiceAddress($address['UserId'], $addressData['date'], $address['AddressId']);
            if (count($serviceReq) > 0) {
                $this->Err = $this->Err . "Another service request has been logged for this address on this date. Please select a different date.";
                echo json_encode($this->Err);
            } else {
                echo json_encode('Success');
            }
        }
    }

    function submitServiceReq()
    {
        if (isset($_POST)) {
           
            $data = $_POST['serviceData'];

            $serviceId = mt_rand(1000, 9999);
          


            date_default_timezone_set("Asia/Calcutta");
            $startdate = $data['serviceDate'];
            $dateTime = date($startdate." ".'H:i:s');

            $serviceData = [
                "UserId" => $_SESSION['userId'],
                "ServiceId" => $serviceId,
                "ServiceStartDate" => $dateTime,
                "ZipCode" => $data['ZipcodeValue'],
                "ServiceHours" => $data['serviceHours'],
                "SubTotal" => substr($data['totalCost'], 1),
                "TotalCost" => substr($data['totalCost'], 1),
                "Comments" => $data['comments'],
                "PaymentDue" => 0,
                "HasPets" => $data['pets'],
                "Status" => 1,
                "CreatedDate" => $dateTime,
                "ModifiedDate" => $dateTime,
                "Distance" => 0
            ];

            $serviceAddressData = $data['address'];

            $lastId = $this->model->newServiceRequest('servicerequest', $serviceData);
            $address = $this->model->addServiceAddress('servicerequestaddress', $lastId, $serviceAddressData);
            $getReq = $this->model->getServiceRequest('servicerequest', $lastId);
            $sp = $this->model->getServiceProviderDetails('user');
             
             foreach($sp as $s){
                 $body = "Dear Service Provider : ".$s['FirstName']."<br>"."New service request is arrived for you if you want to proceed then click on this link.";
                 sendmail($s['Email'],'New Service',$body,'');
             }

            if (isset($data['extraService'])) {
                $extraService = implode("", $data['extraService']);
                $extraServiceData = [
                    "ServiceRequestId" => $lastId,
                    "ServiceExtraId" => $extraService
                ];
                $extraServiceReq = $this->model->extraServiceRequest('servicerequestextra', $extraServiceData);
            }

            echo json_encode($getReq);
        }
    }
}
