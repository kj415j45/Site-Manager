<?php session_start();?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="index.php"><?php echo $site_head ?></a>
        <ul class="nav navbar-nav">
            <li <?php if($index_page){echo 'class="active"';}?>><a href="index.php">主页</a></li>
            <li <?php if($activities_page){echo 'class="active"';}?>><a href="activities.php">活动</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
                if(isset($_SESSION["username"])){
					require __DIR__."/userinfo.html.php";
                }else if(!$login_page){
                    echo '<li><a href="login.php">登录</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>