<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name ?>-编辑活动</title>

    <!-- Bootstrap样式表 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- 日期选择器样式表 -->
	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- 头部开始 -->
    <?php require "include/header.html.php"; ?>
	<!-- 头部结束 -->
	<!-- 主容器开始 -->
    <div class="container">
		<h1 class="page-header">编辑活动</h1>
		<form class="form-horizontal" method="post" action="<?=$site_host ?>edit_activity.php">
		  <div class="form-group">
			<label class="col-md-1 control-label">活动名称</label>
			<div class="col-md-11">
			  <input type="text" class="form-control" name="activity_name" placeholder="活动名称" value="<?=$activity_name ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-md-1 control-label">活动场地</label>
				<div class="col-md-3">
					<select class="form-control" name="site_name">
						<?php
							$get_by_editor=true;
							require "include/get_sites.php";
						?>
					</select>
				</div>
				<label class="col-md-1 control-label">开始时间</label>
				<div class="col-md-3">
					<div class="input-group date form_datetime" data-date-format="yyyy-mm-dd hh:ii" data-link-field="start_time">
						<input class="form-control" size="16" type="text" value="<?=$start_time ?>" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>
					<input type="hidden" id="start_time" name="start_time" value="<?=$start_time ?>">
				</div>
				
				<label class="col-md-1 control-label">结束时间</label>
				<div class="col-md-3">
					<div class="input-group date form_datetime" data-date-format="yyyy-mm-dd hh:ii" data-link-field="end_time">
						<input class="form-control" size="16" type="text" value="<?=$end_time; ?>" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>
					<input type="hidden" id="end_time" name="end_time" value="<?=$end_time ?>">
				</div>
			</div>
		  <div class="form-group">
			<label class="col-md-1 control-label">活动介绍</label>
			<div class="col-md-11">
				<textarea class="col-md-6 form-control" name="activity_describe" rows="10"><?=$activity_describe ?></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-11 col-md-1">
			  <button type="submit" class="btn btn-primary col-md-12">提交</button>
			 </div>
		  </div>
		  <input type="hidden" name="activity_id" value="<?php echo isset($_GET["id"])?$_GET["id"]:'0'; ?>">
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
	<!-- 导入日期选择器 -->
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.zh-CN.js"></script>
	<!-- 日期选择器设置 -->
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  true,
		autoclose: true,
		todayHighlight: true,
		startView: 2,
		forceParse: 0
    });
	</script>
  </body>
</html>