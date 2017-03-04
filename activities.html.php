<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name ?>-活动列表</title>

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
                    <h1 class="page-header">活动列表</h1>
                    <table class="table table-condensed table-striped">
                        <tbody>
                            <tr>
                                <td class="hidden-xs">ID</td>
                                <td>活动名称</td>
                                <td>发起人</td>
                                <td class="hidden-xs">开始时间</td>
                            </tr>
							<?php
								if(isset($_GET["id"])){
									$get_activity_id=$_GET["id"];
								}else if(isset($_GET["user"])){
									$get_user_activities=$_GET["user"];
								}else{
									$get_activities=true;
								}
								require "include/get_activity.php";
							?>
                        </tbody>
                    </table>
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