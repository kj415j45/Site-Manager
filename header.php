    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="index.php"><?php echo $site_head ?></a>
            <ul class="nav navbar-nav">
                <li <?php if($_SERVER['PHP_SELF']=='/index.php') echo 'class="active"'?>><a href="index.php">主页</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if($_SERVER['PHP_SELF']!='/login.php') echo '<li><a href="login.php">登陆</a></li>'?>
            </ul>
        </div>
    </nav>