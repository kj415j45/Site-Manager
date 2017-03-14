<?php
	require "include/public_function.php";
	require "include/utils.php";
	session_start();
	if($_SESSION["usergroup"]=="管理员"){
		if(isset($_GET['delete_activity'])){
			deleteActivity($_GET['id']);
			page_jump("admin.php?ui=activities",0);
		}else{
			require "admin.html.php";
		}
	}else{
		page_jump("index.php",0);
	}
