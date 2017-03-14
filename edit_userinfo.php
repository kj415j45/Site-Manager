<?php
	session_start();
	require_once "include/sql_connect.php";
	require_once "include/public_function.php";
	
	if(isset($_POST['name'])){
	    SQL::UPDATE("userinfo",
	                "name='{$_POST['name']}',telephone='{$_POST[telephone]}',qq='{$_POST['qq']}'",
	                "id='{$_SESSION['user_id']}'");
	    page_jump("userinfo.php?user=".$_SESSION['username'],0);
	}else if($_SESSION["username"]!=$_GET["user"]&&$_SESSION["usergroup"]!="管理员"){
		js_message("您没有权限编辑此用户的信息!");
		page_jump($site_host."userinfo.php?user=".$_GET['user'],0);
	}
	SQL::SELECT("*",
				"userinfo",
				"id='{$_SESSION['user_id']}'");
	$assoc=SQL::getAssoc(SQL::getResult());
	$name=$assoc['name'];
	$telephone=$assoc['telephone'];
	$qq=$assoc['qq'];
    require "edit_userinfo.html.php";
