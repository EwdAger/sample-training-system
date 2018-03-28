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
 $actUrl="\"".U('Train/outpack_check',"")."\""; ?>
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
                    <form class="form-horizontal" method="post" action=<?php echo $actUrl?>>
                        <span class="heading">技能考试</span>
                        <div class="form-group">
                            <div class="text-left">
                                <div class="alert alert-info">
                                    <p><b><?php echo ($data['name']); ?></b> 先生/女士你好! 您正在参加升职技能考试。<br/> 您目前的等级为<b><?php echo ($data['level']); ?></b>级</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="email" value=<?php echo ($data['email']); ?>>
                                <!-- 题目开始 -->
                                <div style="color: #000">
                                <p class="text-left">1. 1+1等于?</p>
                                <div class="text-left">
                                    <label>
                                        <input type="radio" name="1" value="a">A.2
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="1" value="b">B.3
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="1" value="c">C.4
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="1" value="d">D.5
                                    </label>
                                    <hr/>
                                </div>

                                <p class="text-left">2. 1+1等于?</p>
                                <div class="text-left">
                                    <label>
                                        <input type="radio" name="2" value="a">A.2
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="2" value="b">B.3
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="2" value="c">C.4
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="2" value="d">D.5
                                    </label>
                                    <hr/>
                                </div>

                                <p class="text-left">3. 1+1等于?</p>
                                <div class="text-left">
                                    <label>
                                        <input type="radio" name="3" value="a">A.2
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="3" value="b">B.3
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="3" value="c">C.4
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="3" value="d">D.5
                                    </label>
                                    <hr/>
                                </div>

                                <p class="text-left">4. 1+1等于?</p>
                                <div class="text-left">
                                    <label>
                                        <input type="radio" name="4" value="a">A.2
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="4" value="b">B.3
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="4" value="c">C.4
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="4" value="d">D.5
                                    </label>
                                    <hr/>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </form>
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