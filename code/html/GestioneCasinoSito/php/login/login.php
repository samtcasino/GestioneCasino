<?php 
	require "../loader.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(
			isset($_POST["email"]) &&
			isset($_POST["password"])
		){
			$email = $_POST["email"];
			$password = $_POST["password"];

			$queryRepose = $db->executeQuery("select password,verified from user where email = '$email'");
			if(!(gettype($queryRepose)=="boolean")){
				$dbPassword = $queryRepose["password"];
				$dbVerified = $queryRepose["verified"];
				if($password == $dbPassword){
					if($dbVerified == 1){
						echo "Loggato stracazzo con successo";
					}else{
						echo "Non è verificato";
					}
				}else{
					echo "Password sbagliata";
				}
			}else{
				echo "Email non trovata";
			}
		}
	}
?>
