<?php
    //TODO 需要测试本模块
    require_once __DIR__."/../sql_connect.php"
    if ((($_FILES["file"]["type"] == "image/gif")//是gif
      || ($_FILES["file"]["type"] == "image/jpeg")//或者是jpg
      || ($_FILES["file"]["type"] == "image/png"))//或者是png
      && ($_FILES["file"]["size"] < 2000000)){//并且小于2M
        if ($_FILES["file"]["error"] > 0){//如果没有错误
            echo "头像上传失败";
        }else{
            echo "头像上传成功"；
        }
    }
    else{
        echo "上传的不是图片文件";
    }
    move_uploaded_file($_FILES["file"]["tmp_name"],__DIR__."/".$_SESSION["username"]);//保存头像
?>