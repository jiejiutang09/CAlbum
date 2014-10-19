<?php
	require_once(dirname(__FILE__).'/../plugin/DatabaseInterface/database.php');
?>
<?php
	$db = new Database();
	$field = array();
	$value = array();
	if($_POST['title']!=='')
	{
		array_push($field, 'title');
		array_push($value, $_POST['title']);
	}
	if($_POST['subtitle']!=='')
	{
		array_push($field, 'subtitle');
		array_push($value, $_POST['subtitle']);
	}
	if($_POST['lang']!=='')
	{
		array_push($field, 'language');
		array_push($value, $_POST['lang']);
	}
	array_push($field, 'time');
	array_push($value, date("Y-m-d H:i:s"));
	$db->modify('system',$field,$value,'sid','1');
	header('Location: ../index.php');
	exit;
?>