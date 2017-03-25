<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name ?>-编辑个人信息</title>

    <!-- Bootstrap样式表 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">

    <!-- 导入md5加密 -->
    <script src="js/md5.min.js"></script>
    <!-- 导入登录/注册函数 -->
	<script src="js/login.js"></script>
  </head>
  <body>
    <!-- 头部开始 -->
    <?php require "include/header.html.php"; ?>
	<!-- 头部结束 -->
	<!-- 主容器开始 -->
  <div class="container">
      <ul class="nav nav-pills">
          <li role="presentation" class="editb" id="b_person"><a onClick="show('person');">个人信息</a>
          </li>
          <li role="presentation" class="editb" id="b_head"><a onClick="show('head');">修改头像</a>
          </li>
          <li role="presentation" class="editb" id="b_password"><a onClick="show('password');">修改密码</a>
          </li>
      </ul>
      <div class="row edit" id="e_person">
          <h1 class="page-header">编辑个人信息</h1>
          <form class="form-horizontal" method="post" action="<?=$site_host ?>edit_userinfo.php">
              <div class="form-group">
                  <label class="col-md-1 control-label text-left">真实姓名</label>
                  <div class="col-md-11">
                      <input type="text" class="form-control" name="name" placeholder="你的名字" value="<?=$name ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-1 control-label text-left">电话号码</label>
                  <div class="col-md-11">
                      <input type="text" class="form-control" name="telephone" placeholder="电话(不能超过11位)" value="<?=$telephone ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-1 control-label text-left">QQ号码</label>
                  <div class="col-md-11">
                      <input type="text" class="form-control" name="qq" placeholder="QQ" value="<?=$qq ?>">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-offset-11 col-md-1">
                      <input type="hidden" name="user_id" value="<?=$user_id ?>">
                      <button type="submit" class="btn btn-primary">提交</button>
                  </div>
              </div>
          </form>
      </div>
      <div class="row edit" id="e_head">
          <h1 class="page-header">上传头像</h1>
          <form class="form-horizontal" method="post" action="<?=$site_host ?>userhead/userhead_upload.php" enctype="multipart/form-data">
              <div class="form-group">
                  <input type="file" class="form-control" name="file" accept="image/gif,image/png,image/jpeg">
                  <label>头像仅可使用png,jpg,jpeg,gif格式,最大大小为2M</label>
              </div>
              <div class="form-group">
                  <div class="col-md-offset-11 col-md-1">
                      <input type="hidden" name="user_id" value="<?=$user_id ?>">
                      <button type="submit" class="btn btn-primary">提交</button>
                  </div>
              </div>
          </form>
      </div>
      <div class="row edit" id="e_password">
          <h1 class="page-header">修改密码</h1>
          <!-- 提醒开始 -->
		<div class="row" id="notice">
			
		</div>
		<!--提醒结束-->
          <form class="form-horizontal" id="password_change_form" name="password_change_form" onsubmit="return false;" method="post" action="<?=$site_host ?>edit_userinfo.php">
            <div class="form-group">
                <label class="col-md-1 control-label text-left">原密码</label>
                <div class="col-md-11">
                    <input type="password" class="form-control" id="now_password" placeholder="原密码">
                </div>
            </div>
            <div class="form-group" id="u_p">
                <label class="col-md-1 control-label text-left">新密码</label>
                <div class="col-md-11">
                    <input type="password" class="form-control" id="password" placeholder="新密码" onblur="password_check()">
                </div>
            </div>
            <div class="form-group" id="c_u_p">
                <label class="col-md-1 control-label text-left">确认密码</label>
                <div class="col-md-11">
                    <input type="password" class="form-control" id="confirm_password" placeholder="确认密码" onblur="confirm_password_check()">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-11 col-md-1">
                    <input type="hidden" id="u_p_c" value="false">
					<input type="hidden" id="c_u_p_c" value="false">
                    <input type="hidden" name="user_id" value="<?=$user_id ?>">
                    <input type="hidden" name="now_md5password" id="now_md5password">
                    <input type="hidden" name="md5password" id="md5password">
                    <button type="submit" class="btn btn-primary" onClick="password_change();">提交</button>
                </div>
            </div>
          </form>
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

    <script>
      function password_change(){
        if($("#u_p_c").val()=="true"&&$("#c_u_p_c").val()=="true"){
            document.getElementById("now_md5password").value=hex_md5(document.getElementById("now_password").value);
            document.getElementById("md5password").value=hex_md5(document.getElementById("password").value);
            document.getElementById("password").disabled=true;
            document.password_change_form.submit();
	    }
      };
      function show(page){
        $(".edit").addClass("hidden");
        $(".editb").removeClass("active");
        $("#e_"+page).removeClass("hidden");
        $("#b_"+page).addClass("active");
      };
      show("person");
    </script>
  </body>
</html>
