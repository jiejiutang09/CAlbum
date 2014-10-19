<?php
	require_once(dirname(__FILE__).'/../plugin/DatabaseInterface/database.php');
?>
<?php
	$db = new Database();
	$data = $db->get('user','*','username',$_POST['username']);

	$cost = 8;
	$salt = chr(13).chr(25).chr(26).chr(30).chr(12).chr(17).chr(15).chr(5).chr(8).chr(3).chr(9).chr(1).chr(11).chr(41).chr(53).chr(58).chr(4).chr(32).chr(23).chr(21).chr(62).chr(57);

	$password = password_hash($_POST['password'],PASSWORD_BCRYPT,['cost'=>$cost,'salt'=>$salt]);
	if($data['password'] === $password)
	{
		$field = array();
		$value = array();

		if($_POST['newpassword'] !== '' && $_POST['confirm_newpassword'] !== '')
		{
			if($_POST['newpassword'] === $_POST['confirm_newpassword'])
			{
				$password = password_hash($_POST['newpassword'],PASSWORD_BCRYPT,['cost'=>$cost,'salt'=>$salt]);
				array_push($field, 'password');
				array_push($value, $password);
			}
		}

		if($_POST['email'] !== '')
		{
			array_push($field, 'email');
			array_push($value, $_POST['email']);
		}
		if (!empty($field))
			$db->modify('user',$field,$value,'uid',$data['uid']);
	}
	if(!session_id())
		session_start();
	session_destroy();
	header('Location: ../index.php');
?>