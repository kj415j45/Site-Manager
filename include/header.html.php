<?php session_start();?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><?php echo $site_head ?></a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="true">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<nav id="bs-navbar" class="navbar-collapse collapse" aria-expanded="true">
		    <ul class="nav navbar-nav">
				<li <?php if($index_page){echo 'class="active"';}?>><a href="index.php">主页</a></li>
				<li <?php if($activities_page){echo 'class="active"';}?>><a href="activities.php">活动</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					if(isset($_SESSION["username"])){
						require __DIR__."/userinfo.html.php";
					}else if(!$login_page){
						echo '<li><a href="login.php">登录</a></li>';
					}
				?>
			</ul>
		</nav>
    </div>
</nav>