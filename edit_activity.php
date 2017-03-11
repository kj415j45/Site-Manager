<?php
	session_start();
	require_once "include/sql_connect.php";
    require_once "include/public_function.php";
	
	unset($assoc);
	
	if(isset($_POST["activity_id"])&&$_POST["activity_id"]!='0'){
		SQL::UPDATE("activities,sites",
					"site_id=sites.id,activity_name='".$_POST["activity_name"]."',start_time='".$_POST["start_time"]."',end_time='".$_POST["end_time"]."',activity_describe='".$_POST["activity_describe"]."'",
					"activities.id='".$_POST["activity_id"]."' AND sites.site_name='".$_POST["site_name"]."';");//不考虑恶意修改(不验证session)
		if(SQL::getAffected_Rows()==1){
			js_message("更新成功");
		}else{
			js_message("更新失败");
		}
		page_jump("activity.php?id=".$_POST["activity_id"],0);
	}else if($_POST["activity_id"]=='0'){
		SQL::SELECT("id",
					"sites",
					"site_name='{$_POST['site_name']}'");
		$assoc=SQL::getAssoc(SQL::getResult());
		$site_id=$assoc["id"];
		SQL::INSERT("activities",
					"activity_name,site_id,author_id,start_time,end_time,activity_describe",
					"'{$_POST['activity_name']}','{$site_id}','{$_SESSION['user_id']}','{$_POST['start_time']}','{$_POST['end_time']}','{$_POST['']}'");
		if(SQL::getAffected_Rows()==1){
			js_message("添加成功");
		}else{
			js_message("添加失败");
		}
		page_jump("activities.php",0);
	}
	if(isset($_GET["id"])){//GET中定义了id则是编辑
		SQL::SELECT("username",
					"activities,users",
					"users.id=activities.author_id AND activities.id='".$_GET["id"]."'");
		$edit_user=SQL::getAssoc(SQL::getResult());
		if($_SESSION["username"]!=$edit_user["username"]&&$_SESSION["usergroup"]!="管理员"){
			js_message("您没有权限编辑此活动!");
			page_jump($site_host."activity.php?id=".$_GET["id"],0);
		}
		SQL::SELECT("activity_name,site_name,start_time,end_time,activity_describe",
					"activities,sites",
					"sites.id=site_id AND activities.id='".$_GET["id"]."'");
		$assoc=SQL::getAssoc(SQL::getResult());
		$activity_name=$assoc["activity_name"];
		$activity_site_name=$assoc["site_name"];
		$start_time=$assoc["start_time"];
		$end_time=$assoc["end_time"];
		$activity_describe=$assoc["activity_describe"];
	}
    require "edit_activity.html.php";
