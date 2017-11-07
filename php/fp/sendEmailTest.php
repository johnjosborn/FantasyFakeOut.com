<?php


//linked files
require_once 'dbConnect.php';
require_once "../../PHPMailer/class.phpmailer.php";

// Check connection
if (!$conn) {  die("Connection failed: " . mysqli_connect_error()); }

$output = "";

if (isset($_POST['textList'])){

    $textArray = $_POST['textList'];
    $carrierArray = $_POST['carrierList'];

    $arrlength = count($textArray);
    
    for($x = 0; $x < $arrlength; $x++) {
        $output .= "Phone: $textArray[$x] with carrier $carrierArray[$x]";
    }    
}

echo $output;

?>
