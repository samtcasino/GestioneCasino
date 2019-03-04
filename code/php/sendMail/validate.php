<?php
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	    $email = urldecode($id);
	    $email = $email ^ "SGG<?rpF3FTebqx?(kgQR:hsq'mqZ!VH";

	    $database = new Database("127.0.0.1",3306,"cashyland","root","root");
	    if(!(gettype($database->existsUserByEmail($email)) == "boolean")){
	    	$database->executeQuery("update users SET verified = 1 where email = '". $email."'");
	    	echo $email . " ti sei registrato con successo";
	    }else{
	    	echo "Qualcosa è andato storto :(";
	    }
	}
?>