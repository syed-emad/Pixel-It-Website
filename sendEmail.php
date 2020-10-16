<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require './vendor/autoload.php';
    //    require './vendor/phpmailer/phpmailer/src/Exception.php';
    //    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    //    require './vendor/phpmailer/phpmailer/src/SMTP.php';
        $mail = new PHPMailer();
        $mail->PluginDir = './vendor/phpmailer/phpmailer'; // relative path to the folder where PHPMailer's files are located
        $mail->IsSMTP();
        $mail->Port = 465;
        $mail->Host = 'mail.pixelit.pk'; // "ssl://smtp.gmail.com" didn't worked
        $mail->IsHTML(true); // if you are going to send HTML formatted emails
        $mail->Mailer = 'smtp';
        $mail->SMTPSecure = 'ssl';
        
        $mail->SMTPAuth = true;
        $mail->Username = "customercare@pixelit.pk";
        $mail->Password = "PIXELit@1998#";
        
        $mail->SingleTo = true; // if you want to send mail to the users individually so that no recipients can see that who has got the same email.
        
        // $mail->From = "salmanhanif133@gmail.com";
        // $mail->FromName = "doggy";
        
        $senderAdress = $_POST['email'];
        $sendName = $_POST['name'];
        $senderMessage = $_POST['message'];
        $senderSubject = $_POST['subject'];
        $mail->SetFrom("customercare@pixelit.pk");
        $mail->addAddress("customercare@pixelit.pk");
        
        $mail->Subject = $senderSubject;
        $mail->Body = "Hi from " . $sendName . ", " . $senderAdress . "<br /><br />" . $senderMessage;
        $mail->Send();
       
        if(!$mail->Send())
            echo "Message was not sent <br />PHP Mailer Error: " . $mail->ErrorInfo;
        else
            echo "<script> location.href='http://www.pixelit.pk/services.php' </script>"
            

      ?>