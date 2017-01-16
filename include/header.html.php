    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="index.php"><?php echo $site_head ?></a>
            <ul class="nav navbar-nav">
                <li <?php if($index_page){echo 'class="active"';}?>><a href="index.php">主页</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(!$login_page){
                    echo '<li><a href="login.php">登录</a></li>';
                    }else{
                        /*TODO 用户信息界面*/
                        }?>
                        <li><a href="#">管理员</a></li>
                        <li><a href="#">test</a></li>
                        <li><a href="activities.php">我的活动</a></li>
                        <li><a href="login.php?action=logout">退出</a></li>
                        <li><img src="userhead/<?php echo $_SESSION["username"] ?>.jpg" class="img-circle" width=48 height=48></li>
            </ul>
        </div>
    </nav>