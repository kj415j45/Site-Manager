<?php
    //TODO ��Ҫ���Ա�ģ��
    require_once __DIR__."/../sql_connect.php"
    if ((($_FILES["file"]["type"] == "image/gif")//��gif
      || ($_FILES["file"]["type"] == "image/jpeg")//������jpg
      || ($_FILES["file"]["type"] == "image/png"))//������png
      && ($_FILES["file"]["size"] < 2000000)){//����С��2M
        if ($_FILES["file"]["error"] > 0){//���û�д���
            echo "ͷ���ϴ�ʧ��";
        }else{
            echo "ͷ���ϴ��ɹ�"��
        }
    }
    else{
        echo "�ϴ��Ĳ���ͼƬ�ļ�";
    }
    move_uploaded_file($_FILES["file"]["tmp_name"],__DIR__."/".$_SESSION["username"]);//����ͷ��
?>