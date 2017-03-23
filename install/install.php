<?php
    if(file_exists('.install_lock')){
        exit(0);
    }else{
        $mysql=mysqli_connect($_POST["sql_host"],$_POST["sql_user"],$_POST["sql_password"]);
        mysqli_query($mysql,"source 'SiteManager.sql';");
        mysqli_close($mysql);
        $lock=fopen(".install_lock","x");
        fwrite($lock,"install_lock");
        fclose($lock);
    }
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>Site-Manager安装</title>
    <!-- Bootstrap样式表 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 center-block" style="float:none;">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Site-Manager安装</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="install_form" name="install_form" onsubmit="return false;" method="post" action="install.php">
                        <div class="form-group">
                            <label class="control-label">数据库地址</label>
                                <input type="text" class="form-control" name="sql_host" placeholder="localhost" value="localhost">
                            <label class="control-label">数据库用户</label>
                                <input type="text" class="form-control" name="sql_user" placeholder="root" value="root">
                            <label class="control-label">数据库密码</label>
                                <input type="password" class="form-control" name="sql_password" placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <label class="control-label">管理员用户名</label>
                                <input type="text" class="form-control" name="admin_user" placeholder="root" value="root">
                            </div>
                            <div class="input-group">
                            <label class="control-label">管理员密码</label>
                                <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="md5password" id="md5password">
                            <button type="submit" onClick="post()" class="btn btn-primary btn-block">一键安装</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- 导入md5加密 -->
    <script src="../js/md5.min.js"></script>
    <script>
        function post(){
            document.getElementById("md5password").value=hex_md5(document.getElementById("admin_password").value);
            document.getElementById("admin_password").disabled=true;
            document.install_form.submit();
        }
    </script>
</body>
</html>