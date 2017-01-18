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
	<!-- 导入输入校验 -->
	<script src="js/login_check.js"></script>
	<!-- 登录/注册函数 -->
    <script language="javascript">
        function login(){
            document.getElementById("md5password").value=hex_md5(document.getElementById("password").value);
            document.getElementById("method").value="login";
            document.getElementById("password").disabled=true;
            document.login_form.submit();
        }
        function regist(){
            document.getElementById("md5password").value=hex_md5(document.getElementById("password").value);
            document.getElementById("method").value="regist";
            document.getElementById("password").disabled=true;
            document.login_form.submit();
        }
    </script>
  </head>
  <body>
    <!-- 头部开始 -->
    <?php require "include/header.html.php"; ?>
	<!-- 头部结束 -->
    <!-- 主容器开始 -->
    <div class="container">
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
							<span class="help-block">用户名必须字母开头，字母数字下划线组成，4-16个字符</span>
                            </div>
                        </div>
                        <div class="form-group col-sm-12" id="u_p">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input type="password" class="form-control" id="password" placeholder="密码" onblur="password_check()">
							<span class="help-block">密码长度限制为6-16位,且不能为纯字母或数字</span>
							</div>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="hidden" name="md5password" id="md5password">
                            <input type="hidden" name="method" id="method">
                            <button type="submit" onClick="login()" class="btn btn-default btn-block">登录</button>
                            <button type="submit" onClick="regist()" class="btn btn-primary btn-block">注册</button>
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
