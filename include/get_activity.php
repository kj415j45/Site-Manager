<?php
	require_once __DIR__."/sql_connect.php";
	require __DIR__."/public_function.php";
	
	if(isset($get_activity_id)){
		//TODO 获取指定信息，等待模板完成
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