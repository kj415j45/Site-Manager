<?php
    session_start();
    require_once "include/sql_connect.php";
    require_once "include/public_function.php";

    if(isset($_GET['id'])){
        SQL::INSERT("`user-activity`",
                    "user_id,activity_id",
                    "'{$_SESSION['user_id']}','{$_GET['id']}'");
        page_jump('activity.php?id='.$_GET['id'],0);
    }else{
        page_jump('index.php',0);
    }
