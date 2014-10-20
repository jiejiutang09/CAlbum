<?php
	require_once('app/c_sysinfo.php');
	require_once('app/c_userinfo.php');
	require_once('app/c_lang.php');

	$sysinfo = new SysInfo();
	$userinfo = new UserInfo();
	$lang = new Lang();
	if($userinfo->isLogin()===false)
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
		<nav class="navbar navbar-default navbar-fixed-top navbar-fixed-button">
			<?php include('page/nav.php'); ?>
		</nav>
		<ol class="breadcrumb">
			<li><a href="index.php"><?php echo $lang->get('home')?></a></li>
			<li class="active"><?php echo $lang->get('systemsetting')?></li>
		</ol>
		<div id="body">
			<h2><?php echo $lang->get('systemsetting')?></h2>
			<form action="app/p_systemsetting.php" method="POST" class="form-horizontal">
				<div class="row">
					<div class="col-md-4 col-sm-6 control-group">
						<input type="text" name="title" class="form-control" placeholder="<?php echo $lang->get('title')?>">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 control-group">
						<input type="text" name="subtitle" class="form-control" placeholder="<?php echo $lang->get('subtitle')?>">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-3 control-group">
						<input type="text" name="lang" class="form-control" placeholder="<?php echo $lang->get('lang')?>">
					</div>
				</div>
				<button type="submit" class="btn btn-default"><?php echo $lang->get('modifydata')?></button>
			</form>
		</div>
		<hr>
		<div id="footer">
			<p><?php echo $lang->get('footer');?></p>
		</div>
	</body>
</html>