<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name ?></title>

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
            <div class="col-md-12">
                <h1 class="page-header">活动:膜法师大会<small><span class="label label-warning">即将开始</span><span class="label label-success">正在进行</span><span class="label label-default">已结束</span></small></h1>
					<ul class="list-inline">
						<li><big><span class="label label-info">发起人:长者</span></big></li>
						<li><big><span class="label label-warning">开始时间:2017-01-22 11:59:59</span></big></li>
						<li><big><span class="label label-success">结束时间:2017-01-22 11:59:60</span></big></li>
						<li><big><span class="label label-info">活动场地:新闻发布会</span></big></li>
					</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						详细介绍
					</div>
					<div class="panel-body">
						今天我作为一个长者在这里，有必要跟你们讲讲人生的经验
					</div>
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