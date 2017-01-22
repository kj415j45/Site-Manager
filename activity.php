<?php
	session_start();
	require_once "include/config.php";
	require_once "include/public_function.php";
	if(isset($_GET["id"])){
		$get_activity_id=$_GET["id"];
	}else{
		page_jump($site_host."activities.php",0);
		exit(0);
	}
    require "activity.html.php";
?>