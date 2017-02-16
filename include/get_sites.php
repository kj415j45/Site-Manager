<?php
	session_start();
	require_once __DIR__."/sql_connect.php";
	require_once __DIR__."/public_function.php";
	
	SQL::query("SELECT site_name FROM sites");
	$assoc=mysqli_fetch_assoc(SQL::getResult());
	show($assoc);
	foreach($assoc as $site){
		echo '<option>'.$site.'</option>';
	}
?>