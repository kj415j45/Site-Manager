<?php session_start();?>
<li><a href="#"><?php echo $_SESSION["usergroup"];?></a></li>
<li><a href="#"><?php echo $_SESSION["username"];?></a></li>
<li><a href="activities.php">我的活动</a></li>
<li><a href="login.php?action=logout">退出</a></li>
<li><img src="userhead/<?php echo $_SESSION["username"] ?>.jpg" class="img-circle" width=48 height=48></li>