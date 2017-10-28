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

if (isset($_POST['byLine_id'])){
    
    $byLine = $_POST['byLine_id'];
    
} else {

    $byLine = "1";
}

$sql = "SELECT BYL_author, BYL_photo, BYL_pos
        FROM BYL
        WHERE BYL_id = '$byLine'";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        while($row = $result->fetch_assoc()){

            $byl1 = $row["BYL_author"];
            $byl2 = $row["BYL_photo"];
            $byl3 = $row["BYL_pos"];
        }   
    }
}       

echo json_encode(array($byl1, $byl2, $byl3));

?>