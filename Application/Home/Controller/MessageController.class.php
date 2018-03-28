<?php
namespace Home\Controller;
use Think\Controller;

class MessageController extends Controller{
    public function high_apply(){
        $check = I('post.check');
        $name = I('post.name');
        $email = I('post.email');
        $level = I('post.level');

        if ($level < 7)
            $this->error('您未达到7级以上,申请失败', U('home/index', array('email'=>$email)));

        $Message = M('message');
        $data['name'] = $name;
        $data['message_level'] = $check;
        $Message->add($data);

        $this->success('您已申请提升等级,请等待高层决议', U('home/index', array('email'=>$email)));
        /*
        $this->assign(array('check'=>$check, 'name'=> $name,));
        $this->display();
        */
    }

    // WAIT FIX
    public function low_apply($data){
        $User = M('user');
        $userinfo = $User->where(array('email'=>$data['email']))->find();

        $Message = M('message');
        $msg['name'] = $userinfo['name'];
        $msg['message_level'] = $data['check'];
        $Message->add($msg);

        $this->success('您已申请提升等级,请等待管理员审查', U('Home/index', array('email'=>$data['email'])));
    }
}