<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require './vendor/autoload.php';
  print_r($_POST);
    //    require './vendor/phpmailer/phpmailer/src/Exception.php';
    //    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    //    require './vendor/phpmailer/phpmailer/src/SMTP.php';
        $mail = new PHPMailer();
        $mail->PluginDir = './vendor/phpmailer/phpmailer'; // relative path to the folder where PHPMailer's files are located
        $mail->IsSMTP();
        $mail->Port = 587;
        $mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
        $mail->IsHTML(true); // if you are going to send HTML formatted emails
        $mail->Mailer = 'smtp';
        $mail->SMTPSecure = 'tls';
        
        $mail->SMTPAuth = true;
        $mail->Username = "salmanhanif133@gmail.com";
        $mail->Password = "salmanhanif33";
        
        $mail->SingleTo = true; // if you want to send mail to the users individually so that no recipients can see that who has got the same email.
        
        // $mail->From = "salmanhanif133@gmail.com";
        // $mail->FromName = "doggy";
        
        $senderAdress = $_POST['email'];
        $sendName = $_POST['name'];
        $senderMessage = $_POST['message'];
        $senderSubject = $_POST['subject'];
        $mail->SetFrom($senderAdress);
        $mail->addAddress("salmanhanif133@gmail.com");
        
        $mail->Subject = $senderSubject;
        $mail->Body = "Hi from " . $sendName . ", " . $senderAdress . "<br /><br />" . $senderMessage;
        
        if(!$mail->Send())
            echo "Message was not sent <br />PHP Mailer Error: " . $mail->ErrorInfo;
        else
            echo "Message has been sent";
            echo "<script> location.href='http://localhost/pixelitwebsite/services.php'; </script>";
            

      ?>