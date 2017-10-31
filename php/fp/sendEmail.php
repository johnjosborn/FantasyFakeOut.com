<?php

    require_once "../../PHPMailer/class.phpmailer.php";
    
    $emailGoodCount = 0;
    $emailBadCount = 0;
    $emailFail = "";
    $linkString = "";

    if (isset($_POST['linkString'])){

        $linkString = $_POST['linkString'];

    }

    if (isset($_POST['emailList'])){

        $emailArray = $_POST['emailList'];

        foreach ($emailArray as $value) {
            if(sendMail($value, $linkString)){
                $emailGoodCount++;
            } else {
                $emailBadCount++;
                $emailFail .= "_" . $value;
            }
        }
    }

    if ($emailBadCount > 0){
        echo "Sent $emailGoodCount emails. Could not send to: $emailFail";     
    } else {
        echo "Sent $emailGoodCount emails.";
    }

    //get posted list


    function sendmail($email1, $linkString){

        $mail = new PHPMailer();
        
        $mail->IsSMTP();                                      // set mailer to use SMTP
        $mail->Host = "localhost";  // specify main and backup server
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Username = "newsdesk@sportsinsider.vegas";  // SMTP username
        $mail->Password = "s477Y2CElFrZ"; // SMTP password
        
        $mail->From = "newsdesk@sportsinsider.vegas";
        $mail->FromName = "Vegas Sports Insider";
        $mail->AddAddress($email1);
        //$mail->AddReplyTo("newsdesk@sportsinsider.vegas", "Vegas Sports Insider");
        
        //$mail->WordWrap = 50;                                 // set word wrap to 50 characters
        //$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
        //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
        $mail->IsHTML(true);                                    // set email format to HTML
        
        $mail->Subject = "Injury Alert";
        $mail->Body    = $linkString;
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
            echo $mail->ErrorInfo;
            return false;
        } 
        return true;
    }

?>
