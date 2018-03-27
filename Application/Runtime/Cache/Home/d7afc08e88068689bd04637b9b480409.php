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
 $actUrl="\"".U('message/apply',"")."\""; ?>
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
                    <div class="form-horizontal">
                        <span class="heading">你好! 员工:<?php echo ($userinfo['name']); ?></span>
                        <div class="form-group">
                            <p>您的员工等级为: <?php echo ($userinfo['level']); ?>级</p>
                        </div>

                        <div class="form-group">
                            <?php if($userinfo['level'] >= 7): ?><form method="POST" action=<?php echo $actUrl?>>
                                    <input type="hidden" name="check" value="high" />
                                    <input type="hidden" name="name" value=<?php echo ($userinfo['name']); ?>>
                                    <input type="hidden" name="email" value=<?php echo ($userinfo['email']); ?>>
                                    <input type="hidden" name="level" value=<?php echo ($userinfo['level']); ?>>
                                    <?php if($flag == true): ?><elseif condition="$is_confirm eq true">
                                            <p class="alert alert-warning">您的申请正在等待审核,请不要重复申请。</p>
                                            <button disabled="disabled" type="submit" class="btn btn-default" style="float: none"  >申请高层决议</button>
                                        </elseif>
                                        <?php else: ?>
                                        <button type="submit" class="btn btn-default" style="float: none"  >申请高层决议</button><?php endif; ?>
                                </form>
                                <?php else: ?>
                                <div>
                                    <p>您现在可选的培训方式有: </p>
                                    <button class="btn btn-default" style="float: none">外包培训</button>
                                    <button class="btn btn-default" style="float: none">内调培训</button>
                                </div><?php endif; ?>

                        </div>
                    </div>
                    <!--
                    <form class="form-horizontal" method="POST" action=<?php echo $actUrl?>>
                        <span class="heading">员工登录</span>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="电子邮件">
                            <i class="fa fa-at"></i>
                        </div>
                        <div class="form-group help">
                            <input type="password" class="form-control" name="pwd" placeholder="密码">
                            <i class="fa fa-font"></i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">登录</button>
                        </div>
                    </form>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>