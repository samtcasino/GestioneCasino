<?php
	/**
	 * Classe che gestisce le connessioni ai database
	 */
	include "../user/user.php";

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

		public function getUserByEmail($email){
			$this->executeQuery("select * from users where id = ".$email)->fetch();
		}

		public function insertUser($user){
			if(gettype($user) == "object"){
				if(get_class($user) == "User"){
					$query = "Insert into users(id,nome,cognome) values(null,'".$user->getName()."','".$user->getSurname()."')";
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