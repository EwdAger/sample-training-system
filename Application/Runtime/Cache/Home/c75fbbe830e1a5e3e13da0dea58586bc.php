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
 $signup="\"".U('sign/index',"")."\""; $index="\"".U('index/index',"")."\""; $confirm="\"".U('message/confirm',"")."\""; $demotion="\"".U('message/demotion',"")."\""; $actUrl="\"".U('sign/SignIn',"")."\""; ?>
    <script language="javascript">
        function sumbit_sure(){
            var gnl=confirm("确定要使该员工降职?");
            if (gnl==true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>
<body>
<div class="htmleaf-container"  >
    <header class="htmleaf-header">
        <h1><a href=<?php echo $index?>> 综合人事培养系统</a><span>Comprehensive Personnel Training System</span></h1>
    </header>
    <div class="demo form-bg" style="padding: 20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-horizontal">

                        <form class="heading" method="GET" action=<?php echo $signup?>>
                            <button type="submit" class="btn btn-default" style="float: none">添加新员工
                            </button>
                        </form>
                        <div class="form-group" style="color: #000">
                            <p class="alert alert-success">升职申请</p>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>姓名</th>
                                    <th>当前等级</th>
                                    <th>升职方式</th>
                                    <th>是否通过</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($msg)): foreach($msg as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo["name"]); ?></td>
                                        <td><?php echo ($vo["now_level"]); ?></td>
                                        <td><?php echo ($vo["message_level"]); ?></td>
                                        <td>
                                            <?php if($vo["name"] != $name): ?><form method="POST" action=<?php echo $confirm?> style="display:inline">
                                                    <input type="hidden" name="name" value=<?php echo ($vo["name"]); ?>>
                                                    <input type="hidden" name="check" value="1">
                                                    <button class="btn btn-sm" style="float: none; padding: 0 10px">通过</button>
                                                </form>

                                                <form method="POST" action=<?php echo $confirm?> style="display:inline">
                                                    <input type="hidden" name="name" value=<?php echo ($vo["name"]); ?>>
                                                    <input type="hidden" name="check" value="0">
                                                    <button class="btn btn-sm" style="float: none; padding: 0 10px; background: #d9534f">驳回</button>
                                                </form>
                                            <?php else: ?>
                                                <form method="POST" action=<?php echo $confirm?> style="display:inline">
                                                    <input type="hidden" name="name" value=<?php echo ($vo["name"]); ?>>
                                                    <input type="hidden" name="check" value="1">
                                                    <button disabled="disabled" class="btn btn-sm" style="float: none; padding: 0 10px">通过</button>
                                                </form>

                                                <form method="POST" action=<?php echo $confirm?> style="display:inline">
                                                    <input type="hidden" name="name" value=<?php echo ($vo["name"]); ?>>
                                                    <input type="hidden" name="check" value="0">
                                                    <button disabled="disabled" class="btn btn-sm" style="float: none; padding: 0 10px; background: #d9534f">驳回</button>
                                                </form><?php endif; ?>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <hr>

                        <div class="form-group" style="color: #000">
                            <p class="alert alert-danger">员工降职</p>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>姓名</th>
                                    <th>当前等级</th>
                                    <th>降职</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($userinfo)): foreach($userinfo as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo["name"]); ?></td>
                                        <td><?php echo ($vo["level"]); ?></td>
                                        <td>
                                            <?php if($vo["name"] != $name): ?><form method="POST" action=<?php echo $demotion?> style="display:inline" onsubmit="return sumbit_sure()">
                                                    <input type="hidden" name="name" value=<?php echo ($vo["name"]); ?>>
                                                    <input type="hidden" name="email" value=<?php echo ($vo["email"]); ?>>
                                                    <button class="btn btn-sm" style="float: none; padding: 0 10px; background: #d9534f">降职</button>
                                                </form>
                                                <?php else: ?>
                                                <form method="POST" action=<?php echo $demotion?> style="display:inline">
                                                    <input type="hidden" name="name" value=<?php echo ($vo["name"]); ?>>
                                                    <input type="hidden" name="email" value=<?php echo ($vo["email"]); ?>>
                                                    <button disabled="disabled" class="btn btn-sm" style="float: none; padding: 0 10px; background: #d9534f">降职</button>
                                                </form><?php endif; ?>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>