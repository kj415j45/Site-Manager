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
	}else if($get_by_admin){
		for($i=0;$i<$n;$i++){
			echo '<tr>';
            echo '<td class="hidden-xs">'.$assoc[$i]['id'].'</td>';
            echo '<td><a href="site.php?id='.$assoc[$i]['id'].'">'.$assoc[$i]['site_name'].'</a></td>';
            echo '<td><big>';
			echo '<a href="edit_site.php?id='.$assoc[$i]['id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="编辑"></span></a>';
			echo '<a class="text-danger" onClick="deleteSite(\''.$assoc[$i]['id'].'\',\''.$assoc[$i]['site_name'].'\');"><span class="glyphicon glyphicon-remove" aria-hidden="true" title="删除"></span></a>';
			echo '</big></td></tr>';
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
