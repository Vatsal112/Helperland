<?php 
    require("PHPMailerAutoload.php");
    require('class.phpmailer.php');


    function sendmail($recipent, $subject, $body, $altbody=""){

        $mail = new PHPMailer;
        //$mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                     // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'vatsaldendpara001@gmail.com';                 // SMTP username
        $mail->Password = 'Vatsal@99980';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('vatsaldendpara001@gmail.com', 'Helperland');
        //       // Add a recipient
        $mail->addAddress($recipent);
    
        // $mail->addReplyTo(Config::SMTP_EMAIL);

        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altbody;
      
        //   foreach ($recipent as $user) {
        //     $mail->addAddress($user);
          
        //     try {
        //         $mail->send();
        //         echo "Message sent to: ({$user}) {$mail->ErrorInfo}\n";
        //         $mail->clearAddresses();
        //     } catch (Exception $e) {
        //         echo "Mailer Error ({$user}) {$mail->ErrorInfo}\n";
        //     }
        // }
 
        
          
        //   $mail->smtpClose();
        try {
            $mail->send();
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

    }

?>