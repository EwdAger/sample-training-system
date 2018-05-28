<?php
namespace Home\Controller;
use Illuminate\Mail\Message;
use Think\Controller;

class TrainController extends Controller{
    public function outpack(){
        // 实例化外包培训界面
        $data['name'] = I('post.name');
        $data['level'] = I('post.level');
        $data['email'] = I('post.email');

        $this->assign('data', $data);
        $this->display();
    }

    public function outpack_class_select(){
        // 实例化对应科目内调培训界面
        $data['name'] = I('post.name');
        $data['level'] = I('post.level');
        $data['email'] = I('post.email');
        $data['_class'] = I('post._class');

        $this->assign('data', $data);
        $this->display();
    }

    public function outpack_check(){
        $check = '外包培训';
        // 获取全部post值
        $data = I('post.');
        $_class = I('post._class');
        $email = I('post.email','','email');

        // 判断答案正误, 当前默认所有题目全对考试才算合格
        $flag = true;
        foreach ($data as $value)
            if ($value!='a'and $value != $email and $value != $_class)
                $flag = false;

        if ($flag != true)
            $this->error('技能考试不合格!', U('home/index', array('email'=>$email)));
        else{
            require ('MessageController.class.php');
            $msg = new MessageController();
            $msg->low_apply(array('email'=>$email, 'check'=>$check, '_class'=>$_class));
        }
    }

    public function inpack(){
        // 实例化内调培训科目选择界面
        $data['name'] = I('post.name');
        $data['level'] = I('post.level');
        $data['email'] = I('post.email');

        $this->assign('data', $data);
        $this->display();
    }

    public function inpack_class_select(){
        // 实例化对应科目内调培训界面
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
        $_class = I('post._class');
        $flag = true;
        foreach ($data as $value)
            if ($value!='a'and $value != $email and $value != $_class)
                $flag = false;

        if ($flag != true)
            $this->error('技能考试不合格!', U('home/index', array('email'=>$email)));
        else{
            require ('MessageController.class.php');
            $msg = new MessageController();
            $msg->low_apply(array('email'=>$email, 'check'=>$check, '_class'=>$_class));
        }
    }
}