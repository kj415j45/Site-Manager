<?php
    session_start();
    require_once __DIR__."/../include/sql_connect.php";
    require_once __DIR__."/../include/public_function.php";
    if ((($_FILES["file"]["type"] == "image/gif")//是gif
      || ($_FILES["file"]["type"] == "image/jpeg")//或者是jpg
      || ($_FILES["file"]["type"] == "image/png"))//或者是png
      && ($_FILES["file"]["size"] < 2000000)){//并且小于2M
        if ($_FILES["file"]["error"] > 0){//如果没有错误
            js_message("头像上传失败");
            page_jump($site_host."edit_userinfo.php?user=".$_SESSION["username"],0);
        }else{
            if(file_exists(__DIR__."/".$_SESSION["username"])){
                unlink(__DIR__."/".$_SESSION["username"]);
            }
            move_uploaded_file($_FILES["file"]["tmp_name"],__DIR__."/".$_SESSION["username"]);//保存头像
            js_message("头像上传成功");
            page_jump($site_host."userinfo.php?user=".$_SESSION["username"],0);
        }
    }
    else{
        js_message("上传的不是图片文件");
        page_jump($site_host."edit_userinfo.php?user=".$_SESSION["username"],0);
    }
    
?>