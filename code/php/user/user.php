<?php
	/**
	 * Pagina backend di registrazione
	 */
	class User
	{
		private $name;
		private $surname;
		private $birthday; 
		private $city;
		private $address;
		private $houseNumber;
		private $telephoneNumber;
		private $email;
		private $gender;
		private $password;
		private $zipCode;


		public function __construct($name,$surname,$birthday,$city,$zipCode,$address,$houseNumber,$telephoneNumber,$email,$gender,$password,$repassword)
		{
			$this->name = $name;
			$this->surname = $surname;
			$this->birthday = $birthday;
			$this->city = $city;
			$this->address = $address;
			$this->houseNumber = $houseNumber;
			$this->telephoneNumber = $telephoneNumber;
			$this->email = $email;
			$this->gender = $gender;
			$this->zipCode = $zipCode;
			$this->password = $password;

			User::tryName($name);
			User::tryName($surname);
			User::tryDate($birthday);
			User::tryName($city);
			User::tryName($address);
			User::tryHouseNumber($houseNumber);
			User::tryNumber($telephoneNumber);
			User::tryEmail($email);
			User::tryGender($gender);
		}

		public static function tryEmail($email)
        {
            if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
            {
                throw new InvalidArgumentException( sprintf( '"%s" is not a valid email address',$email));
            }  
            return $email;
        }

        public static function tryName($object){
        	$regex = '/^[a-zA-Zàáâäãåąčćèéìíńòóùú ,.\'-]+$/u';
	        if(!preg_match($regex,$object)){
	            throw new InvalidArgumentException( sprintf( '"%s" is not a valid name',$object));
	        }
	        return $object;
        }

        public static function tryDate($object){
	        $age = User::getAge($object);
	        if($age<18){
	       		throw new InvalidArgumentException( sprintf( '"%s" is not a valid date or you are under 18',$object));
	        }
	        return $object;
	    }

	    public static function getAge($date){
	        $from = new DateTime($date);
			$to   = new DateTime('today');
			return date_diff(date_create($date), date_create('today'))->y;
	    }

	    public static function tryNumber($object){
	        $object = trim($object," ");
	        $object = trim($object,"-");
	        $regex = '/^[\+]?[0-9-]{10,14}$/';
	        if(!preg_match($regex,$object)){
	          throw new InvalidArgumentException( sprintf( '"%s" is not a valid number',$object));
	        }
	        return $object;
	    }

	    public static function tryHouseNumber($object){
	        if(!is_numeric($object)){
	            throw new InvalidArgumentException( sprintf( '"%s" is not a valid house number',$object));
	        }
	        return $object;
	    }

	    public static function tryGender($object){
	        if(!($object == "male" || $object == "female")){
	            throw new InvalidArgumentException( sprintf( '"%s" is not a valid gender',$object));
	        }
	        return $object;
	    }

	    public function getName(){
	    	return $this->name;
	    }
	    public function getSurname(){
	    	return $this->surname;
	    }
	    public function getBirthday(){
	    	return $this->birthday;
	    }
	    public function getCity(){
	    	return $this->city;
	    }
	    public function getZipCode(){
	    	return $this->zipCode;
	    }
	    public function getAddress(){
	    	return $this->address;
	    }
	    public function getHouseNumber(){
	    	return $this->houseNumber;
	    }
	    public function getTelephoneNumber(){
	    	return $this->telephoneNumber;
	    }
	    public function getEmail(){
	    	return $this->email;
	    }
	    public function getGender(){
	    	return $this->gender;
	    }
	    public function getPassword(){
	    	return $this->password;
	    }

	}		
?>