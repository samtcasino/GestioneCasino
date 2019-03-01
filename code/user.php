<?php
	/**
	 * Pagina backend di registrazione
	 */
	class User
	{
		public function __construct($name,$surname,$birthday,$city,$zipcode,$address,$houseNumber,$telephoneNumber,$email,$gender,$password,$repassword)
		{
			User::tryName($name);
			User::tryName($surname);
			User::tryDate($birthday);
			User::tryName($city);
			User::tryName($address);
			User::tryZipCode($zipcode);
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
            return /*$email*/;
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

	    	$check = true;
	        for ($i = 0; $i < strlen($object); $i++) {
	            if(!is_numeric($object[$i]) && ($i != strlen($object)-1 || $i == 0)){
	                $check = false;
	            }
	        }
	        if(!(!(!preg_match('/^([0-9A-Za-z]{1,4})$/', $object) || $check == false))){
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

	    public static function tryZipCode($object){
	    	$regex = '/^\d+$/';
	        if(!(preg_match($regex,$object) && (strlen($object) >= 4 && strlen($object) <= 5))){
	            throw new InvalidArgumentException( sprintf( '"%s" is not a valid zip code',$object));
	        }
	        return $object;
	    }
	}		
?>
