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
			return $result->fetch();
		} 

		public function printTableQuery($selectQuery){
			$result = $this->db->query($selectQuery);
			if ($result === FALSE) {
				throw new InvalidArgumentException("Failed to load schema is not exists or you are not permission");
			}
			echo "<table id='tbl'><tr>";
			while($row = $result->fetch()) 
	     	{
	    	    echo "<tr>";
	    	    for ($i=0;$i<(sizeof($row)-1);$i++)
	    	    {
		           echo "<td>".$row[$i]."</td>";
		        }
		        echo "</tr>";
		      }
			echo "</table>";
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
