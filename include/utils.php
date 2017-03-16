<?php
require_once __DIR__."/sql_connect.php";
function getActivities(){
		SQL::SELECT("activity_name,username,activity_describe,activity_note,start_time,end_time,site_name",
					"activities,users,sites",
					"activities.author_id = users.id AND site_id = sites.id");
		while($row=SQL::getResult()->fetch_assoc()){
			$assoc[]=$row;
		}
		return $assoc;
}

function getActivitiesByUser($username){
		SQL::SELECT("activity_name,username,activity_describe,activity_note,start_time,end_time,site_name",
					"activities,users,sites",
					"activities.author_id = '".$username."'AND activities.author_id = users.id AND site_id = sites.id");
		while($row=SQL::getResult()->fetch_assoc()){
			$assoc[]=$row;
		}
		return $assoc;
}

function getActivityByID($id){
		SQL::SELECT("activity_name,username,activity_describe,activity_note,start_time,end_time,site_name",
					"activities,users,sites",
					"activities.id = '".$id."'AND activities.author_id = users.id AND site_id = sites.id");
		return SQL::getAssoc(SQL::getResult());
}

function deleteActivity($id){
	SQL::DELETE("activities","activities.id = '".$id."'");
}

function deleteSite($id){
	SQL::DELETE("sites","sites.id = '".$id."'");
	SQL::DELETE("activities","site_id = '".$id."'");
}

function deleteUser($id){
	SQL::DELETE("users","users.id = '".$id."'");
	SQL::DELETE("activities","activities.author_id = '".$id."'");
}
