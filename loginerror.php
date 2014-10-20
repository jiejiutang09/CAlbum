<?php
	require_once('app/c_sysinfo.php');
	require_once('app/c_userinfo.php');
	require_once('app/c_lang.php');
	require_once('plugin/DatabaseInterface/database.php');

	$sysinfo = new SysInfo();
	$userinfo = new UserInfo();
	$lang = new Lang();
	if($userinfo->isLogin()===false)
	{
		header('Location: index.php');
		exit;
	}
	$db = new Database();
	$log = $db->getOrderBy('log','*', 'logid', 'DESC');
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
			<li><a href="systemsetting.php"><?php echo $lang->get('systemsetting')?></a></li>
			<li class="active"><?php echo $lang->get('loginerror')?></li>
		</ol>
		<div id="body">
			<h2><?php echo $lang->get('loginerror')?></h2>
			<table class="table table-striped">
				<thead>
					<th><?php echo $lang->get('No')?></th>
					<th><?php echo $lang->get('time')?></th>
					<th><?php echo $lang->get('username')?></th>
					<th><?php echo $lang->get('password')?></th>
					<th>HTTP_CLIENT_IP</th>
					<th>HTTP_X_FORWORDED_FOR</th>
					<th>HTTP_VIA</th>
					<th>REMOTE_ADDR</th>
					<th><?php echo $lang->get('useragent')?></th>
				</thead>
				<tbody>
					<?php foreach($log as $key=>$value):?>
						<tr>
							<td><?php echo isset($value['logid'])?$value['logid']:''; ?></td>
							<td><?php echo isset($value['time'])?$value['time']:''; ?></td>
							<td><?php echo isset($value['username'])?$value['username']:''; ?></td>
							<td><?php echo isset($value['password'])?$value['password']:''; ?></td>
							<td><?php echo isset($value['HTTP_CLIENT_IP'])?$value['HTTP_CLIENT_IP']:''; ?></td>
							<td><?php echo isset($value['HTTP_X_FORWORDED_FOR'])?$value['HTTP_X_FORWORDED_FOR']:''; ?></td>
							<td><?php echo isset($value['HTTP_VIA'])?$value['HTTP_VIA']:''; ?></td>
							<td><?php echo isset($value['REMOTE_ADDR'])?$value['REMOTE_ADDR']:''; ?></td>
							<td><?php echo isset($value['ua'])?$value['ua']:''; ?></td>
						</tr>
					<?php endforeach?>
				</tbody>
			</table>
		</div>
		<hr>
		<div id="footer">
			<p><?php echo $lang->get('footer');?></p>
		</div>
	</body>
</html>