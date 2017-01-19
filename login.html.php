<?php require_once "include/config.php"; ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name ?>-登录</title>

    <!-- Bootstrap样式表 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">

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
	<!-- 导入md5加密 -->
    <script src="js/md5.min.js"></script>
	<!-- 导入登录/注册函数 -->
	<script src="js/login.min.js"></script>
  </head>
  <body>
    <!-- 头部开始 -->
    <?php require "include/header.html.php"; ?>
	<!-- 头部结束 -->
    <!-- 主容器开始 -->
    <div class="container">
		<!-- 提醒开始 -->
		<div class="row" id="notice">
			
		</div>
		<!--提醒结束-->
        <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 center-block" style="float:none;">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4><?php echo $site_name; ?>-登录</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="login_form" name="login_form" onsubmit="return false;" method="post" action="<?php echo $site_host; ?>login.php" role="form">
                        <div class="form-group col-sm-12" id="u_n">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="用户名" onblur="username_check()">
							<!--<span class="help-block">用户名必须字母开头，字母数字下划线组成，4-16个字符</span>-->
                        </div>
                        </div>
                        <div class="form-group col-sm-12" id="u_p">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input type="password" class="form-control" id="password" placeholder="密码" onblur="password_check()">
							<!--<span class="help-block">密码长度限制为6-16位,且不能为纯字母或数字</span>-->
						</div>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="hidden" name="md5password" id="md5password">
                            <button type="submit" onClick="login()" class="btn btn-default btn-block">登录</button>
                            <button type="submit" onClick="window.location.href='regist.php'" class="btn btn-primary btn-block">注册</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
	<!-- 主容器结束 -->
    <!-- 底部开始 -->
    <?php require "include/footer.html.php"; ?>
    <!-- 底部结束 -->
  </body>
</html>
