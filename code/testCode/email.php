<?php
     class Email
    {
        private $email;

        public function __construct(string $email)
        {
            $this->tryEmail($email);

            $this->email = $email;
        }

        public function fromString(string $email)
        {
            return new self($email);
        }

        public function __toString(): string
        {
            return $this->email;
        }

        public function tryEmail(string $email)
        {
            if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
            {
                throw new InvalidArgumentException( sprintf( '"%s" is not a valid email address',$email));
            }  
        }
    }

    try{
        $email = new Email("edede");
    }catch (InvalidArgumentException $e) {
        echo "Email sbagliata";
    }
?>