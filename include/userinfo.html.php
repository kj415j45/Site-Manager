<?php session_start();?>
<li><a href="#"><?=$_SESSION["usergroup"] ?></a></li>
<li><a href="userinfo.php?user=<?=$_SESSION["username"] ?>"><?=$_SESSION["username"] ?></a></li>
<li><a href="activities.php?user=<?=$_SESSION["username"] ?>">我的活动</a></li>
<?php 
	if($_SESSION["usergroup"]=="管理员"){
?>
	<li><a href="admin.php">后台管理</a></li>
<?php
	}
?>
<li><a href="login.php?action=logout">退出</a></li>
<li class="hidden-xs"><a style="padding:0;" href="userinfo.php?user=<?=$_SESSION["username"] ?>"><img src="userhead/<?php echo file_exists(__DIR__."../userhead/".$_SESSION["username"])?$_SESSION["username"]:".default" ?>" class="img-circle" width=48 height=48></a></li>