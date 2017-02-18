<?php session_start();?>
<li><a href="#"><?php echo $_SESSION["usergroup"]; ?></a></li>
<li><a href="#"><?php echo $_SESSION["username"]; ?></a></li>
<li><a href="activities.php?user=<?php echo $_SESSION["username"]; ?>">我的活动</a></li>
<?php 
	if($_SESSION["usergroup"]=="管理员"){
?>
	<li><a href="admin.php">后台管理</a></li>
<?php
	}
?>
<li><a href="login.php?action=logout">退出</a></li>
<li class="hidden-xs"><img src="userhead/<?php echo $_SESSION["username"] ?>.jpg" class="img-circle" width=48 height=48></li>