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
            <div class="col-xs-12 col-sm-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-4 col-xs-6">
							<div class="thumbnail" style="border:0;">
								<img src="userhead/<?php echo file_exists(__DIR__."/userhead/".$_GET["user"])?$_GET["user"]:".default" ?>" class="img-circle">
							</div>
						</div>
						<div class="col-md-8 col-xs-6">
							<h4><?=$_GET['user'] ?>
								<div class="pull-right">
									<?php if($_SESSION["username"]==$_GET["user"]||$_SESSION["usergroup"]=="管理员"){?>
                                        <a href="edit_userinfo.php?user=<?=$_GET['user'] ?>" role="button">
                                            <span class="glyphicon glyphicon-pencil"></span> 
                                        </a>
                                    <?php }?>
								</div>
								<small>
								    <?php if(strlen($assoc['name'])>0){?>
                                    <?='('.$assoc['name'].')' ?>
                                    <?php }?>
								</small>
							</h4>
                                <?php if(strlen($assoc['telephone'])>0){?>
                                <?='电话: '.$assoc['telephone'] ?>
                                <?php }?>
							<br />
                                <?php if(strlen($assoc['qq'])>0){?>
                                <?='QQ: '.$assoc['qq'] ?>
                                <?php }?>
						</div>
					</div>
				</div>
            </div>
			<div class="col-xs-12 col-sm-8">
				<h2>参与的活动</h2>
			    <table class="table table-condensed table-striped">
                    <tbody>
                        <tr>
                            <td class="hidden-xs">ID</td>
                            <td>活动名称</td>
                            <td>发起人</td>
                            <td class="hidden-xs">开始时间</td>
                        </tr>
						<?php
							$get_user_join_activities=$_GET['user'];
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
