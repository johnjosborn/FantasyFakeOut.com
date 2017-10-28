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

if (isset($_POST['player_id'])){
    
        $player = $_POST['player_id'];
    
} else {

    $player = "1";
}

$sql = "SELECT PLY_link, PLY_name, PLY_team, PLY_pos, PLY_sex, PLY_loc
        FROM PLY
        WHERE PLY_id = '$player'";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        while($row = $result->fetch_assoc()){

            $link = $row['PLY_link'];
            $name = $row['PLY_name'];
            $team = $row['PLY_team'];
            $sex = $row['PLY_sex'];
            $loc = $row['PLY_loc'];
            $pos = $row['PLY_pos'];
        }   
    }
}       

echo json_encode(array($link, $name, $team, $sex, $loc, $pos)); 

?>