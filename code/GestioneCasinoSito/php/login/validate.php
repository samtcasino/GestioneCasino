
<?php
	require "../loader.php";
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	    $email = urldecode($id);
	    $email = $email ^ $privateKey;
 	 if(!(gettype($db->existsUserByEmail($email)) == "boolean")){
	    	$db->executeQuery("update user SET verified = 1 where email = '". $email."'");
	    	echo $email . " ti sei registrato con successo";
	    }else{
	    	echo "Qualcosa è andato storto :(";
	    }
	}
?>
