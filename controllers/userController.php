<?php

class userController{
    function __construct(){
        include 'models/userModel.php';
        $this->model = new userModel();
    }

    function submit_contactForm(){
       
        $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=contact&status=1';
        
        if(isset($_POST)){
           
            $array = [
                'name' => $_POST['firstname'].' '.$_POST['lastname'],
                'email' => $_POST['email'],
                'phone'=>$_POST['phone'],
                'subject'=>$_POST['subject-select'],
                'message'=>$_POST['msg-area'],
                'createdOn'=>date('Y-m-d H:i:s'),
            ];

            $ins = $this->model->insert('contactus',$array);
           
            header('Location: '.$arr['base_url']);
           return $ins;
         
        }else{
            echo 'error occured!! try again';
        }

    
    }
}