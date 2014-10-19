<?php
	require_once(dirname(__FILE__).'/../plugin/DatabaseInterface/database.php');
?>
<?php
	class SysInfo
	{
		private $sysinfo;
		function __construct()
		{
			$db = new Database();
			$this->sysinfo = $db->get('system','*','sid','1');
		}
		function getSysInfo($para = null)
		{
			if($para === null)
				return $this->sysinfo;
			else
				return $this->sysinfo[$para];
		}
	}
?>