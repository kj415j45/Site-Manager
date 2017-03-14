<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name ?></title>

    <!-- Bootstrap样式表 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- 头部开始 -->
    <?php require "include/header.html.php"; ?>
	<!-- 头部结束 -->
	<!-- 主容器开始 -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">场地1</div>
					<div class="panel-body">Panel content</div>
				</div>
            </div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">场地1</div>
					<div class="panel-body">Panel content</div>
				</div>
            </div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">场地1</div>
					<div class="panel-body">Panel content</div>
				</div>
            </div>
        </div>
    </div>
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
  </body>
</html>