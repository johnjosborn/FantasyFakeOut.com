<?php

//linked files
require_once 'dbConnect.php';

// Check connection
if (!$conn) {  die("Connection failed: " . mysqli_connect_error()); }


    $w2 = "WHERE inj_legit = '1'";
    $w3 = "WHERE dur_legit = '1'";
    $w4 = "WHERE cau_legit = '1'";
    $w5 = "WHERE byl_legit = '1'";
    $w7 = "WHERE cth_legit = '1'";
        

//C2: INJURY

$sql = "SELECT inj_id
        FROM inj
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
                $c2 = $row["inj_id"];
                break;
            }

            $i++;
        }   
    }
}  

//C3: DURATION

$sql = "SELECT dur_id
FROM dur
$w3";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;

        $selectedRow= mt_rand (1,$maxNum);

        $i = 1;

        while($row = $result->fetch_assoc()){

            if ($i == $selectedRow){
                $c3 = $row["dur_id"];
                break;
            }

            $i++;
        }   
    }
}  

//C5: BY LINE

$sql = "SELECT byl_id
FROM byl
$w5";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;

        $selectedRow= mt_rand (1,$maxNum);

        $i = 1;

        while($row = $result->fetch_assoc()){

            if ($i == $selectedRow){
                $c5 = $row["byl_id"];
                break;
            }

            $i++;
        }   
    }
}

//C7: TAG LINE

$sql = "SELECT cth_id
FROM cth
$w7";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;

        $selectedRow= mt_rand (1,$maxNum);

        $i = 1;

        while($row = $result->fetch_assoc()){

            if ($i == $selectedRow){
                $c7 = $row["cth_id"];
                break;
            }

            $i++;
        }   
    }
}

//C8 Quote
$sql = "SELECT qte_id
FROM qte
WHERE qte_id <> 0";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $maxNum = $result->num_rows;
        
                $selectedRow= mt_rand (1,$maxNum);
        
                $i = 1;
        
                while($row = $result->fetch_assoc()){
        
                    if ($i == $selectedRow){
                        $c8 = $row["qte_id"];
                        break;
                    }
        
                    $i++;
                }    
    }
} 

echo json_encode(array($c2, $c3, $c5, $c7, $c8));

?>