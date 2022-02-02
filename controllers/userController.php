<?php
require 'phpmailer/mail.php';

class userController
{
    function __construct()
    {

        include 'models/userModel.php';
        $this->model = new userModel();
        $this->Err = array();
    }

    function submit_contactForm()
    {
        if (isset($_POST['submit'])) {
            $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=contact&status=1';

            $array = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'subject' => $_POST['subject-select'],
                'message' => $_POST['msg-area'],
                'createdOn' => date('Y-m-d H:i:s'),
            ];
            $this->validateName($array['firstname'], $array['lastname']);
            $this->validatePhone($array['phone']);
            $this->validateContactMessage($array['message']);

            if (sizeof($this->Err) > 0) {
                header('Location:' . $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=contact&message=' . implode(",", $this->Err));
            } else {
                $ins = $this->model->insert_Contactus('contactus', $array);
                header('Location: ' . $arr['base_url']);
                return $ins;
            }
        } else {
            echo 'error occured!! try again';
        }
    }

    function validateName($fname, $lname)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $fname) && !preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $Err =  "Only letters and white space allowed in name field.<br>";
            array_push($this->Err, $Err);
        }
    }
    function validatePhone($array)
    {
        if (!preg_match('/^[0-9]{10}+$/', $array)) {
            $Err = "phone number size must be 10.<br>";
            array_push($this->Err, $Err);
        }
    }
    function validateContactMessage($array)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $array)) {
            $Err =  "Only letters and white space allowed in Message field.<br>";
            array_push($this->Err, $Err);
        }
    }

    function register_Customer()
    {
        if (isset($_POST) && isset($_POST['reg-check'])) {
            $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=CustomerReg&status=1';
            $array = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'password' => $_POST['pass'],
                'userTypeId' => '1',
                'workWithPets' => '0',
                'createdDate' => date('Y-m-d H:i:s'),
                'modifiedDate' => date('Y-m-d H:i:s'),
                'modifiedBy' => '0',
                'isApproved' => '0',
                'isActive' => '1',
                'isDeleted' => '0',
                'status' => '0',
            ];

            $result = $this->model->checkMail('user', $array['email']);

            if ($result > 0) {
                $Err =  "Email Id Already Exist! Choose Another Email.<br>";
                array_push($this->Err, $Err);
            }
            $this->validateName($array['firstname'], $array['lastname']);
            $this->validatePhone($array['phone']);

            $pass = $this->checkPasswordStrength($array['password']);
            $array['password'] = $pass;

            if (sizeof($this->Err) > 0) {
                header('Location:' . $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=customerReg&message=' . implode(",", $this->Err));
            } else {

                $ins = $this->model->insert_Customer('user', $array);
                $enc_id = password_hash($ins, PASSWORD_DEFAULT);
                $body = "<p>Click on link to activate your account: <a href ='http://localhost/helperland/?controller=user&function=verifyAccount&id=$ins'>http://localhost/helperland/?controller=user&function=verifyAccount&id=$enc_id</a></p>";
                sendmail($array['email'], 'Account Activation', $body, '');
                header('Location: ' . $arr['base_url']);
                return $ins;
            }
        } else {
            echo "error occurred! try again..";
        }
    }

    function validatePassword($pass, $c_pass)
    {

        if ($pass == $c_pass) {
            return true;
        } else {
            $Err =  "Password does not matched.<br>";
            array_push($this->Err, $Err);
        }
    }

    function verifyAccount()
    {
        $arr['base_url'] = 'http://localhost/Helperland';
        $id = $_GET['id'];

        $this->model->activateAccount('user', $id);

        header('Location:' . $arr['base_url']);
    }

    function spRegister()
    {
        if (isset($_POST) && isset($_POST['newsletter']) && isset($_POST['terms'])) {
            if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=spReg&status=1';
                $array = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'password' => $_POST['pass'],
                    'userTypeId' => '2',
                    'workWithPets' => '0',
                    'createdDate' => date('Y-m-d H:i:s'),
                    'modifiedDate' => date('Y-m-d H:i:s'),
                    'modifiedBy' => '0',
                    'isApproved' => '0',
                    'isActive' => '1',
                    'isDeleted' => '0',
                    'status' => '0',
                ];

                $pass = $this->checkPasswordStrength($array['password']);
                $array['password'] = $pass;

                $this->validateName($array['firstname'], $array['lastname']);
                $this->validatePhone($array['phone']);

                $result = $this->model->checkMail('user', $array['email']);
                if ($result > 0) {
                    $Err =  "Email Id Already Exist! Choose Another Email.<br>";
                    array_push($this->Err, $Err);
                }

                if (sizeof($this->Err) > 0) {
                    header('Location:' . $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=spReg&message=' . implode(",", $this->Err));
                } else {

                    $ins = $this->model->insert_Sp('user', $array);
                    $enc_id = password_hash($ins, PASSWORD_DEFAULT);
                    $body = "<p>Click on link to activate your account: <a href ='http://localhost/helperland/?controller=user&function=verifyAccount&id=$ins'>http://localhost/helperland/?controller=user&function=verifyAccount&id=$enc_id</a></p>";
                    sendmail($array['email'], 'Account Activation', $body, '');
                    header('Location: ' . $arr['base_url']);
                    return $ins;
                }
            } else {
                echo "please check the i am not robot checkbox and continue";
            }
        } else {
            echo "error occured try again!!!";
        }
    }

    function checkPasswordStrength($password)
    {
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if ($password < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            $Err = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.<br>";
            array_push($this->Err, $Err);
        } else {
            $res = $this->validatePassword($password, $_POST['c-pass']);

            if ($res == true) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $password = $hash;
            }
        }
        return $password;
    }

    function userLogin()
    {
        if (isset($_POST) && isset($_POST['remember'])) {
            $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=index&status=1';
            $records = $this->model->checkIdPass($_POST['email']);

            $pass = password_verify($_POST['pass'], $records['Password']);

            if ($pass == 1 && $records['Status'] == 1) {
                header('Location: ' . $arr['base_url']);
            } else if ($pass == 1 && $records['Status'] == 0) {
                $Err =   "You have not confirmed your account yet. Please check you inbox and verify your id.";
                array_push($this->Err, $Err);
            } else {
                $Err =   "Email and Password are invalid";
                array_push($this->Err, $Err);
            }

            if (sizeof($this->Err) > 0) {
                header('Location:' . $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=index&message=' . implode(",", $this->Err));
            }
        } else {
            echo "error occurred!! try again..";
        }
    }

    function forgetPassword()
    {
        if (isset($_POST)) {
            $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=index&status=1';
            $records = $this->model->checkIdPass($_POST['email']);
            $id = $records['UserId'];
            if ($records > 0) {
                $body = "<p>Click on link to change your password: <a href ='http://localhost/helperland/?controller=home&function=changePassword&id=$id'>http://localhost/helperland/?controller=home&function=changePassword&id=$records[Password]</a></p>";
                sendmail($_POST['email'], 'Account Activation', $body, '');
                header('Location: ' . $arr['base_url']);
            } else {
                $Err = "Email is not exists";
                array_push($this->Err, $Err);
            }

            if (sizeof($this->Err) > 0) {
                header('Location:' . $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=index&message=' . implode(",", $this->Err));
            }
        } else {
            echo "error occurred!! try again..";
        }
    }
}
