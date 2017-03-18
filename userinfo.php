<?php
	session_start();
    require_once "include/sql_connect.php";
	require_once "include/public_function.php";

    SQL::SELECT("name,qq,telephone",
                "userinfo,users",
                "username='$_GET['user']' AND users.id=userinfo.id");
    $assoc=SQL::getAssoc(SQL::getResult());
    require "userinfo.html.php";
