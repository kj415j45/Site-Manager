<?php
	require_once "include/sql_connect.php";
	require_once "include/public_function.php";
	session_start();
	
	if(isset($_POST["username"])){
		SQL::SELECT("password,usergroup",
					"users",
					"username='".$_POST["username"]."'");
		$assoc=SQL::getAssoc(SQL::getResult());
		if($assoc==null){
			if(preg_match("/[a-zA-Z]\\w{3,15}/",$_POST["username"],$match)){
				if(strcmp($match[0],$_POST["username"])==0){
				   $u_name_flag=true;
				}
			}
			if(!$u_name_flag){
				js_message("用户名不合法");
				page_jump($site_host."regist.php",0);
				exit(0);
			}
			if(!preg_match("/[a-z0-9]{32}/",$_POST["md5password"])){
				js_message("密码在传输过程中遭到修改!");
				page_jump($site_host."regist.php",0);
				exit(0);
			}
			SQL::INSERT("users",
						"username,password,usergroup,regist_time,last_time",
						"'{$_POST["username"]}','{$_POST["md5password"]}','user','".date("YmdHis",time())."','".date("YmdHis",time())."'");
			
			SQL::SELECT("id",
			            "users",
			            "username='{$_POST['username']}'");
			$assoc=SQL::getAssoc(SQL::getResult());    
			            
			$_SESSION["user_id"]=$assoc["id"];//设置session
			$_SESSION["username"]=$_POST["username"];
			$_SESSION["usergroup"]="用户";
				
			SQL::INSERT("userinfo",
			            "name",
			            "NULL");
				
			page_jump($site_host."index.php",0);
		}else{
			js_message("用户名已存在!");
			page_jump($site_host."regist.php",0);
		}
	}
	
	if(!isset($_GET["check_username"])){
		require("regist.html.php");
	}else{
		SQL::query("SELECT password,usergroup FROM users WHERE username='".$_GET["check_username"]."'");
		$assoc=SQL::getAssoc(SQL::getResult());
		if($assoc!=null){
			echo $_GET["check_username"];
		}
	}
