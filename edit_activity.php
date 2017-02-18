<?php
	session_start();
	require_once "include/sql_connect.php";
    require_once "include/public_function.php";
	
	if(isset($_POST["activity_id"])){//TODO 处理表单
		
	}else if(isset($_GET["id"])){//GET中定义了id则是编辑
		SQL::query("SELECT username FROM activities,users WHERE users.id=activities.author_id AND activities.id='".$_GET["id"]."'");
		$edit_user=mysqli_fetch_assoc(SQL::getResult());
		if($_SESSION["username"]!=$edit_user["username"]||$_SESSION["usergroup"]!="管理员"){
			js_message("您没有权限编辑此活动!");
			page_jump($site_host,0);
		}
	}
    require "edit_activity.html.php";
?>