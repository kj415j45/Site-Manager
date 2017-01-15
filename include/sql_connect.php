<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/include/config.php";
    require $_SERVER["DOCUMENT_ROOT"]."/class/SQL.class.php";
    SQL::SQLConnect($sql_host,$sql_username,$sql_password,"SiteManager");
?>