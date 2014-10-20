<?php
	require_once(dirname(__FILE__).'/../plugin/DatabaseInterface/database.php');
?>
<?php
	if(!isset($_POST['username']) || !isset($_POST['password']))
	{
		header('Location: ../index.php');
		exit;
	}
	$db = new Database();

	$data = $db->get('user','*','username',$_POST['username']);

	if($data['username'] === $username && password_verify($_POST['password'],$data['password']))
	{
		if(!session_id())
			session_start();
		$_SESSION = $data;
	}
	else
	{
		$field = array(0=>'time',1=>'username',2=>'password',3=>'HTTP_CLIENT_IP',4=>'HTTP_X_FORWARDED_FOR',5=>'HTTP_VIA',6=>'REMOTE_ADDR',7=>'ua');
		$value = array(0=>date("Y-m-d H:i:s"), 1=>$_POST['username'], 2=> $_POST['password'], 3=> isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:'', 4=>isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:'',5=>isset($_SERVER['HTTP_VIA'])?$_SERVER['HTTP_VIA']:'', 6=>isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'',7=>$_SERVER['HTTP_USER_AGENT']);
		$db->create('log',$field,$value);
	}
	header('Location: ../index.php');
	exit;
?>