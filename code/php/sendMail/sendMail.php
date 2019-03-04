<?php
	require 'vendor/autoload.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	/**
	 * 
	 */
	class SendMail 
	{
		private $user;
		private $mail;
		private $privateKey;
		function __construct($privateKey)
		{		
			$this->privateKey = $privateKey;
			$this->mail = new PHPMailer(true);
			$this->mail->isSMTP();                                      // Set mailer to use SMTP
			$this->mail->Host = 'smtp.live.com';              // Specify main and backup SMTP servers
			$this->mail->SMTPAuth = true;                               // Enable SMTP authentication
			$this->mail->Username = 'gruppoCasin02018@hotmail.com';                 // SMTP username
			$this->mail->Password = 'Gruppo2018';                           // SMTP password
			$this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$this->mail->Port = 25;  
			$this->mail->From = 'gruppoCasin02018@hotmail.com';
			$this->mail->FromName = 'Verify Password';
		}

		public function mailSend($email){
			$this->mail->addAddress($email);               // Name is optional
			$this->mail->isHTML(true);                                  // Set email format to HTML
			$this->mail->Subject = 'Hi there! Verify your account!';
			$cryptedMail = $email ^ $this->privateKey;
			$this->mail->Body ='<hr>How are you? <br> <hr>This i your link:<a href="http://cashyland.tk/GestioneCasino/code/php/validate.php?id='.urlencode($cryptedMail).'">Click me!</a>';

			if(!$this->mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $this->mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	}
?>
