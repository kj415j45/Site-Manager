<?php
	session_start();
	require_once "include/sql_connect.php";
	require_once "include/public_function.php";
	require_once "class/Parsedown.class.php";
	
	if(isset($_GET["id"])){//TODO 最近的活动
	    $Parsedown = new Parsedown();
		SQL::SELECT("*",
		            "sites",
		            "id='{$_GET['id']}'");
		$assoc=SQL::getAssoc(SQL::getResult());
	}else{
		page_jump($site_host."index.php",0);
	}
    require "site.html.php";
