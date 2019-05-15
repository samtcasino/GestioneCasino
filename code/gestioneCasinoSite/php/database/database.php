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

			$tableName = explode(" ",$selectQuery);
			for($i = 1; $i <sizeof($tableName);$i++){
				if($tableName[$i-1] == "from"){
					$tableName = $tableName[$i];
					break;
				}
			}

			$primaryKey = $this->db->query("SHOW KEYS FROM ".$tableName." WHERE Key_name = 'PRIMARY'")->fetchAll()[0]["Column_name"];
			$primaryIndex = 0;
			echo "<table class='table' style='table table-striped'><thead><tr>";
			echo "<th></th>";
			echo "<th></th>";
				$n = 0;
				foreach ($result[0] as $key => $value) {
					if($n%2==0){
						if($key != $primaryKey){
							echo "<th><b>".strtoupper($key{0}).substr($key,1,strlen($key))."</b></th>";
						}else{
							echo "<th><u><b>".strtoupper($key{0}).substr($key,1,strlen($key))."</u> <i class='fas fa-key'></i></b></th>";	
							$primaryIndex = $n;
						}
					}
					$n++;
				}
			
			echo "</tr></thead><tbody>";
			
			
			for ($i=0; $i < sizeof($result); $i++) { 
				
				echo "<tr>";
				echo "<th><a href='php/database/remove.php?table=$tableName&key="."$primaryKey"."&value=".$result[$i][$primaryIndex/2]."'><i class='fas fa-trash-alt'></i></a></th>";
				echo "<th><a href='php/database/modify.php?table=$tableName&key="."$primaryKey"."&value=".$result[$i][$primaryIndex/2]."'><i class='fas fa-pencil-alt'></i></a></th>";
				for ($j=0; $j < sizeof($result[$i])/2; $j++) { 
					
					//echo "<tr><i class='far fa-trash-alt' id='$i'></tr>";
					if($j != $primaryIndex/2){
						echo "<th>".$result[$i][$j]."</th>";
					}else{
						echo "<th><u>".$result[$i][$j]."</u></th>";
					}
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
					$birthday = $user->getBirthday();
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
					(
						name,
						surname,
						street,
						house_number,
						zip_code,
						city,
						email,
						phone_number,
						gender,
						password,
						verified,
						birthday,
						type,
						admin
					) 
					values(
						'$name',
						'$surname',
						'$street',
						$house_number,
						$zip_code,
						'$city',
						'$email',
						$phone_number,
						'$gender',
						'$password',
						0,
						$birthday,
						'occasionale',
						0
					)";
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
