<?php


//linked files
require_once 'dbConnect.php';
require_once "../../PHPMailer/class.phpmailer.php";

// Check connection
if (!$conn) {  die("Connection failed: " . mysqli_connect_error()); }

$emailGoodCount = 0;
$emailBadCount = 0;
$emailFail = "";
$linkString = "";

if (isset($_POST['linkString'])){
    $linkString = $_POST['linkString'];
    $linkAnchor = "<a href='$linkString'>View Full Story on SportsInsider.Vegas</a>";
}

$c1 = $c2 = $c3 = $c7 = 0;

//pull all get variables
if (isset($_POST['c1'])){
    $c1 = $_POST['c1'];
}
if (isset($_POST['c2'])){
    $c2 = $_POST['c2'];
}
if (isset($_POST['c3'])){
    $c3 = $_POST['c3'];
}
if (isset($_POST['c7'])){
    $c7 = $_POST['c7'];
}

//Player
$sql = "SELECT ply_name
FROM ply
WHERE ply_id = '$c1'";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        while($row = $result->fetch_assoc()){

            $name = $row['ply_name'];

        }   
    }
}      

//INJURY
$sql = "SELECT inj_text1, inj_text2, inj_text3, inj_text4, inj_photo
FROM inj
WHERE inj_id = '$c2'";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        while($row = $result->fetch_assoc()){

            $inj = $row["inj_text4"];  
        }   
    }
}    

//Duration
$sql = "SELECT dur_text1
FROM dur
WHERE dur_id = '$c3'";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        while($row = $result->fetch_assoc()){

            $dur = $row["dur_text1"];
        }   
    }
}  

//Catch
$sql = "SELECT cth_line
FROM cth
WHERE cth_id = '$c7'";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        while($row = $result->fetch_assoc()){

            $cth = $row["cth_line"];
        }   
    }
}     

$headline = "<h2>$cth</h2><br><h3>$name ( $inj ) $dur</h3>";

$message = "<html><body><img src='cid:logo'><br>$headline<br><h3>$linkAnchor</h3></body></html>";

$plainMessage = "$cth  $name ( $inj ) $dur $linkAnchor";

$textSubject = "$cth  $name ( $inj ) $dur";

$textMessage = "$linkString";

if (isset($_POST['emailList'])){

    $emailArray = $_POST['emailList'];

    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
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
    
    $mail->Subject = $cth;
    $mail->Body    = $message;
    $mail->AltBody = $plainMessage;
    $mail->AddEmbeddedImage('../../media/vsiEmailLogo.png', 'logo', 'vsiEmailLogo.png');

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

if (isset($_POST['textList'])){
    
        $textArray = $_POST['textList'];
        $carrierArray = $_POST['carrierList'];
    
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
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
        
        $mail->Subject = $textSubject;
        $mail->Body    = $textMessage;
        $mail->AltBody = $textMessage;

        $arrlength = count($textArray);
        
        for($x = 0; $x < $arrlength; $x++) {
            $phoneNum = $textArray[$x];
            $gateWay = $carrierArray[$x];
            
            $fullTextAddress = $phoneNum . $gateWay;

            $mail->AddBCC($fullTextAddress);
        } 
    
        if(!$mail->Send())
        {
            echo $mail->ErrorInfo;
            return false;
        } 
        echo "Text Sent";
    }

?>
