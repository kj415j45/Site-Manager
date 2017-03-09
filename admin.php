<?php
	require "include/public_function.php";
	session_start();
	if($_SESSION["usergroup"]=="admin")
		require "admin.html.php";
	else
		page_jump("index.php",0);
