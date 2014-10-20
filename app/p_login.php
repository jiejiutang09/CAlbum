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

	$cost = 8;
	$salt = chr(13).chr(25).chr(26).chr(30).chr(12).chr(17).chr(15).chr(5).chr(8).chr(3).chr(9).chr(1).chr(11).chr(41).chr(53).chr(58).chr(4).chr(32).chr(23).chr(21).chr(62).chr(57);
	$username = $_POST['username'];
	$password = password_hash($_POST['password'],PASSWORD_BCRYPT,['cost'=>$cost,'salt'=>$salt]);

	if($data['username'] === $username && $data['password'] === $password)
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