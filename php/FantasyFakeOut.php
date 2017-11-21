<?php

//initiate the session (must be the first statement in the document)
session_start();

//build player selection
//linked files
require_once 'fp/dbConnect.php';

// Check connection
if (!$conn) {  die("Connection failed: " . mysqli_connect_error()); }

//default
$injurySelect = "base";
$playerSelect = "base";
$durationSelect = "base";
$byLineSelect = "base";

// DUARATION SELECT

$sql = "SELECT dur_id, dur_title
        FROM dur
        WHERE dur_legit = 1
        ";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $durationSelect = "<select id='dur_select' class='optionSelect'>
                        <option selected value='XX'>Select Severity</option>";

        while($row = $result->fetch_assoc()){

            $id = $row['dur_id'];
            $title = $row['dur_title'];

            $durationSelect .= "<option value='$id'>$title</option>";

        }   

        $durationSelect .= "</select>";
    }
}

// INJURY SELECT

$sql = "SELECT inj_id, inj_title
        FROM inj
        WHERE inj_legit = 1
        ";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $injurySelect = "<select id='inj_select' class='optionSelect'>
                            <option selected value='XX'>Select Injury</option>";

        while($row = $result->fetch_assoc()){

            $id = $row['inj_id'];
            $title = $row['inj_title'];

            $injurySelect .= "<option value='$id'>$title</option>";

        }   

        $injurySelect .= "</select>";
    }
}

// PLAYER SELECT

$sql = "SELECT ply_id, ply_name
        FROM ply
        WHERE ply_id <> 'XX'
        ORDER BY ply_name
        ";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

    $playerSelect = "<select id='ply_select' class='optionSelectPlayer'>
                        <option selected value='XX'>Select Player</option>";

        while($row = $result->fetch_assoc()){

            $id = $row['ply_id'];
            $title = $row['ply_name'];

            $playerSelect .= "<option value='$id'>$title</option>";

        }   

        $playerSelect .= "</select>";
    }
}   

// BYLINE SELECT

$sql = "SELECT byl_id, byl_author, byl_pos
        FROM byl
        WHERE byl_id <> 'XX'
        ORDER BY byl_author
        ";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $byLineSelect = "<select id='byl_select' class='optionSelect'>
                        <option selected value='XX'>Select By-Line</option>";

        while($row = $result->fetch_assoc()){

            $id = $row['byl_id'];
            $title = $row['byl_author'];
            $pos = $row['byl_pos'];

            $byLineSelect .= "<option value='$id'>$title&nbsp|&nbsp$pos</option>";

        }   

        $byLineSelect .= "</select>";
    }
}

// CATCH LINE SELECT

$sql = "SELECT cth_id, cth_title
        FROM cth
        WHERE cth_id <> 'XX'
        ";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $catchSelect = "<select id='cth_select' class='optionSelect'>
                        <option selected value='XX'>Select Tag Line</option>";

        while($row = $result->fetch_assoc()){

            $id = $row['cth_id'];
            $title = $row['cth_title'];

            $catchSelect .= "<option value='$id'>$title</option>";

        }   

        $catchSelect .= "</select>";
    }
}

// QUOTE SELECT

$sql = "SELECT qte_id, qte_title
FROM qte
WHERE qte_id <> 'XX'
";

$result = mysqli_query($conn,$sql);

if($result){

    if($result->num_rows != 0){

        $quoteSelect = "<select id='qte_select' class='optionSelect'>
                        <option selected value='XX'>Select Quote</option>";

        while($row = $result->fetch_assoc()){

            $id = $row['qte_id'];
            $title = $row['qte_title'];

            $quoteSelect .= "<option value='$id'>$title</option>";

        }   

    $quoteSelect .= "</select>";
    }
}

// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
// <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
$sportFilter = "<select id='sportFilter' class='sportSelect'>
    <option value='1' selected>NFL</option>
    <option value='2'>MLB</option>
    <option value='3'>NBA</option>
    <option value='4'>NHL</option>
</select>";

$carrierSelect = "<select id='textCarrier' class='userInput2'>
    <option value='0' disabled selected>Select Carrier (Required)</option>
    <option value='@mms.alltelwireless.com'>Alltel</option>
    <option value='@mms.att.net'>AT&T</option>
    <option value='@myboostmobile.com'>Boost Mobile</option>
    <option value='@mms.cricketwireless.net'>Cricket Wireless</option>
    <option value='@msg.fi.google.com'>Project Fi</option>
    <option value='@text.republicwireless.com'>Republic Wireless</option>
    <option value='@pm.sprint.com'>Sprint</option>
    <option value='@tmomail.net'>T-Mobile</option>
    <option value='@mms.uscc.net'>U.S. Cellular</option>
    <option value='@vzwpix.com'>Verizon</option>
    <option value='@vmpix.com'>Virgin Mobile</option>
