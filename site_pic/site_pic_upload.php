<?php
    //TODO ��Ҫ���Ա�ģ��
    require_once __DIR__."/../sql_connect.php"
    if ((($_FILES["file"]["type"] == "image/gif")//��gif
      || ($_FILES["file"]["type"] == "image/jpeg")//������jpg
      || ($_FILES["file"]["type"] == "image/png"))//������png
      && ($_FILES["file"]["size"] < 4000000)){//����С��4M
        if ($_FILES["file"]["error"] > 0){//���û�д���
            echo "����ͼƬ�ϴ�ʧ��";
        }else{
            echo "����ͼƬ�ϴ��ɹ�"��
        }
    }
    else{
        echo "�ϴ��Ĳ���ͼƬ�ļ�";
    }
    move_uploaded_file($_FILES["file"]["tmp_name"],__DIR__."/".$_POST["site_id"]);//����ͼ��
?>