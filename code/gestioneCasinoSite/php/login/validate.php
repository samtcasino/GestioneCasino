
<?php
	require "../loader.php";
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	    $email = urldecode($id);
	    $email = $email ^ $privateKey;
 	 if(!(gettype($db->existsUserByEmail($email)) == "boolean")){
	    	$db->executeQuery("update user SET verified = 1 where email = '". $email."'");
	    	echo "<script type='text/javascript'>alert('Ti sei registrato con successo!');</script>";
	    	header("Location: ../../login.html");
	    }else{
			header("Location: ../../index.html");
	    } 
	}
?>
