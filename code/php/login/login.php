<?php 
	require "database/database.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(
			isset($_POST["email"]) &&
			isset($_POST["password"])
		){
			$email = $_POST["email"];
			$password = $_POST["password"];

			$database = new Database("127.0.0.1",3306,"cashyland","root","root");
			$queryRepose = $database->executeQuery("select password,verified from user where email = '$email'");
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
