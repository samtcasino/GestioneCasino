<?php 
	require "database/database.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(
			isset($_POST["name"]) && 
			isset($_POST["surname"]) &&
			isset($_POST["birthday"]) &&
		//	isset($_POST["city"]) &&
			isset($_POST["zipCode"]) &&
			isset($_POST["address"]) &&
			isset($_POST["houseNumber"]) &&
			isset($_POST["phoneNumber"]) &&
			isset($_POST["email"]) &&
			isset($_POST["gender"]) &&
			isset($_POST["password"]) &&
			isset($_POST["repassword"])
		){
			try{
				$u = new User(
					$_POST["name"],
					$_POST["surname"],
					$_POST["birthday"],
					"citta temporanea",
					$_POST["zipCode"],
					$_POST["address"],
					$_POST["houseNumber"],
					$_POST["phoneNumber"],
					$_POST["email"],
					$_POST["gender"],
					$_POST["password"],
					$_POST["repassword"]
				);
			}catch(Exception $e){
//				echo "<script>alert($e->getMessage())</script>";
				echo "<script>window.location.replace('http://cashyland.tk/GestioneCasinoSito/registrazione.html')</script>";
			}
			$database = new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018");
			$database->insertUser($u); 
			header("Location: ../../../GestioneCasinoSito/verificaMail.html");
		}
	}
?>
