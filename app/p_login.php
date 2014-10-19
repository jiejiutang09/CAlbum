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
	header('Location: ../index.php');
	exit;
?>