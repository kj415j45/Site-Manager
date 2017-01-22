<?php
    require_once "include/sql_connect.php";
    require_once "include/public_function.php";
    session_start();

	/**
     * 如果方式是POST就处理登录数据
     */
    if(isset($_POST["username"])){
		if(preg_match("/[a-zA-Z]\\w{3,15}/",$_POST["username"],$match)){
			if(strcmp($match[0],$_POST["username"])==0){
			   $u_name_flag=true;
			}
		}
		if(!$u_name_flag){
			js_message("用户名不合法");
			page_jump($site_host."login.php",0);
			exit(0);
		}
		if(!preg_match("/[a-z0-9]{32}/",$_POST["md5password"])){
			js_message("密码在传输过程中遭到修改!");
			page_jump($site_host."login.php",0);
			exit(0);
		}
        SQL::query("SELECT password,usergroup FROM users WHERE username='".$_POST["username"]."'");
        $assoc=mysqli_fetch_assoc(SQL::getResult());
		if($assoc!=null){
			if($assoc["password"]!=$_POST["md5password"]){//如果密码错误
				js_message("密码错误");
				page_jump($site_host."login.php",0);
			}else{
				$_SESSION["username"]=$_POST["username"];//设置session
				$_SESSION["usergroup"]=$assoc["usergroup"]=="admin"?"管理员":"用户";
				
				SQL::query("UPDATE users SET last_time='".date("YmdHis",time())."' WHERE username='".$_POST["username"]."'");//更新最后上线时间
				
				js_message("欢迎回来,".$_SESSION["usergroup"].$_SESSION["username"]);
				page_jump($site_host."index.php",0);
			}
		}else{
			js_message("用户名不存在");
			page_jump($site_host."login.php",0);
		}
    }
	
	/**
     * 如果方式是GET就要求登录
     */
    if(!isset($_GET["action"])||$_GET["action"]=="login"){//没有写操作或者操作是登录
        if(isset($_SESSION["username"])){//已经登录
            page_jump($site_host."index.php",0);
        }else{//输出登录界面
            $login_page=true;
            require_once "login.html.php";
        }
    }else if($_GET["action"]=="logout"){//操作是退出
        unset($_SESSION["username"]);//移除session
        unset($_SESSION["usergroup"]);
        js_message("您已退出");
        page_jump($site_host."index.php",0);
    }
?>