<?php
	require 'vendor/autoload.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	/**
	 * 
	 */
	class SendMail 
	{
		function __construct()
		{		
			$this->mail = new PHPMailer(true);
			$this->mail->isSMTP();                                      // Set mailer to use SMTP
			$this->mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
			$this->mail->SMTPAuth = true;                               // Enable SMTP authentication
			$this->mail->Username = 'gruppocasino2018@gmail.com';                 // SMTP username
			$this->mail->Password = 'Casin02018';                           // SMTP password
			$this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$this->mail->Port = 25;  
			$this->mail->From = 'gruppocasino2018@gmail.com';
			$this->mail->FromName = 'Verify Password';
		}

		public function mailSend($email,$subject,$message){
			$this->mail->addAddress($email);               // Name is optional
			$this->mail->isHTML(true);                                  // Set email format to HTML
			$this->mail->Subject = $subject;
			$this->mail->Body = $message;
			return $this->mail->send();
		}
	}
?>
