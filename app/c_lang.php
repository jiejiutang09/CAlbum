<?php
	require_once(dirname(__FILE__).'/../plugin/DatabaseInterface/database.php');
?>
<?php
	class Lang
	{
		private $syslang;
		function __construct()
		{
			$db = new Database();
			$data = $db->get('system','language','sid','1');
			$lang = $data['language'];
			$data = $db->get('language','lid','language',$lang);
			if($data['lid'] != null)
				$this->syslang = $lang;

		}
		function getString($string)
		{
			$db = new Database();
			$data = $db->get('language',$string,'language',$this->syslang);
			return $data[$string];
		}
	}
?>