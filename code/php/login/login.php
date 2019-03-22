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
						echo "Loggato con successo";
					}else{
						setcookie("error","Non è verificato",time()+300,"/");
						header("Location: ../../login.html");
					}
				}else{
					setcookie("error","Password sbagliata",time()+300,"/");
					header("Location: ../../login.html");
				}
			}else{
				setcookie("error","Email non trovata",time()+300,"/");
				header("Location: ../../login.html");
			}
		}
	}
?>
