<?php

class userController{
    function __construct(){
        include 'models/userModel.php';
        $this->model = new userModel();
    }

    function submit_contactForm(){
       // die (print_r( $_POST));
        $arr['base_url'] = 'http://localhost/helperland/?controller=home&function=about';
        //print_r($_POST);
        
        if(isset($_POST)){
           
            $arr = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
            ];
            print_r($arr);
            $ins = $this->model->insert('user',$arr);

            // if($ins){
            //     header('Location:'.$arr['base_url']);
            // }else{
            //     echo "erro";
            // }
        }else{
            echo 'error occured!! try again';
        }

    
    }
}