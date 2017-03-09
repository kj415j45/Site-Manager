<?php
    require_once __DIR__."/config.php";
    require __DIR__."/../class/SQL.class.php";
    SQL::SQLConnect($sql_host,$sql_username,$sql_password,"SiteManager");
	SQL::fixUTF8();
