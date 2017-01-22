<?php
	session_start();
	require_once __DIR__."/sql_connect.php";
	require_once __DIR__."/public_function.php";
	
	if(isset($get_activity_id)){
		SQL::query("SELECT activity_name,username,activity_describe,start_time,end_time,site_name FROM activities,users,sites WHERE activities.author_id = users.id AND site_id = sites.id AND activities.id = ".$get_activity_id);
		$assoc=mysqli_fetch_assoc(SQL::getResult());
		$start_time=strtotime($assoc["start_time"]);
		$end_time=strtotime($assoc["end_time"]);
		$now=time();
		echo '<h1 class="page-header">活动:'.$assoc["activity_name"].'<small>';
		if($now<$start_time){
			echo '<span class="label label-warning">即将开始</span>';
		}else if($now>$end_time){
			echo '<span class="label label-default">已结束</span>';
		}else{
			echo '<span class="label label-success">正在进行</span>';
		}
		echo '</small></h1>';
		echo '<ul class="list-inline">';
		echo '<li><big><span class="label label-info">发起人:'.$assoc["username"].'</span></big></li>';
		echo '<li><big><span class="label label-warning">开始时间:'.$assoc["start_time"].'</span></big></li>';
		echo '<li><big><span class="label label-success">结束时间:'.$assoc["end_time"].'</span></big></li>';
		echo '<li><big><span class="label label-info">活动场地:'.$assoc["site_name"].'</span></big></li>';
		echo '</ul>';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading">详细介绍</div>';
		echo '<div class="panel-body">'.$assoc["activity_describe"].'</div>';
		echo '</div>';
	}else if(isset($get_user_activities)){
		SQL::query("SELECT activities.id,activity_name,username,activity_describe,start_time FROM activities,users WHERE author_id=users.id AND username='".$get_user_activities."'");
		while($row=SQL::getResult()->fetch_assoc()){    
			$assoc[]=$row;
		}
		$activities_count=count($assoc);
		for($i=0;$i<$activities_count;$i++){
			echo "<tr>";
			echo "<td>".$assoc["$i"]['id']."</td>";
			echo "<td><a href=".$site_host."activity.php?id=".$assoc["$i"]['id'].">".$assoc["$i"]['activity_name']."</a></td>";
			echo "<td>".$assoc["$i"]['username']."</td>";
			echo "<td>".$assoc["$i"]['activity_describe']."</td>";
			echo "<td>".$assoc["$i"]['start_time']."</td>";
			echo "</tr>";
		}
	}else if($get_activities==true){
		SQL::query("SELECT activities.id,activity_name,username,activity_describe,start_time FROM activities,users WHERE activities.author_id = users.id");
		while($row=SQL::getResult()->fetch_assoc()){    
            $assoc[]=$row;
        }
		$activities_count=count($assoc);
		for($i=0;$i<$activities_count;$i++){
			echo "<tr>";
			echo "<td>".$assoc["$i"]['id']."</td>";
			echo "<td><a href=".$site_host."activity.php?id=".$assoc["$i"]['id'].">".$assoc["$i"]['activity_name']."</a></td>";
			echo "<td>".$assoc["$i"]['username']."</td>";
			echo "<td>".$assoc["$i"]['activity_describe']."</td>";
			echo "<td>".$assoc["$i"]['start_time']."</td>";
			echo "</tr>";
		}
	}else{
		page_jump($site_host."activities.php",0);
	}
?>