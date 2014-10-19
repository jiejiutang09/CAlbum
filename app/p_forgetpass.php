<?php
	require_once(dirname(__FILE__).'/../plugin/DatabaseInterface/database.php');
	// require_once(dirname(__FILE__).'/../plugin/Mailer/mail.php');
?>
<?php
	if($_POST['email']!=='')
	{
		$db = new Database();
		$data = $db->get('user','*','email',$_POST['email']);
	}
?>