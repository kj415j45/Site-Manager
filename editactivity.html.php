<?php require_once "include/config.php"?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name ?></title>

    <!-- Bootstrap样式表 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
		<form class="form-horizontal" method="post" action="<?php echo $site_host; ?>test.php">
		  <div class="form-group">
			<label class="col-md-1 control-label">活动名称</label>
			<div class="col-md-11">
			  <input type="text" class="form-control" id="name" placeholder="活动名称">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-md-1 control-label">活动场地</label>
				<div class="col-md-3">
					<select class="form-control">
						<option>1</option>
						<option>2</option>
					</select>
				</div>
				<label class="col-md-1 control-label">开始时间</label>
				<div class="col-md-3">
					<div class="input-group date form_datetime" data-date="2017-01-01T00:00:00Z" data-date-format="yyyy MM dd - hh:ii" data-link-field="startTime">
						<input class="form-control" size="16" type="text" value="" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>
					<input type="hidden" id="startTime" value="">
				</div>
				
				<label class="col-md-1 control-label">结束时间</label>
				<div class="col-md-3">
					<div class="input-group date form_datetime" data-date="2017-01-01T00:00:00Z" data-date-format="yyyy MM dd - hh:ii" data-link-field="endTime">
						<input class="form-control" size="16" type="text" value="" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>
					<input type="hidden" id="endTime" value="">
				</div>
			</div>
		  <div class="form-group">
			<label class="col-md-1 control-label">活动介绍</label>
			<div class="col-md-11">
				<textarea class="col-md-6 form-control" rows="10"></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-11 col-md-1">
			  <button type="submit" class="btn btn-primary col-md-12">提交</button>
			 </div>
		  </div>
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
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	</script>
  </body>
</html>