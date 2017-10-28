<?php

if (isset($_POST['frame_no'])){

    $frameNum = $_POST['frame_no'];

} else {

    $frameNum = "2";
}

$frameNum = "2";

switch ($frameNum) {
    case '1':
        
    echo "<br><br>
    <div class='catch breaking'>[Select Tag Line]</div>
    <br>
    <div class='headline'>
        <span class='ply1'>[Select Player]</span>&nbsp
        (<span class='inj4'>[Select Injury]</span>)&nbsp
        <span class='dur1'>[Select Severity]</span>
    </div>
    <br>
    <div id='byLineCont'>
        <img id='byPhotoImg' src=''>
        <span class='byl1 inline'>[Select Writer]</span>&nbsp|&nbsp<span class='byl3 inline'>[Select Writer Job]</span>
    </div>
    <div class='addthis_inline_follow_toolbox'></div>
    <div class='posting'>
        <span class='post1'>Submitted October 5, 2017  5:00PM</span>
        <br>
        <span class='post2'>Updated October 5, 2017  5:00PM</span>
    </div>
    <br>
    <div id='articleText'>
        <span class='ply6 cityHead'>[Select Player]</span>&nbsp-&nbspSources inside the
        <span class='ply3'>[Select Player]</span>&nbsporganization have stated that
        <span class='ply5'>[Select Player]</span>&nbspstar
        <span class='ply2'>[Select Player]</span>
        <span class='dur2'>[Select Duration]</span>&nbspdue to
        <span class='inj1'>[Select Injury]</span>.
        <br>
        <img id='injuryImg' src=''>
        <br>
        <span class='qte1'>[Select Quote]</span>
    </div>
            ";
        break;
    case '2':
    
        echo "<br><br>
            <div class='catch breaking'>BREAKING NEWS</div>
            <br>
            <div class='headline'>
                <span class='ply1'>[Select Player]</span>&nbsp
                (<span class='inj4'>[Select Injury]</span>)&nbsp
                <span class='dur1'>[Select Severity]</span>
            </div>
            <br>
            <div id='byLineCont'>
                <img id='byPhotoImg' src=''>
                <span class='byl1 inline'>[Select Writer]</span>&nbsp|&nbsp<span class='byl3 inline'>[Select Writer Job]</span>
            </div>
            <div class='addthis_inline_follow_toolbox'></div>
            <div class='posting'>
                <span class='post1'>Submitted October 5, 2017  5:00PM</span>
                <br>
                <span class='post2'>Updated October 5, 2017  5:00PM</span>
            </div>
            <br>
            <div id='articleText'>
                <span class='ply6 cityHead'>[Select Player]</span>&nbsp-&nbspSources inside the
                <span class='ply3'>[Select Player]</span>&nbsporganization have stated that
                <span class='ply5'>[Select Player]</span>&nbspstar
                <span class='ply2'>[Select Player]</span>
                <span class='dur2'>[Select Duration]</span>&nbspdue to
                <span class='inj1'>[Select Injury]</span>.
                <br>
                <img id='injuryImg' src=''>
                <br>
                <span class='qte1'>[Select Quote]</span>
            </div>
            
        ";
        break;
    
    default:
        # code...
        break;
}


// echo "<br><br>
//         <div class='catch breaking'>BREAKING NEWS</div>
//         <br>
//         <div class='headline'>
//             <span class='ply1'>[Select Player]</span>&nbsp&nbsp
//             (<span class='inj4'>[Select Injury]</span>)&nbsp&nbsp
//             <span class='dur1'>[Select Severity]</span>
//         </div>
//         <div class='posting'>
//             <span class='post1'>Submitted October 5, 2017  5:00PM</span>
//             <br>
//             <span class='post2'>Updated October 5, 2017  5:00PM</span>
//         </div>
//         <br><br>
        
//         <p>This just in:<div class='ply2 inline'>[Select Player]</div> has <div class='inj2 inline'>[Select Injury]</div>.</p>
//         <p class='inline'>This happened when he&nbsp <div class='cau1 inline'>[Select Cause]</div>.</p>
//         <p class='inline'>He is expected to&nbsp<div class='dur2 inline'>[Select Severity]</div></p>
//         <div id='byLineCont'>
//             <img id='byPhotoImg' src=''>
//             <br>
//             <div class='byl1 inline'>[Select Writer]</div>
//             <hr>
//             <div class='byp1 inline'>[Select Writer Job]</div>.
//         <div>
//     ";


?>