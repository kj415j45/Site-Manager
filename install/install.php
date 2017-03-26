<?php
    require_once "../include/public_function.php";
    if(file_exists('.install_lock')){
        exit(0);
    }else if(isset($_POST["sql_host"])){
        $mysql=mysqli_connect($_POST["sql_host"],$_POST["sql_username"],$_POST["sql_password"]);
        $fp=fopen("SiteManager.sql","r");
        $sql=fread($fp,filesize("SiteManager.sql"));
        fclose($fp);
        $sql=explode(";",$sql);
        for($i=0;$i<count($sql);$i++){
            mysqli_query($mysql,$sql[$i]);
        }
        mysqli_close($mysql);
        $config=fopen("../include/config.php","x");
        fwrite($config,"<?php\n\$sql_host=\"{$_POST['sql_host']}\";//mysql数据库地址\n\$sql_username=\"{$_POST['sql_username']}\";//mysql用户名\n\$sql_password=\"{$_POST['sql_password']}\";//mysql密码\n\$site_host=\"{$_POST['site_host']}\";//网站域名(结尾带'/')\n\$site_name=\"{$_POST['site_name']}\";//网站标题\n\$site_head=\"{$_POST['site_head']}\";//顶部横幅\n\$site_foot=\"{$_POST['site_foot']}\";//底部信息");
        fclose($config);
        require_once "../include/sql_connect.php";
        SQL::INSERT("users",
					"username,password,usergroup,regist_time,last_time",
					"'{$_POST["admin_username"]}','{$_POST["md5password"]}','admin','".date("YmdHis",time())."','".date("YmdHis",time())."'");
        SQL::INSERT("userinfo",
			            "name",
			            "NULL");
        $lock=fopen(".install_lock","x");
        fwrite($lock,"install_lock");
        fclose($lock);
        js_message("安装成功");
        page_jump($site_host,0);
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
                                <input type="text" class="form-control" name="sql_host" placeholder="" value="localhost">
                            <label class="control-label">数据库用户</label>
                                <input type="text" class="form-control" name="sql_username" placeholder="" value="root">
                            <label class="control-label">数据库密码</label>
                                <input type="password" class="form-control" name="sql_password" placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">访问时域名</label>
                                <input type="text" class="form-control" name="site_host" placeholder="" value="http://localhost/">
                            <label class="control-label">网站标题</label>
                                <input type="text" class="form-control" name="site_name" placeholder="" value="场地管理">
                            <label class="control-label">头部横幅</label>
                                <input type="text" class="form-control" name="site_head" placeholder="" value="场地管理">
                            <label class="control-label">底部信息</label>
                                <input type="text" class="form-control" name="site_foot" placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">管理员用户名</label>
                                <input type="text" class="form-control" name="admin_username" placeholder="root" value="root">
                            <label class="control-label">管理员密码</label>
                                <input type="password" class="form-control" id="admin_password" placeholder="" value="">
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
