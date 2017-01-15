<?php
    require_once "include/sql_connect.php";
    require "include/public_function.php";
    session_start();
    /**
     * 如果方式是POST就处理登录数据
     */
    if(isset($_POST["method"])){
        SQL::query("SELECT password,usergroup FROM users WHERE username='".$_POST["username"]."'");
        $assoc=mysqli_fetch_assoc(SQL::getResult());
        if($_POST["method"]=="login"){
            if($assoc["password"]!=$_POST["md5password"]){//如果密码错误
                js_message("密码错误");
                page_jump($site_host."login.php",0);
            }else{
                $_SESSION["username"]=$_POST["username"];//设置session
                $_SESSION["usergroup"]=$assoc["usergroup"]=="admin"?"管理员":"用户";
                
                SQL::query("UPDATE users SET last_time='".date("YmdHis",time())."' WHERE username='".$_POST["username"]."'");//更新最后上线时间
                
                js_message("欢迎回来,".$_SESSION["usergroup"].$_SESSION["username"]);
                page_jump($site_host."index.php",0);
            }
        }else if($_POST["method"]=="regist"){
            if($assoc==null){
                SQL::query("INSERT users(username,password,usergroup,regist_time,last_time) VALUES('".$_POST["username"]."','".$_POST["md5password"]."','user','".date("YmdHis",time())."','".date("YmdHis",time())."')");
                
                if(SQL::getResult()){//如果插入成功
                    $_SESSION["username"]=$_POST["username"];//设置session
                    $_SESSION["usergroup"]="用户";
                    
                    js_message("注册成功");
                    page_jump($site_host."index.php",0);
                }else{
                    js_message("注册失败");
                    page_jump($site_host."login.php",0);
                }
            }else{
                js_message("用户名已存在!");
                page_jump($site_host."login.php",0);
            }
        }
    }
    
    /**
     * 如果方式是GET就要求登录
     */
    if(!isset($_GET["action"])||$_GET["action"]=="login"){//没有写操作或者操作是登录
        if(isset($_SESSION["username"])){//已经登录
            js_message("您已登录,请不要重复登录");
            page_jump($site_host."index.php",0);
        }else{//输出登录界面
			$login_page=true;
            require_once "login.html.php";
        }
    }else if($_GET["action"]=="logout"){//操作是退出
        unset($_SESSION["username"]);//移除session
        unset($_SESSION["usergroup"]);
        js_message("您已退出");
        page_jump($site_host."index.php",0);
    }
?>