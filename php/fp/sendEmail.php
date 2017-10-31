<?php

require_once "../../PHPMailer/class.phpmailer.php";

$emailGoodCount = 0;
$emailBadCount = 0;
$emailFail = "";
$linkString = "";

if (isset($_POST['linkString'])){

    $linkString = $_POST['linkString'];
    $linkAnchor = "<a href='$linkString'>Breaking News</a>";

}

if (isset($_POST['emailList'])){

    $emailArray = $_POST['emailList'];

    $mail = new PHPMailer();
    $mail->SMTPDebug = 2;
    $mail->Timeout = 60;
    $mail->IsSMTP();   
    //$mail->Port = 465;                                   // set mailer to use SMTP
    $mail->Host = "localhost";  // specify main and backup server
    //$mail->Host = "secure211.inmotionhosting.com";
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "newsdesk@sportsinsider.vegas";  // SMTP username
    $mail->Password = "s477Y2CElFrZ"; // SMTP password
    
    $mail->From = "newsdesk@sportsinsider.vegas";
    $mail->FromName = "Vegas Sports Insider";

    $mail->AddAddress("newsdesk@sportsinsider.vegas");

    $mail->IsHTML(true);                                   
    
    $mail->Subject = "Injury Alert";
    $mail->Body    = $linkAnchor;
    $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

    foreach ($emailArray as $value) {
        $mail->AddBCC($value);
    }

    if(!$mail->Send())
    {
        echo $mail->ErrorInfo;
        return false;
    } 
    echo "Mail Sent";
}

?>
