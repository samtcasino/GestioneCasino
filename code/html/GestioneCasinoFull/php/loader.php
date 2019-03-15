<?php
	require "database/database.php";
	require "sendMail/sendMail.php";
	require "user/user.php";
	$GLOBALS['db'] = new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018");
	$GLOBALS['mailSender'] = new SendMail();
	$GLOBALS['privateKey'] = "SGG<?rpF3FTebqx?(kgQR:hsq'mqZ!VH";
?>