<?php
    session_start();
    require_once "include/sql_connect.php";
    require_once "include/public_function.php";
    
    if(isset($_POST['name'])){
        SQL::UPDATE("userinfo",
                    "name='{$_POST['name']}',telephone='{$_POST[telephone]}',qq='{$_POST['qq']}'",
                    "id='{$_POST['user_id']}'");
        page_jump("userinfo.php?user=".$_SESSION['username'],0);
    }else if(isset($_POST['now_md5password'])){
        SQL::SELECT("username,password",
                    "users",
                    "id='{$_POST['user_id']}'");
        $assoc=SQL::getAssoc(SQL::getResult());
        if($assoc['password']!=$_POST['now_md5password']){
            js_message("密码错误");
            page_jump($site_host."edit_userinfo.php?user_id=".$_POST['user_id'],0);
        }
        SQL::UPDATE("users","password='{$_POST['md5password']}'","id='{$_POST['user_id']}'");
        js_message("密码更新成功");
        page_jump($site_host."userinfo.php?user=".$assoc['username'],0);
    }else if(!isset($_GET['user_id'])&&!isset($_GET['user'])){
        page_jump($site_host,0);
    }else if($_SESSION["user_id"]!=$_GET["id"]&&$_SESSION["username"]!=$_GET["user"]&&$_SESSION["usergroup"]!="管理员"){
        js_message("您没有权限编辑此用户的信息!");
        page_jump($site_host."userinfo.php?user=".$_GET['user'],0);
    }
    SQL::SELECT("userinfo.id,userinfo.name,userinfo.telephone,userinfo.qq",
                "userinfo,users",
                "(users.id='{$_GET['user_id']}' OR users.username='{$_GET['user']}') AND users.id=userinfo.id");
    $assoc=SQL::getAssoc(SQL::getResult());
    $user_id=$assoc['id'];
    $name=$assoc['name'];
    $telephone=$assoc['telephone'];
    $qq=$assoc['qq'];
    require "edit_userinfo.html.php";
