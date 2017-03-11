<?php
    session_start();
    require_once "include/sql_connect.php";
    require_once "include/public_function.php";

    if(isset($_GET['id'])){
        SQL::DELETE("user-activity",
                    "user_id='{$_SESSION['user_id']}' AND activity_id='$_GET['id']'");
        page_jump('activity.php?id='.$_GET['id'],0);
    }
    page_jump('index.php',0);
