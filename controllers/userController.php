<?php

class userController{
    function __construct(){
        include 'models/userModel.php';
        $this->model = new userModel();
    }

    function submit_contactForm(){
        $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=about';

        if(isset($_POST)){

            
            
            $array = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                // 'email' => $_POST['email'],
                // 'subject' =>$_POST['subject'],
                // 'msg' => $_POST['msg']
            ];

            print_r($array);

            $ins = $this->model->insert('user',$array);

            if($ins){
                header('Location:'.$arr['base_url']);
            }else{
                echo "erro";
            }
            
        
              
        }else{
            echo 'error occured!! try again';
        }

    
    }
}