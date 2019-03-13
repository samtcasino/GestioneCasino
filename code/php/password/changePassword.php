<?php
	require "../loader.php";
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	    $email = urldecode($id);
	    $email = $email ^ $privateKey;

 	 if(!(gettype($db->existsUserByEmail($email)) == "boolean")){
 	 		if($_SERVER['REQUEST_METHOD'] == "POST"){
 	 			if(isset($_POST["password"]) && isset($_POST["repassword"])){
 	 				$db->executeQuery('update user set password = "'.$_POST["password"].'" where email = "'.$email.'"');
 	 			}
 	 		}else{
		    	echo"
		    		<body>
						<form action='changePassword.php?id=".urlencode($email^$privateKey)."' method='post'>
							Password:<input type='password' name='password'><br>
							Repeat-Password:<input type='password' name='repassword'><br>
							<input type='submit' name='' value='VAI!''>
						</form>
					</body>
		    	";
		    }
	    }else{
	    	echo "Qualcosa è andato storto :(";
	    }
	}
?>