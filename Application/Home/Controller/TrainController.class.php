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

        $check = '外包培训';
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

    public function inpack(){
        $data['name'] = I('post.name');
        $data['level'] = I('post.level');
        $data['email'] = I('post.email');

        $this->assign('data', $data);
        $this->display();
    }

    public function inpack_class_select(){
        $data['name'] = I('post.name');
        $data['level'] = I('post.level');
        $data['email'] = I('post.email');
        $data['_class'] = I('post._class');

        $this->assign('data', $data);
        $this->display();
    }

    public function inpack_check(){

        $check = '内调培训';
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