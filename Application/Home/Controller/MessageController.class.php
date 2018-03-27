<?php
namespace Home\Controller;
use Think\Controller;

class MessageController extends Controller{
    public function apply(){
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
}