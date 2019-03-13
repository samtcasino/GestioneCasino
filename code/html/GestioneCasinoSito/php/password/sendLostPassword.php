<?php
	require "../loader.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST["email"])){
			User::tryEmail($_POST["email"]);
			$cryptedMail = $_POST["email"] ^ "SGG<?rpF3FTebqx?(kgQR:hsq'mqZ!VH";
			$message = 'Change password:<a href="http://localhost/changePassword.php?id='.urlencode($cryptedMail).'">Click me!</a>';
			$mailSender->mailSend($_POST["email"],"Reset password!",$message);
			header("../../html/GestioneCasinoSito/verifyMail.html");
		}else{
			echo "Ops";
		}
	}else{
		echo "Ops";
	}
?>
