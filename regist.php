<?php
	require_once "include/sql_connect.php";
	require "include/public_function.php";
	session_start();
	
	if(isset($_POST["username"])){
		SQL::query("SELECT password,usergroup FROM users WHERE username='".$_POST["username"]."'");
		$assoc=mysqli_fetch_assoc(SQL::getResult());
		if($assoc==null){
			if(preg_match("/[a-zA-Z]\w{3,15}/",$_POST["username"],$match)){
				if(strcmp($match[0],$_POST["username"])==0){
				   $u_name_flag=true;
				}
			}
			if(!$u_name_flag){
				js_message("用户名不合法");
				page_jump($site_host."regist.php",0);
				exit(0);
			}
			if(preg_match("/[a-z0-9]{32}/",$_POST["md5password"])){
				js_message("密码在传输过程中遭到修改!");
				page_jump($site_host."regist.php",0);
				exit(0);
			}
			SQL::query("INSERT users(username,password,usergroup,regist_time,last_time) VALUES('".$_POST["username"]."','".$_POST["md5password"]."','user','".date("YmdHis",time())."','".date("YmdHis",time())."')");
			if(SQL::getResult()){//如果插入成功
				$_SESSION["username"]=$_POST["username"];//设置session
				$_SESSION["usergroup"]="用户";
				
				js_message("注册成功");
				page_jump($site_host."index.php",0);
			}else{
				js_message("注册失败");
				page_jump($site_host."regist.php",0);
			}
		}else{
			js_message("用户名已存在!");
			page_jump($site_host."regist.php",0);
		}
	}
	
	if(!isset($_GET["check_username"])){
		require("regist.html.php");
	}else{
		SQL::query("SELECT password,usergroup FROM users WHERE username='".$_GET["check_username"]."'");
		$assoc=mysqli_fetch_assoc(SQL::getResult());
		if($assoc!=null){
			echo $_GET["check_username"];
		}
	}
?>