<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>员工</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/tp3/Public/css/htmleaf-demo.css">
	<link rel="stylesheet" type="text/css" href="/tp3/Public/css/index.css">

	<!--[if IE]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	<?php
 $actUrl="\"".U('index/SignIn',"")."\""; ?>
</head>
<body>
	<div class="htmleaf-container"  >
		<header class="htmleaf-header">
			<h1>综合人事培养系统<span>Comprehensive Personnel Training System</span></h1>
		</header>
		<div class="demo form-bg" style="padding: 20px 0;">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-offset-3 col-md-6">
		                    <form class="form-horizontal" method="POST" action=<?php echo $actUrl?>>
		                        <span class="heading">用户登录</span>
		                        <div class="form-group">
		                            <input type="email" class="form-control" name="email" placeholder="电子邮件">
		                            <i class="fa fa-email"></i>
		                        </div>
								<div class="form-group">
									<input class="form-control" name="name" placeholder="姓名">
								</div>
		                        <div class="form-group help">
		                            <input type="password" class="form-control" name="pwd" placeholder="密　码">
		                        </div>
		                        <div class="form-group">
		                            <button type="submit" class="btn btn-default">登录</button>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
	</div>
	
</body>
</html>