<?php
	require "include/public_function.php";
	session_start();
	if($_SESSION["usergroup"]=="管理员")
		require "admin.html.php";
	else
		page_jump("index.php",0);
