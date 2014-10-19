<?php
	class UserInfo
	{
		private $user;
		function __construct()
		{
			if(!session_id())
				session_start();
			$this->user = isset($_SESSION['uid'])?$_SESSION:'';
		}
		function isLogin()
		{
			if($this->user === '')
				return false;
			else
				return true;
		}
		function getUserInfo($para = null)
		{
			if($para === null)
				return $this->user;
			else
				return $this->user[$para];
		}
	}
?>