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
	}
?>