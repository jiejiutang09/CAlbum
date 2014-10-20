<?php
	require_once('app/c_sysinfo.php');
	require_once('app/c_userinfo.php');
	require_once('app/c_lang.php');

	$sysinfo = new SysInfo();
	$userinfo = new UserInfo();
	$lang = new Lang();
	if($userinfo->isLogin())
	{
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $sysinfo->getSysInfo('title')?></title>
		<!--jQuery From Google CDN-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><style type="text/css"></style>
		<!--jQuery UI From Google CDN-->
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<!--Bootstrap From maxcdn-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="sys/css/main.css">
	</head>
	<body>
		<header class="page-header">
			<?php include('page/header.php'); ?>
		</header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<?php include('page/nav.php'); ?>
		</nav>
		<ol class="breadcrumb">
			<li><a href="index.php"><?php echo $lang->get('home')?></a></li>
			<li class="active"><?php echo $lang->get('forgetpass')?></li>
		</ol>
		<div id="body">
			<h2><?php echo $lang->get('forgetpass')?></h2>
			<form action="app/p_forgetpass.php" method="POST" class="form-horizontal">
				<div class="row">
					<div class="col-md-5 col-sm-6 alert alert-info" role="alert"><center><?php echo $lang->get('forgetemail')?><center></div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 control-group">
						<input type="text" name="email" class="form-control" placeholder="<?php echo $lang->get('email')?>">
					</div>
				</div>
				<button class="btn btn-default" type="submit"><?php echo $lang->get('submit')?></button>
			</form>
		</div>
		<hr>
		<div id="footer">
			<p><?php echo $lang->get('footer');?></p>
		</div>
	</body>
</html>