<?php
	session_start();
	require_once __DIR__."/sql_connect.php";
	require_once __DIR__."/public_function.php";
	require_once __DIR__."/../class/Parsedown.class.php";
	
	unset($assoc);
	SQL::query("SELECT * FROM sites");
	$Parsedown = new Parsedown();
	while($row=SQL::getResult()->fetch_assoc()){    
		$assoc[]=$row;
	}
	$n=count($assoc);
	if($get_by_editor){
		for($i=0;$i<$n;$i++){
			echo '<option';
			if($assoc[$i]['site_name']==$activity_site_name){
				echo ' selected=true';
			}
			echo '>'.$assoc[$i]['site_name'].'</option>';
		}
	}else{
		for($i=0;$i<$n;$i++){
			echo '<div class="col-xs-12 col-sm-6 col-md-4">';
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading"><a href=site.php?id='.$assoc[$i]['id'].'>'.$assoc[$i]['site_name'].'</a></div>';
			echo '<div class="panel-body">'.$Parsedown->text($assoc[$i]['site_describe']).'</div>';
			echo '</div>';
			echo '</div>';
		}
	}
