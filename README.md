# 简单人事培养管理系统

基于ThinkPHP 3.2.3 + PHP5 + Bootstrap开发的简易人事培养管理系统. 项目结构比较混乱, 并非标准MVC结构, 路由采用TP自带的控制器名/方法名规则, (因为写完整个项目才发现TP在3.2.3版本更新了标准路由规则. :P )

## 登录

![登录界面](https://github.com/EwdAger/sample-training-system/blob/master/img/1.png =300)


## 员工界面

根据员工等级的不同显示不同的升职方式, 7级以下提供外包培训、内调培训两种方式. 7级以上提供高层审核的升职方式. 如果员工是系统管理员会提供管理员入口. 

![员工界面](https://github.com/EwdAger/sample-training-system/blob/master/img/2.png =300)

## 升职

外包培训仅需要通过技能考试, 正确率达到一定成绩即可进入等待审核状态.

内调培训需先选择培训科目,  再通过技能考试, 正确率达到一定成绩即可进入等待审核状态.

高层决议仅需申请即可进入等待审核状态.

![技能考试](https://github.com/EwdAger/sample-training-system/blob/master/img/5.png =300)

![内调分班](https://github.com/EwdAger/sample-training-system/blob/master/img/6.png =300)

## 审核

当员工考试通过将进入审核状态, 非管理员用户将无法进一步进行升职操作. 需等待管理员通过或者驳回才能进一步申请.

![审核](https://github.com/EwdAger/sample-training-system/blob/master/img/3.png =300)

## 管理员界面

管理员界面下可以进行升职、 降职的创建新员工操作, 但管理员无法对自己进行操作.

![管理员界面](https://github.com/EwdAger/sample-training-system/blob/master/img/4.png =300)





