<?php

//linked files
require_once 'dbConnect.php';

// Check connection
if (!$conn) {  die("Connection failed: " . mysqli_connect_error()); }


    $w2 = "WHERE INJ_legit = '1'";
    $w3 = "WHERE DUR_legit = '1'";
    $w4 = "WHERE CAU_legit = '1'";
    $w5 = "WHERE BYL_legit = '1'";
    $w7 = "WHERE CTH_legit = '1'";
        

//C2: INJURY

$sql = "SELECT INJ_id
        FROM INJ
        $w2";

$result = mysqli_query($conn,$sql);


if($result){
    
    if($result->num_rows != 0){
        
        $maxNum = $result->num_rows;

        //echo "Max1=" . $maxNum;
        
        $selectedRow= mt_rand (1,$maxNum);
        
        //echo "Sel=" . $selectedRow;
        $i = 1;

        while($row = $result->fetch_assoc()){

            if ($i == $selectedRow){
                $c2 = $row["INJ_id"];
                break;
            }

            $i++;
        }   
    }
}  

//C3: DURATION

$sql = "SELECT DUR_id
FROM DUR
$w3";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;

        $selectedRow= mt_rand (1,$maxNum);

        $i = 1;

        while($row = $result->fetch_assoc()){

            if ($i == $selectedRow){
                $c3 = $row["DUR_id"];
                break;
            }

            $i++;
        }   
    }
}  

//C5: BY LINE

$sql = "SELECT BYL_id
FROM BYL
$w5";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;

        $selectedRow= mt_rand (1,$maxNum);

        $i = 1;

        while($row = $result->fetch_assoc()){

            if ($i == $selectedRow){
                $c5 = $row["BYL_id"];
                break;
            }

            $i++;
        }   
    }
}

//C7: TAG LINE

$sql = "SELECT CTH_id
FROM CTH
$w7";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;

        $selectedRow= mt_rand (1,$maxNum);

        $i = 1;

        while($row = $result->fetch_assoc()){

            if ($i == $selectedRow){
                $c7 = $row["CTH_id"];
                break;
            }

            $i++;
        }   
    }
}

//C8 Quote
$sql = "SELECT QTE_id
FROM QTE
WHERE QTE_id <> 0";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;
        
                $selectedRow= mt_rand (1,$maxNum);
        
                $i = 1;
        
                while($row = $result->fetch_assoc()){
        
                    if ($i == $selectedRow){
                        $c8 = $row["QTE_id"];
                        break;
                    }
        
                    $i++;
                }    
    }
} 

echo json_encode(array($c2, $c3, $c5, $c7, $c8));

?>