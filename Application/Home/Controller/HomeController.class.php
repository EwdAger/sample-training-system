<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller{
    public function index($email){
        if ($email == session('email')){
            $User = M('User');
            $userinfo=$User->where(array('email'=>$email))->find(); //使用数组作为查询条件

            if ($userinfo['is_admin'] == 1){
                $is_admin = true;
            }

            $Message = M('Message');
            $msg = $Message->where(array('name'=>$userinfo['name']))->find();

            // 判断是否已申请过升级
            $flag = false;
            if (!$msg or $msg['is_confirm'] != 0)
                $flag = true;

            // 数据绑定, 提交至模板函数, 并显示页面
            $this->assign(array('userinfo'=>$userinfo, 'flag'=>$flag, 'is_admin'=>$is_admin));
            $this->display();
        }
    }

    public function admin(){
        $name = I('post.name');

        $Message = M('Message');
        $msg = $Message->where(array('is_confirm'=>0))->select();

        $User = M('User');
        $userinfo = $User->select();

        $this->assign(array('msg'=>$msg,'userinfo'=>$userinfo, 'name'=>$name));
        $this->display();
    }
}