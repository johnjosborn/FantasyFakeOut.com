<?php

//linked files
require_once 'dbConnect.php';

// Check connection
if (!$conn) {  die("Connection failed: " . mysqli_connect_error()); }

if (isset($_POST['frame_no'])){
    
        $frameNum = $_POST['frame_no'];
    
} else {

    $frameNum = "1";
}

if (isset($_POST['injury_id'])){
    
    $injury = $_POST['injury_id'];
    
} else {

    $injury = "2";
}

$sql = "SELECT INJ_text1, INJ_text2, INJ_text3, INJ_text4, INJ_photo
        FROM INJ
        WHERE INJ_id = '$injury'";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        while($row = $result->fetch_assoc()){

            $inj1 = $row["INJ_text1"];
            $inj2 = $row["INJ_text2"];
            $inj3 = $row["INJ_text3"];
            $inj4 = $row["INJ_text4"];
            $inj5 = $row["INJ_photo"];
        }   
    }
}       

echo json_encode(array($inj1, $inj2, $inj3, $inj4, $inj5));

?>