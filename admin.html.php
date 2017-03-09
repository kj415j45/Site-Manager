<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name ?>-管理</title>

    <!-- Bootstrap样式表 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- 头部开始 -->
	<?php session_start();?>
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand"><?=$site_head ?></a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="true">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<nav id="bs-navbar" class="navbar-collapse collapse" aria-expanded="true">
				<ul class="nav navbar-nav">
					<li id="button_activities" class="active"><a onClick="show('activities');" href="#">活动管理</a></li>
					<li id="button_sites"><a onClick="show('sites');" href="#">场地管理</a></li>
					<li id="button_users"><a onClick="show('users');" href="#">用户管理</a></li>
					<li id="button_global_setting"><a onClick="show('global_setting');" href="#">全局设置</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">回到主页</a></li>
				</ul>
			</nav>
		</div>
	</nav>
	<!-- 头部结束 -->
	<!-- 主容器开始 -->
	<?php require "include/admin_activities.html.php" ?>
	<?php require "include/admin_sites.html.php" ?>
	<?php require "include/admin_users.html.php" ?>
	<?php require "include/admin_global_setting.html.php" ?>
    <!-- 主容器结束 -->
    <!-- 底部开始 -->
    <?php require "include/footer.html.php" ?>
    <!-- 底部结束 -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- 导入jQuery(Bootstrap所需前置及jQ插件所需依赖) -->
    <script src="js/jquery.min.js"></script>
    <!-- 导入Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
		function show(name){
			$('#admin_activities').addClass('hidden');
			$('#admin_sites').addClass('hidden');
			$('#admin_users').addClass('hidden');
			$('#admin_global_setting').addClass('hidden');
			$('#button_activities').removeClass('active');
			$('#button_sites').removeClass('active');
			$('#button_users').removeClass('active');
			$('#button_global_setting').removeClass('active');
			$('#admin_'+name).removeClass('hidden');
			$('#button_'+name).addClass('active');
		}
	</script>
  </body>
</html>