</select>";
            
echo <<<_FixedHTML

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Manuale" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../css/ffo.css">

    <link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
    <link rel="manifest" href="/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.tablesorter.js"></script>
    
    
    <title>Fantasy Fake Out</title>
    
</head>
<body> 
    <div id='container'>
        <div id='controls'>
            <div id='ffoTitle'><img src='../media/logo8.png' class='img1'></div>
            <div id='selectControls'>
                <div class='stepHeader stepSelected' id='step1'>STEP 1: SELECT PLAYER</div>
                <div class='stepContent' id='step1Content'>
                    <div class='accd_content2'>
                        <div class='selectLabel'>Sport</div>$sportFilter<br><br>
                        <div class='selectLabel'>Player</div>$playerSelect
                    </div>
                </div>
                <div class='stepHeader' id='step2'>STEP 2: BUILD YOUR ARTICLE</div>
                <div class='stepContent' id='step2Content' hidden>
                    <div id='randomButton'>
                        <input type='button' class='button button1' value='Randomize' onclick='randomize()'>
                    </div>
                    <div class='accd_content'>
                        <div class='selectLabel'>Injury</div>$injurySelect<br><br>
                        <div class='selectLabel'>Severity</div>$durationSelect
                    <hr>
                        <div class='selectLabel'>Writer</div>$byLineSelect<br><br>
                        <div class='selectLabel'>Headline</div>$catchSelect
                    <hr>
                        <div class='selectLabel'>Quote</div>$quoteSelect<br>
                    </div>
                </div>
                <div class='stepHeader' id='step3'>STEP 3: CHOOSE&nbsp<span class='strikeThru'>VICTIMS</span>&nbspFriends</div>
                <div class='stepContent' id='step3Content' hidden>
                    <div class='accd_content2'>
                        <div class='selectLabel'>email</div>
                            <input type='email' id='emailInput' placeholder='enter email' class='userInput'>
                            <input type='button' class='button button1' value='Add email' onclick='addEmail()'>
                            <br> 
                        <div class='selectLabel'>text</div>
                            <input type='phone' id='textInput' placeholder='enter phone: ###-###-####' class='userInput'>
                            <br><br>
                            <a target='_blank' href='https://freecarrierlookup.com/'>Look Up Carrier Here</a>
                            $carrierSelect
                            <br>
                            <input type='button' class='button button1' value='Add Phone' onclick='addText()'>
                            <div id='carrierWhy'>Why do I need the carrier?</div>
                        <hr>
                        <div class='selectTime'>
                            <div class='timeSelect'>Send Immediately</div>
                            <input type='button' class='button button3' value='Send!' onclick='sendOut()'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            <div id='contentContainer'>
                <div id='switch'>
                    <input type='button' id='showArt' class='buttonB button1' value='Show Article' onclick='showArticle()' hidden>
                    <input type='button' id='showDet' class='buttonB button2' value='Show Details' onclick='showDetails()'>
                </div>
                <div id='cont1'>
                    <div class='contentTitle'>Article Preview (What Your Friends Will See)</div>
                    <div>
                        <div class='inline linkLine'>Link:<input type='text' id='linkInput' value='pending' class='inline'>
                        <input type='button' class='button button1' value='Copy Link' onclick='copyLink()'>
                        <input type='button' class='button button1' value='Go To Fake Page' onclick='goToPage()'>
                        </div>
                    </div>
                    <div id='iFrame'>
                        <iframe id="iFrameContent" src="">Please use an updated browser.</iframe>
                    </div>
                </div>
                <div id='cont2' hidden>
                    <div class='contentTitle'>The Details (Who Get's It and When)</div>
                    <br>
                    <div id='cont2body'>
                        <div class='destHolder'>
                            <div class='destCount'>
                                Ready to send to <span id='toCount'>0</span> of <span id='toAvail'>5</span> "Freinds".
                            </div>
                            <div class='destTitle'>
                                Your Article Will Be Emailed To:
                            </div>
                            <div class='destList' id='emailList'>
                            </div>
                            <div class='destTitle'>
                                Your Article Will Be Texted To:
                            </div>
                            <div class='destList' id='textList'>
                            </div>
                        </div>
                        <div class='destRight'>
                            To email or text?  That is the question...<br><br>
                            email<br>
                            Pros:
                            <ul>
                                <li>Full fake injury details are in the email</li>
                            </ul>
                            Cons:
                            <ul>
                                <li>Might get stuffed in junk mail</li>
                                <li>Might not get read in time</li>
                            </ul>
                            <br><br>
                            Text
                            <br>
                            Pros:
                            <ul>
                                <li>They should see it as soon as it arrives</li>
                            </ul>
                            Cons:
                            <ul>
                                <li>Might get stuffed in junk mail</li>
                                <li>Might not get read in time</li>
                            </ul>
                            <br><br>
                            Send Direct or Forward?  That is another question...<br>
                            <br>
                            Send Direct to Your Friend
                            <br>
                            Pros:
                            <ul>
                                <li>Plausible Deniability</li>
                                <li>If you have suspocious friends, they might not believe something from you</li>
                            </ul>
                            Cons:
                            <ul>
                                <li>They might not belive a source they've never heard of</li>
                                <li>If it works, they will know you had something to do with it</li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='coverAll' hidden>
        Sending Email
        <br>
        this could take up to twenty seconds...
        <br>
        but hopefully it won't...
        <br>
        but if it does, here's a picture to look at
    </div>
    <input type='hidden' id='frm' value='1'>
    
<script>

    window.onload = function() {
        updateLink();
    };
    
    $('body').on('change', '.optionSelect, .optionSelectPlayer', function() {
        updateLink();
        selValue = $(this).val();
        if (selValue == "00"){
            $(this).css("background", "#FFE260");
        } else {
            $(this).css("background", "#9AEB9A");
        }
    })

    $('body').on('click', '.sport', function() {
        $(".sport").css("background", "linear-gradient( #2D658A, #446D85)");  
        $(this).css("background", "linear-gradient( #C41919, #791010 )");  
    });

    $('body').on('click', '.stepHeader', function() {
        $(".stepHeader").css("background", "linear-gradient( rgb(26, 93, 226), rgb(56, 110, 219)"); 
        $(".stepHeader").css("color", "#000");  
        $(this).css("background", "linear-gradient( #ce531e, #c93f04)");  
        $(this).css("color", "#fff");  
    });

    $('body').on('click', '#step1', function() {
        $("#step1Content").slideDown(); 
        $("#step2Content").slideUp();  
        $("#step3Content").slideUp(); 
        $("#cont1").slideDown(); 
        $("#cont2").slideUp(); 
        $("#showArt").hide();
        $("#showDet").show();
    });

    $('body').on('click', '#step2', function() {
        $("#step2Content").slideDown(); 
        $("#step1Content").slideUp();   
        $("#step3Content").slideUp();
        $("#cont1").slideDown(); 
        $("#cont2").slideUp(); 
        $("#showArt").hide();
        $("#showDet").show();
    });

    $('body').on('click', '#step3', function() {
        $("#step3Content").slideDown(); 
        $("#step1Content").slideUp(); 
        $("#step2Content").slideUp(); 
        $("#cont2").slideDown(); 
        $("#cont1").slideUp(); 
        $("#showArt").show();
        $("#showDet").hide();
    });

    function updateLink(){

        var selPlayer = $('#ply_select').val();
        var injury = $('#inj_select').val();
        var duration = $('#dur_select').val();
        var byLine = $('#byl_select').val();
        var tagLine = $('#cth_select').val();
        var quote = $('#qte_select').val();

        var articleLink = "http://www.sportsinsider.vegas/?articleID=" + injury + duration + byLine + tagLine + quote + selPlayer ;
            
        $('#linkInput').val(articleLink);

        var iframe = document.getElementById('iFrameContent');

        iframe.src = articleLink;
       
    }

    function copyLink(){

        var link = $('#linkInput').val();
        
        if(link.includes("XX")){
            
            alert("Finish selecting options (Step 1 & Step 2) to build the link.");
            articleNotComplete();
        
        } else {
                
            var copyTextarea = document.querySelector('#linkInput');
            copyTextarea.select();
        
            try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            } catch (err) {
            alert("Unable to auto copy.  Just select the text and copy.");
            }

        }
    }

    function goToPage(){

        var link = $('#linkInput').val();
        
        if(link.includes("XX")){
            
            alert("Finish selecting options (Step 1 & Step 2) to build the page.");
            articleNotComplete();
        
        } else {

            window.open(link);
        }        
    }

    function randomize(){

        var randomType = $('#randomSetting').val();

        $.ajax({
            type: 'POST',
            url: 'fp/randomize.php',   
            dataType: 'html',
            data: {
                
            },
            success: function (html) {

                var result = $.parseJSON(html);
                
                var c2 = result[0];
                var c3 = result[1];
                var c5 = result[2];
                var c7 = result[3];
                var c8 = result[4];

                $("#inj_select").val(c2);
                $("#dur_select").val(c3);
                $("#byl_select").val(c5);
                $("#cth_select").val(c7);
                $("#qte_select").val(c8);

                $(".optionSelect").css("background", "#9AEB9A");

                updateLink();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                $("#contentUpdate").hide().fadeIn("slow").html("error loading content.");
            }
        });
    }

    function showArticle(){
        $("#cont1").slideDown(); 
        $("#cont2").slideUp(); 
        $("#showArt").hide();
        $("#showDet").fadeIn();
    }

    function showDetails(){
        $("#cont2").slideDown(); 
        $("#cont1").slideUp(); 
        $("#showArt").fadeIn();
        $("#showDet").hide();
    }

    $('#emailInput').bind("enterKey",function(e){
        addEmail();
    });

    $('#emailInput').keyup(function(e){
         if(e.keyCode == 13)
         {
             $(this).trigger("enterKey");
         }
    });

    $('#textInput').bind("enterKey",function(e){
        addText();
    });
     
    $('#textInput').keyup(function(e){
         if(e.keyCode == 13)
         {
             $(this).trigger("enterKey");
         }
    });

    function addEmail(){

        var thisEmail = $('#emailInput').val();

        if (validateEmail(thisEmail)){

            if(countEmails()){
            
            var newEntry = "<div class='emailAdd'><input class='userInput emailSend' type='text' value='" + thisEmail + "' readonly><img class='remove' src='../media/remove.png'></div>";

            $('#emailList').append(newEntry);
            $('#emailInput').focus();
            $('#emailInput').css("background", "#fff");
            $('#emailInput').val("");

            updateCount();

            }

        } else {
            $('#emailInput').focus();
            $('#emailInput').css("background", "pink");
            alert("That email doesn't look quite right to us.  Are you even paying attention?")
        }
    }

    function addText(){
        
        var thisText = $('#textInput').val();
        var thisCarrier = $('#textCarrier').val();

        
        if (validatePhone(thisText)){
            
            if (thisCarrier == '0' || !thisCarrier){
                alert("Please select the cell phone carrier.")
                $('#textCarrier').focus().css("background", "pink");
    
            } else {

                if(countEmails()){
                    
                var newEntry = "<div class='textAdd'><input class='userInput textSend' type='text' value='" + thisText + "' readonly><input class='textSendCarrier' type='hidden' value='" + thisCarrier + "' readonly><img class='remove' src='../media/remove.png'></div>";
    
                $('#textList').append(newEntry);
                $('#textInput').focus();
                $('#textInput').css("background", "#fff");
                $('#textInput').val("");
                $('#textCarrier').val("0");
                $('#textCarrier').css("background", "#fff");

                updateCount();

                }


            }
    
        } else {
            $('#textInput').focus();
            $('#textInput').css("background", "pink");
            alert("That phone number doesn't look quite right to us.  Are you even paying attention?")
        }
    }

    function countEmails(){

        var count = $(".destList div").length;
        
        if(count < 5){
            return true;
        } else {
            alert("Only 5 emails/messages can be sent at a time");
            return false;
        }
    }

    function updateCount(){
        var count = $(".destList div").length;
        $("#toCount").text(count);
    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validatePhone(phone){  
      var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
      return re.test(phone);
    } 

    $(document).on('click', '.remove', function() {
        $(this).parent().remove();
        updateCount();
    });

    function sendOut(){

        var count = $(".destList div").length;
        
        if(count < 1){
            alert("Add at least one email or text reciepeint (this can be you).");
            return;
        }

        var link = $('#linkInput').val();
        
        if(link.includes("XX")){
            
            alert("Finish selecting options (Step 1 & Step 2) to build the article.");
            articleNotComplete();
            return;        
        }

        $("#coverAll").html("Sending Email(s) / Text(s) <br> this could take up to twenty seconds... <br> but hopefully it won't...").css("background-color", "#000000da").fadeIn();

        var selPlayer = $('#ply_select').val();
        var injury = $('#inj_select').val();
        var duration = $('#dur_select').val();
        var byLine = $('#byl_select').val();
        var tagLine = $('#cth_select').val();
        var quote = $('#qte_select').val();

        var articleLink = "http://www.sportsinsider.vegas/?articleID=" + injury + duration + byLine + tagLine + quote + selPlayer ;

        var emails = [];
        var texts = [];
        var carriers = [];

        $(".emailSend").each(function() {
            emails.push($(this).val());
        });

        $(".textSend").each(function() {
            texts.push($(this).val());
        });

        $(".textSendCarrier").each(function() {
            carriers.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: 'fp/sendEmail.php',   
            dataType: 'html',
            data: {
                emailList : emails,
                textList : texts,
                carrierList : carriers,
                c1: selPlayer,
                c2: injury, 
                c3: duration,
                c7: tagLine,
                linkString : articleLink
            },
            success: function (html) {

                switch(html) {
                    case "00":
                        $("#coverAll").html("Oh no, we don't think we sent anything... <br> Check your 'To' list and try again maybe?").css("background-color", "#421313").delay(2000).fadeOut();
                        break;
                    case "01":
                        $("#coverAll").html("Send Sucess!").css("background-color", "#134213").delay(1000).fadeOut();
                        $("#textList").empty();
                        break;
                    case "02":
                        $("#coverAll").html("Failed to send Text Message(s)...<br> Check your 'To' list and try again maybe?").css("background-color", "#421313").delay(2000).fadeOut();
                        break;
                    case "10":
                        $("#coverAll").html("Send Sucess!").css("background-color", "#134213").delay(1000).fadeOut();
                        $("#emailList").empty();
                        break;
                    case "11":
                        $("#coverAll").html("Send Sucess!").css("background-color", "#134213").delay(1000).fadeOut();
                        $("#emailList").empty();
                        $("#textList").empty();
                        break;
                    case "12":
                        $("#coverAll").html("We sent the Emails ok, <br> but had problems with the Text Messages... <br> Check your 'To' list and try again maybe?").css("background-color", "#421313").delay(2000).fadeOut();
                        $("#emailList").empty();
                        break;
                    case "20":
                        $("#coverAll").html("We had a problem sending the emails. <br> Check your 'To' list and try again maybe?").css("background-color", "#421313").delay(2000).fadeOut();
                        break;
                    case "21":
                        $("#coverAll").html("We sent the Texts ok, <br> but had problems with the Emails... <br> Check your 'To' list and try again maybe?").css("background-color", "#421313").delay(2000).fadeOut();
                        $("#textList").empty();
                        break;
                    case "22":
                        $("#coverAll").html("We had problems with both the Emails <br> and Text Messages... <br>Check your 'To' list and try again maybe?").css("background-color", "#421313").delay(2000).fadeOut();
                        break;
                    default:
                        $("#coverAll").html("Oh no, something went wrong...<br>Check your 'To' list and try again maybe?").css("background-color", "#421313").delay(2000).fadeOut();
                        break
                }

                updateCount();

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                $("#contentUpdate").hide().fadeIn("slow").html("error loading content.");
            }
        });   
    }

    function articleNotComplete(){
        
        var selPlayer = $('#ply_select').val();

        if (selPlayer == "XX"){
            $("#step1Content").slideDown(); 
            $("#step2Content").slideUp();  
            $("#step3Content").slideUp(); 
            $("#cont1").slideDown(); 
            $("#cont2").slideUp(); 
            $("#showArt").hide();
            $("#showDet").show();
            $("#step2, #step3").css("background", "linear-gradient( rgb(26, 93, 226), rgb(56, 110, 219)"); 
            $("#step2, #step3").css("color", "#000");  
            $("#step1").css("background", "linear-gradient( #ce531e, #c93f04)");  
            $("#step1").css("color", "#fff"); 
        } else {
            $("#step2Content").slideDown(); 
            $("#step1Content").slideUp();   
            $("#step3Content").slideUp();
            $("#cont1").slideDown(); 
            $("#cont2").slideUp(); 
            $("#showArt").hide();
            $("#showDet").show();
            $("#step1, #step3").css("background", "linear-gradient( rgb(26, 93, 226), rgb(56, 110, 219)"); 
            $("#step1, #step3").css("color", "#000");  
            $("#step2").css("background", "linear-gradient( #ce531e, #c93f04)");  
            $("#step2").css("color", "#fff"); 
        }

    }


</script>
</body>
</html>

_FixedHTML;

?>