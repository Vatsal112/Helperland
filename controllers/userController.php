<?php
require 'phpmailer/mail.php';

class userController{
    function __construct(){
        
        include 'models/userModel.php';
        $this->model = new userModel();
        $this->Err=array();

    }

    function submit_contactForm(){
        if(isset($_POST['submit'])){
            $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=contact&status=1';
           
            $array = [
                'firstname' => $_POST['firstname'],
                'lastname'=>$_POST['lastname'],
                'email' => $_POST['email'],
                'phone'=>$_POST['phone'],
                'subject'=>$_POST['subject-select'],
                'message'=>$_POST['msg-area'],
                'createdOn'=>date('Y-m-d H:i:s'),
            ];
           $this->validateName($array['firstname'],$array['lastname']);
           $this->validatePhone($array['phone']);
           $this->validateContactMessage($array['message']);

           if(sizeof($this->Err)>0){
               header('Location:'. $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=contact&message='.implode(",",$this->Err));
           }else{
                $ins = $this->model->insert_Contactus('contactus',$array);
                header('Location: '.$arr['base_url']);
                return $ins;
           }
        }else{
            echo 'error occured!! try again';
        }
}

    function validateName($fname,$lname){
        if(!preg_match("/^[a-zA-Z ]*$/", $fname) && !preg_match("/^[a-zA-Z ]*$/", $lname) ){   
            $Err =  "Only letters and white space allowed in name field.<br>";  
            array_push($this->Err,$Err);
        }
    }
    function validatePhone($array){
        if(!preg_match('/^[0-9]{10}+$/',$array)){
            $Err = "phone number size must be 10.<br>"; 
            array_push($this->Err,$Err);
        }
    }
    function validateContactMessage($array){
        if(!preg_match("/^[a-zA-Z ]*$/", $array)){
            $Err =  "Only letters and white space allowed in Message field.<br>";    
            array_push($this->Err,$Err);
        }
    }

    function register_Customer(){
        if(isset($_POST) && isset($_POST['reg-check'])){
            $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=CustomerReg&status=1';
            $array = [
                'firstname' => $_POST['firstname'],
                'lastname'=>$_POST['lastname'],
                'email' => $_POST['email'],
                'phone'=>$_POST['phone'],
                'password'=> $_POST['pass'] ,
                'userTypeId'=>'1',
                'workWithPets'=>'0',
                'createdDate'=>date('Y-m-d H:i:s'),
                'modifiedDate'=>date('Y-m-d H:i:s'),
                'modifiedBy'=>'0',
                'isApproved'=>'0',
                'isActive'=>'1',
                'isDeleted'=>'0',
                'status'=>'0',
            ];
            

            $this->validateName($array['firstname'],$array['lastname']);
            $this->validatePhone($array['phone']);
         
            $number = preg_match('@[0-9]@', $array['password']);
            $uppercase = preg_match('@[A-Z]@', $array['password']);
            $lowercase = preg_match('@[a-z]@', $array['password']);
            $specialChars = preg_match('@[^\w]@', $array['password']);
           
            if($array['password'] < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                $Err = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.<br>";    
                array_push($this->Err,$Err);
              } else {    
                  $res = $this->validatePassword($array['password'],$_POST['c-pass']);

                  if($res==true){
                      $hash = password_hash($array['password'],PASSWORD_DEFAULT);
                      $array['password'] = $hash;
                  }
              }      

            if(sizeof($this->Err)>0){
                header('Location:'. $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=customerReg&message='.implode(",",$this->Err));
            }
            else{
                $body = "<p>Click on link to activation Link to activate your account<a href ='http://localhost/helperland/?controller=home&function=customerReg'>$hash</a></p>";
                 $ins = $this->model->insert_Customer('user',$array);
                 sendmail($array['email'],'Testing',$body,'');
                 header('Location: '.$arr['base_url']);
                 return $ins;
            }
        }else{
            echo "error occurred! try again..";
        }
    }

    function validatePassword($pass,$c_pass){
        
        if($pass==$c_pass){
            return true;
        }else{
            $Err =  "Password does not matched.<br>";    
            array_push($this->Err,$Err);
        }
    }

}