<?php
	require_once('plugin/php/database.php');
?>
<?php
	$db = new Database();
	if($db->getLog()[0] === false)
	{
		echo 'Connection Error';
	}
	else
	{
		echo 'Connection Success';
		$username='root';
		$password='root';
		$options=[
			'cost'=>12,
		];
		$password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
		echo '<br>password_hash = '.$password_hash;
		$db->create('user',array(0=>'username',1=>'password'),array(0=>$username,1=>$password_hash));
		if($db->getLog()[0] === true)
		{
			echo '<br>Create Success';
		}
		else
		{
			echo '<br>Create Error';
		}
	}
?>