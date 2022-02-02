<?php
class homeController {
    function index(){
        
        include 'common.php';
        include 'views/index.php';
    }
    function about(){
        $title='About';
        include 'common.php';
        include 'views/header.php';
        include 'views/popup-modal/login-modal.php';
        include 'views/about.php';
    }
    function faq(){
        $title='Faq';
        include 'common.php';
        include 'views/header.php';
        include 'views/popup-modal/login-modal.php';
        include 'views/faq.php';
    }
    function contact(){
        $title='Contact';
        include 'common.php';
        include 'views/header.php';
        include 'views/popup-modal/login-modal.php';
        include 'views/contact.php';
    }
    function prices(){
        $title='Prices';
        include 'common.php';
        include 'views/header.php';
        include 'views/prices.php';
    }

    function customerReg(){
        include 'common.php';
        include 'views/Registration/customer-reg.php';
        include 'views/footer.php';
    }

    function spReg(){
        include 'common.php';
        include 'views/Registration/sp-reg.php';
    }
    
}