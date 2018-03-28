<?php
namespace Home\Controller;
use Illuminate\Mail\Message;
use Think\Controller;

class TrainController extends Controller{
    public function outpack(){
        $data['name'] = I('post.name');
        $data['level'] = I('post.level');
        $data['email'] = I('post.email');

        $this->assign('data', $data);
        $this->display();
    }
    public function outpack_check(){

        $check = 'outpack';
        // 获取全部post值
        $data = I('post.');
        $email = I('post.email','','email');
        $flag = true;
        foreach ($data as $value)
            if ($value!='a'and $value != $email)
                $flag = false;

        if ($flag != true)
            $this->error('技能考试不合格!', U('home/index', array('email'=>$email)));
        else{
            require ('MessageController.class.php');
            $msg = new MessageController();
            $msg->low_apply(array('email'=>$email, 'check'=>$check));
        }
    }
}