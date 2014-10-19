<?php
	require_once(dirname(__FILE__).'/../PHPMailer/PHPMailerAutoload.php');
	require_once('config.php');
?>
<?php
	class Mail
	{
		private $mail;
		function __construct()
		{
			echo 'We are sorry about the mailer system do not in use yet.';
			// $mail->isSMTP();
			// $mail->Host = MAIL_HOST;
			// $mail->SMTPAuth = true;
			// $mail->Username = MAIL_USER;
			// $mail->Password = MAIL_PASS;
			// $mail->Port = MAIL_PORT;
			// $mail->From = MAIL_FROM;
			// $mail->FromName = MAIL_FROMName;
			// $mail->isHTML(true);
		}
	}
?>