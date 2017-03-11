<?php
	session_start();
	require_once "include/sql_connect.php";
    require_once "include/public_function.php";
	if($_SESSION['usergroup']!='管理员'){
		page_jump('index.php',0);
	}
	if(isset($_POST["site_id"])&&$_POST["site_id"]!='0'){
		SQL::UPDATE("sites",
					"site_name='{$_POST['site_name']}',site_describe='{$_POST['site_describe']}'",
					"id='{$_POST['site_id']}'");
		page_jump('sites.php',0);
	}else if($_POST["site_id"]=='0'){
		SQL::INSERT("sites",
					"site_name,site_describe",
					"'{$_POST['site_name']}','{$_POST['site_describe']}'");
		page_jump('sites.php',0);
	}
	if(isset($_GET["id"])){//GET中定义了id则是编辑
		SQL::SELECT("site_name,site_describe",
					"sites",
					"id='{$_GET['id']}'");
		$assoc=SQL::getAssoc(SQL::getResult());
		$name=$assoc['site_name'];
		$site_describe=$assoc['site_describe'];
	}
    require "edit_site.html.php";
