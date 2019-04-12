<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(
        isset($_POST["firstname"]) && 
        isset($_POST["surname"]) &&
        isset($_POST["city"]) &&
        isset($_POST["zipCode"]) &&
        isset($_POST["address"]) &&
        isset($_POST["houseNumber"]) &&
        isset($_POST["phoneNumber"]) &&
        isset($_POST["email"])
    ){	
        foreach ($_POST as $key => $value) {
            $db->executeQuery("update user set $k");
        }
        
        $message = '<h1>Ei bro!, your data was modified</h1>';
        $subjet = "Hi there! Cashyland";
        $mailSender->mailSend($_POST["email"],$subjet,$message);
        header("Location: ../../../profile.php");	
    }
}
?>