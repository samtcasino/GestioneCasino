<?php
    require_once "../loader.php";
    if(isset($_GET["table"]) && isset($_GET["value"]) && isset($_GET["key"])){
        $db->executeQuery("Delete from ". $_GET["table"]." where ".$_GET["key"]." = '".$_GET["value"]."'");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>