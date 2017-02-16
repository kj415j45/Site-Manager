<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $site_name ?>-编辑场地</title>
    <!-- Bootstrap样式表 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- 头部开始 -->
    <?php require "include/header.html.php"; ?>
    <!-- 头部结束 -->
    <!-- 主容器开始 -->
    <div class="container">
        <h1 class="page-header">编辑场地</h1>
        <form class="form-horizontal" method="post" action="<?php echo $site_host; ?>test.php">
            <div class="form-group">
                <label class="col-md-1 control-label">场地名称</label>
                <div class="col-md-11">
                    <input type="text" class="form-control" name="site_name" placeholder="场地名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label">场地介绍</label>
                <div class="col-md-11">
                    <textarea class="col-md-6 form-control" rows="10"></textarea>
                </div>
            </div>
			<div class="form-group">
				<label class="col-md-1 control-label">场地设备</label>
				<div class="col-md-11">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="device_1"> Check me out 
						</label>
						<label>
							<input type="checkbox" name="device_2"> Check me out 
						</label>
						<label>
							<input type="checkbox" id="other_device" onClick="if($('#other_device').is(':checked')) $('#other_devices').removeClass('hidden'); else $('#other_devices').addClass('hidden');"> 其他设备
						</label>
					</div>
				</div>
			</div>
			<div class="form-group hidden" id="other_devices">
				<label class="col-md-1 control-label">其他设备</label>
				<div class="col-md-11">
					<input type="text" class="form-control" name="other_devices" placeholder="其他设备,使用空格分割">
				</div>
			</div>
            <div class="form-group">
                <div class="col-md-offset-11 col-md-1">
                    <button type="submit" class="btn btn-primary col-md-12">提交</button>
                </div>
            </div>
            <input type="hidden" name="site_id" value="">
        </form>
    </div>
    <!-- 主容器结束 -->
    <!-- 底部开始 -->
    <?php require "include/footer.html.php" ?>
    <!-- 底部结束 -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- 导入jQuery(Bootstrap所需前置及jQ插件所需依赖) -->
    <script src="js/jquery.min.js"></script>
    <!-- 导入Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>