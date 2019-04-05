<?php 
	require "../loader.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(
			isset($_POST["email"]) &&
			isset($_POST["password"])
		){
			$email = $_POST["email"];
			$password = $_POST["password"];

			$queryRepose = $db->executeQueryWithoutFetch("select password,verified,email from user where email = '$email'")->fetch();
			var_dump($queryRepose);
			if(!(gettype($queryRepose)=="boolean")){
				
				$dbPassword = $queryRepose["password"];
				$dbVerified = $queryRepose["verified"];
				if($password == $dbPassword){
					if($dbVerified == 1){
						session_start();
						setcookie("email",$queryRepose["email"]^$privateKey, time() + (2592000*20), "../../");
						$_SESSION["username"] = $email;
						header("Location: ../../profile.php");
					}else{
						header("Location: ../../verifyMail.html");
					}
				}else{
					setcookie("error","Password sbagliata",time()+1,"/");
					header("Location: ../../login.html");
				}
			}else{
				setcookie("error","Email non trovata",time()+1,"/");
				header("Location: ../../login.html");
			}
		}
	}
?>
