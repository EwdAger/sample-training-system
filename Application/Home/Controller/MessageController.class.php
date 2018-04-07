<?php
namespace Home\Controller;
use Think\Controller;

class MessageController extends Controller{
    // 高层决议
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
        $data['now_level'] = $level;
        $data['next_level'] = $level + 1;
        $Message->add($data);

        $this->success('您已申请提升等级,请等待高层决议', U('home/index', array('email'=>$email)));
    }

    // 外包、内调培训升职
    public function low_apply($data){
        $User = M('user');
        $userinfo = $User->where(array('email'=>$data['email']))->find();

        $Message = M('message');
        $msg['name'] = $userinfo['name'];
        $msg['message_level'] = $data['check'];
        $msg['now_level'] = $userinfo['level'];
        $msg['next_level'] = $userinfo['level'] + 1;
        $Message->add($msg);

        $this->success('您已申请提升等级,请等待管理员审查', U('Home/index', array('email'=>$data['email'])));
    }

    // 审核
    public function confirm(){
        $check = I("post.check");
        $name = I("post.name");

        // 获取员工升职申请信息
        $Message = M('message');
        $msg = $Message->where(array('name'=>$name, 'is_confirm'=>0))->find();

        $User = M('User');
        $userinfo = $User->where(array('name'=>$name))->find();
        if ($check){
            // 确认审核通过
            $msg['is_confirm'] = 1;
            $Message->save($msg);
            // 员工等级提升
            $userinfo['level'] = $userinfo['level'] + 1;
            $User->save($userinfo);
            $this->success('员工'.$name.'升职成功');
        }
        else{
            // 删除员工升职申请信息
            $Message->where(array('name'=>$name, 'is_confirm'=>0))->delete();
            $this->success('员工'.$name.'升职申请已驳回');
        }
    }

    // 降职
    public function demotion(){
        $name = I("post.name");
        $email = I("post.email");

        $User = M('User');
        $userinfo = $User->where(array("name"=>$name, "email"=>$email))->find();
        if ($userinfo['level'] != 0){
            $userinfo['level'] = $userinfo['level'] - 1;
            $User->save($userinfo);
            $this->success("员工".$name."已降职");
        }
        else {
            $this->error("员工" . $name . "等级已为最低级, 无法降职");
        }
    }
}