<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller{
    public function index($email){
        $User = M('User');
        $userinfo=$User->where(array('email'=>$email))->select(); //使用数组作为查询条件

        $Message = M('Message');
        $msg = $Message->where(array('name'=>$userinfo[0]['name']))->select();

        // 判断是否已申请过升级
        $flag = false;
        if ($msg)
            $flag = true;
            $is_confirm = $msg[0]['is_confirm'];

        // 数据绑定, 提交至模板函数, 并显示页面
        $this->assign(array('userinfo'=>$userinfo[0], 'flag'=>$flag, 'is_confirm'=>$is_confirm));
        $this->display();
    }
}