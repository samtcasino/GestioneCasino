<?php
	/**
	 * Classe che gestisce le connessioni ai database
	 */
	//require "user/user.php";

	class Database{

		
		private $db;
		
		function __construct($host,$port,$dbname,$username,$password)
		{
		    $this->db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
		    //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public function executeQuery($query){
			$result = $this->db->query($query);
			if ($result === FALSE) {
				throw new InvalidArgumentException("Failed to load schema is not exists or you are not permission");
			}
			return $result->fetchAll();
		} 
		public function executeQueryWithoutFetch($query){
			$result = $this->db->query($query);
			if ($result === FALSE) {
				throw new InvalidArgumentException("Failed to load schema is not exists or you are not permission");
			}
			return $result;
		} 

		public function printTableQuery($selectQuery){
			$result = $this->db->query($selectQuery);
			if ($result === FALSE) {
				throw new InvalidArgumentException("Failed to load schema is not exists or you are not permission");
			}
			$result = $result->fetchAll();

			echo "<table class='table' style='overflow-x:auto;'><thead><tr>";
			echo "<th></th>";
			echo "<th></th>";
				$n = 0;
				foreach ($result[0] as $key => $value) {
					if($n%2==0){
						echo "<th><b>".strtoupper($key{0}).substr($key,1,strlen($key))."</b></th>";
					}
					$n++;
				}
			
			echo "</tr></thead><tbody>";
			
			
			for ($i=0; $i < sizeof($result); $i++) { 
				
				echo "<tr>";
				echo "<th><a href='php/database/modify.php?value=modify_$i'><i class='fa fa-pencil' id='modify_$i'></a></th>";
				echo "<th><a href='php/database/modify.php?value=delete_$i><i class='fa fa-trash' id='delete_$i'></a></th>";
				for ($j=0; $j < sizeof($result[$i])/2; $j++) { 
					
					//echo "<tr><i class='far fa-trash-alt' id='$i'></tr>";
					echo "<th>".$result[$i][$j]."</th>";
				}
				echo "</tr>";
			}
			echo "</tbody></table>";
		}

		public function existsUserByEmail($email){
			return $this->executeQuery("select * from user where email = '".$email."'");
		}

		public function insertUser($user){
			if(gettype($user) == "object"){
				if(get_class($user) == "User"){
					$name =$user->getName();
					$surname=$user->getSurname();
					$street=$user->getAddress();
					$house_number=$user->getHouseNumber();
					$zip_code=$user->getZipCode();
					$city=$user->getCity();
					$email=$user->getEmail();
					$phone_number=$user->getTelephoneNumber();
					$gender=$user->getGender();
					$password=$user->getPassword();


					$query = "Insert into user
					(name,surname,street,house_number,zip_code,city,email,phone_number,gender,password,verified) 
					values('$name','$surname','$street',$house_number,$zip_code,'$city','$email',$phone_number,'$gender','$password',0)";
					$this->executeQuery($query);
				}else{
					throw new InvalidArgumentException(get_class($user)." is not a User class");
				}
			}else{
				throw new InvalidArgumentException(gettype($user)." is not a User class");
			}
		}
	}
?>
