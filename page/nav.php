<div class="container-fluid">
	<a class="navbar-brand" href="index.php"><?php echo $sysinfo->getSysInfo('title'); ?></a>
	<div class="collspace navbar-collspace">
		<?php if(!$userinfo->isLogin()):?>
			<form class="navbar-form navbar-right" action="app/p_login.php" method="POST">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="<?php echo $lang->getString('username');?>">
					<input type="password" name="password" class="form-control" placeholder="<?php echo $lang->getString('password');?>">
					<button type="submit" class="btn btn-default"><?php echo $lang->getString('login')?></button>
				</div>
			</form>
		<?php endif?>
		<?php if($userinfo->isLogin()):?>
			<div class="navbar-right">
				<p class="navbar-text">
					Hi,<a href="userdata.php" class="navbar-link"> <?php echo $userinfo->getUserInfo('username')?></a>
				</p>
				<a href="app/p_logout.php"><button class="btn btn-default navbar-btn"><?php echo $lang->getString('logout')?></button></a>
			</div>
		<?php endif;?>
	</div>
</div>