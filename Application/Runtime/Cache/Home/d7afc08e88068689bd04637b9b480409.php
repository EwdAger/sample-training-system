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
 $admin="\"".U('home/admin',"")."\""; $index="\"".U('index/index',"")."\""; $actUrl="\"".U('message/high_apply',"")."\""; $actUrl2="\"".U('train/outpack',"")."\""; $actUrl3="\"".U('train/inpack',"")."\""; ?>
</head>
<body>
<div class="htmleaf-container">
    <header class="htmleaf-header">
        <h1><a href=<?php echo $index?>> 综合人事培养系统</a><span>Comprehensive Personnel Training System</span></h1>
    </header>
    <div class="demo form-bg" style="padding: 20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-horizontal">
                        <span class="heading">你好! 员工:<?php echo ($userinfo['name']); ?></span>
                        <div class="form-group">
                            <p>您的员工等级为: <?php echo ($userinfo['level']); ?>级</p>

                            <?php if($is_admin == 1): ?><p class="alert alert-warning">您是本系统管理员</p>
                                    <form class="form-horizontal" method="POST" action=<?php echo $admin?>>
                                        <input type="hidden" name="name" value=<?php echo ($userinfo['name']); ?>>
                                        <input type="hidden" name="email" value=<?php echo ($userinfo['email']); ?>>
                                        <button type="submit" class="btn btn-default" style="float: none">进入管理界面
                                        </button>
                                    </form>
                                <hr><?php endif; ?>

                        </div>

                        <div class="form-group">
                            <?php if($userinfo['level'] >= 7): ?><form class="form-horizontal" method="POST" action=<?php echo $actUrl?>>
                                    <input type="hidden" name="check" value="高层决议"/>
                                    <input type="hidden" name="name" value=<?php echo ($userinfo['name']); ?>>
                                    <input type="hidden" name="email" value=<?php echo ($userinfo['email']); ?>>
                                    <input type="hidden" name="level" value=<?php echo ($userinfo['level']); ?>>
                                    <?php if($flag != true): ?><p class="alert alert-warning">您的申请正在等待审核,请不要重复申请。</p>
                                        <button disabled="disabled" type="submit" class="btn btn-default"
                                                style="float: none">申请高层决议
                                        </button>
                                        <?php else: ?>
                                        <button type="submit" class="btn btn-default" style="float: none">申请高层决议
                                        </button><?php endif; ?>
                                </form>
                                <?php else: ?>
                                <div>
                                    <p>您现在可选的培训方式有: </p>

                                    <?php if($flag == true): ?><!-- 外包培训 -->
                                        <form method="post" action=<?php echo $actUrl2 ?> style="display:inline">
                                            <input type="hidden" name="name" value=<?php echo ($userinfo['name']); ?>>
                                            <input type="hidden" name="level" value=<?php echo ($userinfo['level']); ?>>
                                            <input type="hidden" name="email" value=<?php echo ($userinfo['email']); ?>>

                                            <button type="submit" class="btn btn-default" style="float: none">外包培训
                                            </button>
                                        </form>
                                        <!-- 内调培训 -->
                                        <form method="post" action=<?php echo $actUrl3 ?> style="display:inline">
                                            <input type="hidden" name="name" value=<?php echo ($userinfo['name']); ?>>
                                            <input type="hidden" name="level" value=<?php echo ($userinfo['level']); ?>>
                                            <input type="hidden" name="email" value=<?php echo ($userinfo['email']); ?>>
                                            <button type="submit" class="btn btn-default" style="float: none">内调培训
                                            </button>
                                        </form>
                                        <?php else: ?>
                                        <p class="alert alert-warning">您的申请正在等待审核,请不要重复申请。</p>
                                        <form method="post" action=<?php echo $actUrl2 ?> style="display:inline">
                                            <button disabled="disabled" type="submit" class="btn btn-default"
                                                    style="float: none">外包培训
                                            </button>
                                        </form>
                                        <form method="post" action=<?php echo $actUrl3 ?> style="display:inline">
                                            <button disabled="disabled" type="submit" class="btn btn-default"
                                                    style="float: none">内调培训
                                            </button>
                                        </form><?php endif; ?>
                                </div><?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>