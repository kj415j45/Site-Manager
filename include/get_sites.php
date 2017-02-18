<?php
	session_start();
	require_once __DIR__."/sql_connect.php";
	require_once __DIR__."/public_function.php";
	
	unset($assoc);
	
	SQL::query("SELECT site_name FROM sites");
	while($row=SQL::getResult()->fetch_assoc()){    
		$assoc[]=$row;
	}
	$n=count($assoc);
	for($i=0;$i<$n;$i++){
		echo '<option';
		if($assoc[$i]['site_name']==$activity_site_name){
			echo ' selected=true';
		}
		echo '>'.$assoc[$i]['site_name'].'</option>';
	}
?>