<div class="container-fluid">
	<a class="navbar-brand" href="index.php"><?php echo $sysinfo->getSysInfo('title'); ?></a>
	<div class="collspace navbar-collspace">
		<?php if(!$userinfo->isLogin()):?>
			<a href="forgetpass.php"><button class="btn btn-default navbar-btn navbar-right"><?php echo $lang->get('forgetpass')?></button></a>
			<form class="navbar-form navbar-right" action="app/p_login.php" method="POST">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="<?php echo $lang->get('username');?>">
					<input type="password" name="password" class="form-control" placeholder="<?php echo $lang->get('password');?>">
					<button type="submit" class="btn btn-default"><?php echo $lang->get('login')?></button>
				</div>
			</form>
		<?php endif?>
		<?php if($userinfo->isLogin()):?>
			<ul class="nav navbar-nav">
				<li><a href="systemsetting.php"><?php echo $lang->get('systemsetting')?></a></li>
				<li><a href="userdata.php"><?php echo $lang->get('accountsetting')?></a></li>
			</ul>
			<div class="navbar-right">
				<p class="navbar-text">
					<?php echo $lang->get('hi')?><a href="userdata.php" class="navbar-link"> <?php echo $userinfo->getUserInfo('username')?></a>
				</p>
				<a href="app/p_logout.php"><button class="btn btn-default navbar-btn"><?php echo $lang->get('logout')?></button></a>
			</div>
		<?php endif;?>
	</div>
</div>