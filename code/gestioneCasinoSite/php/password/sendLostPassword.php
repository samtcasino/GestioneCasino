<?php
	require "../loader.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST["email"])){
			User::tryEmail($_POST["email"]);
			$cryptedMail = $_POST["email"] ^ "SGG<?rpF3FTebqx?(kgQR:hsq'mqZ!VH";
			$message = 'Change password:<a href="http://cashyland.tk/resetPassword.php?id='.urlencode($cryptedMail).'">Click me!</a>';
			//$mailSender->mailSend($_POST["email"],"Reset password!",$message);
			header("Location: ../../verifyMail.html");
		}else{
			header("Location: ../../index.html");
		}
	}else{
		header("Location: ../../index.html");
	}
?>
