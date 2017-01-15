<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    
    <script src="js/md5.js">
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <?php require "header.php" ?>
    
    <div class="container">
        <div class="col-sm-offset-4">
        <form class="form-horizontal" name="login_form" onsubmit="return false;" method="post" action="login.php" role="form">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="username" placeholder="名称">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="password" placeholder="密码">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-1 col-sm-5">
              <input type="hidden" name="md5password" id="md5password">
              <input type="hidden" name="method" id="method">
              <button type="submit" onClick="login()" class="btn btn-default btn-block">登陆</button>
              <button type="submit" onClick="regist()" class="btn btn-primary btn-block">注册</button>
            </div>
          </div>
        </form>
        </div>
    </div>
    
    <?php require "footer.php" ?>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>