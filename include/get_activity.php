<?php
	session_start();
	require_once __DIR__."/sql_connect.php";
	require_once __DIR__."/public_function.php";
	require_once __DIR__."/../class/Parsedown.class.php";

	unset($assoc);

	if(isset($get_activity_id)){
		$Parsedown = new Parsedown();
		SQL::SELECT("activity_name,username,activity_describe,activity_note,start_time,end_time,site_name",
					"activities,users,sites",
					"activities.author_id = users.id AND site_id = sites.id AND activities.id = '".$get_activity_id."'");
		$assoc=SQL::getAssoc(SQL::getResult());
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
		echo '<div class="pull-right">';
		if($_SESSION["username"]!=NULL&&time()<$start_time){
			SQL::SELECT("*","`user-activity`","activity_id='{$_GET['id']}' AND user_id='{$_SESSION['user_id']}'");
			if(SQL::getAssoc(SQL::getResult())==NULL){
				echo '<a class="btn btn-success" href="join_activity.php?id='.$_GET["id"].'">加入</a>';
			}else{
				echo '<a class="btn btn-danger" href="exit_activity.php?id='.$_GET["id"].'">退出</a>';
			}
			echo '<span> </span>';
		}
		if($now<$start_time&&($_SESSION["username"]==$assoc["username"]||$_SESSION["usergroup"]=="管理员")){
			echo '<a class="btn btn-primary" href="edit_activity.php?id='.$_GET["id"].'">编辑</a>';
		}
		echo '</div>';
		echo '</small>';
		echo '</h1>';
		echo '<ul class="list-inline">';
		echo '<li><big><span class="label label-info">发起人:'.$assoc["username"].'</span></big></li>';
		echo '<li><big><span class="label label-warning">开始时间:'.$assoc["start_time"].'</span></big></li>';
		echo '<li><big><span class="label label-success">结束时间:'.$assoc["end_time"].'</span></big></li>';
		echo '<li><big><span class="label label-info">活动场地:'.$assoc["site_name"].'</span></big></li>';
		echo '</ul>';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading">详细介绍</div>';
		echo '<div class="panel-body">'.$Parsedown->text($assoc["activity_describe"]).'</div>';
		echo '</div>';
		if($assoc["activity_note"]!=NULL){
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading">备注</div>';
			echo '<div class="panel-body">'.$Parsedown->text($assoc["activity_note"]).'</div>';
			echo '</div>';
		}
		
		SQL::SELECT("name,username",
					"`user-activity`,users,userinfo",
					"activity_id='{$get_activity_id}' AND user_id=users.id AND user_id=userinfo.id");//TODO
		unset($assoc);
		while($row=SQL::getResult()->fetch_assoc()){
			$assoc[]=$row;
		}
		if($assoc!=NULL){
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading">参与者</div>';
			echo '<div class="panel-body">';
			$users_count=count($assoc);
			for($i=$users_count-1;$i>=0;$i--){
				echo '<a style="padding:0;" href="userinfo.php?user='.$assoc[$i]["username"].'"><img src="userhead/'.(file_exists(__DIR__."../userhead/".$assoc[$i]["username"])?$assoc[$i]["username"]:".default").'" class="img-circle" width=48 height=48>';
				echo ($assoc[$i]['name']==NULL?$assoc[$i]["username"]:$assoc[$i]['name']).' </a>';
			}	
			echo '</div>';
			echo '</div>';
		}
	}else if(isset($get_user_activities)){
		SQL::SELECT("activities.id,activity_name,username,activity_describe,start_time,end_time",
					"activities,users",
					"author_id=users.id AND username='".$get_user_activities."'");
		while($row=SQL::getResult()->fetch_assoc()){
			$assoc[]=$row;
		}
		$activities_count=count($assoc);
		for($i=$activities_count-1;$i>=0;$i--){
			$start_time=strtotime($assoc["$i"]["start_time"]);
			$end_time=strtotime($assoc["$i"]["end_time"]);
			$now=time();
			echo "<tr>";
			echo '<td class="hidden-xs">'.$assoc["$i"]['id']."</td>";
			echo "<td><a href=".$site_host."activity.php?id=".$assoc["$i"]['id'].">".$assoc["$i"]['activity_name']."</a>";
			if($now<$start_time){
				echo '<span class="label label-warning">即将开始</span>';
			}else if($now>$end_time){
				echo '<span class="label label-default">已结束</span>';
			}else{
				echo '<span class="label label-success">正在进行</span>';
			}
			echo "</td>";
			echo "<td>".$assoc["$i"]['username']."</td>";
			echo '<td class="hidden-xs">'.$assoc["$i"]['start_time']."</td>";
			echo "</tr>";
		}
	}else if($get_activities==true){
		SQL::SELECT("activities.id,activity_name,username,activity_describe,start_time,end_time",
					"activities,users",
					"activities.author_id = users.id",
					"ORDER BY activities.id");
		while($row=SQL::getResult()->fetch_assoc()){
            $assoc[]=$row;
        }
		$activities_count=count($assoc);
		for($i=$activities_count-1;$i>=0;$i--){
			$start_time=strtotime($assoc["$i"]["start_time"]);
			$end_time=strtotime($assoc["$i"]["end_time"]);
			$now=time();
			echo "<tr>";
			echo '<td class="hidden-xs">'.$assoc["$i"]['id']."</td>";
			echo "<td><a href=".$site_host."activity.php?id=".$assoc["$i"]['id'].">".$assoc["$i"]['activity_name']."</a>";
			if($now<$start_time){
				echo '<span class="label label-warning">即将开始</span>';
			}else if($now>$end_time){
				echo '<span class="label label-default">已结束</span>';
			}else{
				echo '<span class="label label-success">正在进行</span>';
			}
			echo "</td>";
			echo "<td>".$assoc["$i"]['username']."</td>";
			echo '<td class="hidden-xs">'.$assoc["$i"]['start_time']."</td>";
			echo "</tr>";
		}
	}else if(isset($get_user_join_activities)){
	    SQL::SELECT("activities.id,activity_name,username,activity_describe,start_time,end_time",
					"`user-activity`,users,activities",
					"`user-activity`.user_id = (SELECT id FROM users WHERE username='{$get_user_join_activities}') AND activities.id=`user-activity`.activity_id AND users.id=activities.author_id",
					"ORDER BY activities.id");
		while($row=SQL::getResult()->fetch_assoc()){
            $assoc[]=$row;
        }
		$activities_count=count($assoc);
		for($i=$activities_count-1;$i>=0;$i--){
			$start_time=strtotime($assoc["$i"]["start_time"]);
			$end_time=strtotime($assoc["$i"]["end_time"]);
			$now=time();
			echo "<tr>";

			echo '<td class="hidden-xs">'.$assoc["$i"]['id']."</td>";
			echo "<td><a href=".$site_host."activity.php?id=".$assoc["$i"]['id'].">".$assoc["$i"]['activity_name']."</a>";
			if($now<$start_time){
				echo '<span class="label label-warning">即将开始</span>';
			}else if($now>$end_time){
				echo '<span class="label label-default">已结束</span>';
			}else{
				echo '<span class="label label-success">正在进行</span>';
			}
			echo "</td>";
			echo "<td>".$assoc["$i"]['username']."</td>";
			echo '<td class="hidden-xs">'.$assoc["$i"]['start_time']."</td>";
			echo "</tr>";
		}
	}else{
		page_jump($site_host."activities.php",0);
	}
