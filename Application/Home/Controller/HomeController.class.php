<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller{
    public function index($email){
        // 确保员工已登陆
        if ($email == session('email')){
            $User = M('User');
            $userinfo=$User->where(array('email'=>$email))->find();

            // 管理员权限判断
            if ($userinfo['is_admin'] == 1){
                $is_admin = true;
            }

            // 升职信息审核判断
            $Message = M('Message');
            $msg = $Message->where(array('name'=>$userinfo['name'], 'is_confirm'=>0))->find();

            // 如审核存在且通过或不存在审核信息$flag为true
            $flag = false;
            if (!$msg)
                $flag = true;

            // 判断当天是否打卡
            $Sign = M('Sign');
            $getSign = $Sign->where(array('name'=>$userinfo['name']))->select();
            $signFlag = true;
            foreach ($getSign as $time){
                if(substr($time['time'], 0, 10) == date("Y-m-d"))
                    $signFlag = false;
            }

            // 判断驳回理由
            $is_reject = 0;
            $fid = -1;
            $rjc_msg = $Message->where(array('name'=>$userinfo['name'], 'now_level'=>$userinfo['level'], 'is_confirm'=>-1))->find();
            if($rjc_msg){
                $is_reject = 1;
                $fid = $rjc_msg['id'];
            }

            // 数据绑定, 提交至模板引擎, 并显示页面
            $this->assign(array('userinfo'=>$userinfo, 'flag'=>$flag, 'is_admin'=>$is_admin, 'signFlag'=>$signFlag, 'is_reject'=>$is_reject, 'fid'=>$fid));
            $this->display();
        }
    }

    public function admin(){
        $name = I('post.name');

        // 获取所有未通过审核的升职申请信息
        $Message = M('Message');
        $msg = $Message->select();

        // 获取所有职员信息
        $User = M('User');
        $userinfo = $User->select();

        // 获取所有打卡信息
        $Sign = M('Sign');
        $getSign = $Sign->select();

        $this->assign(array('msg'=>$msg,'userinfo'=>$userinfo, 'name'=>$name, 'getSign'=>$getSign));
        $this->display();
    }
}