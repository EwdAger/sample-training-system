<?php
namespace Home\Controller;
use Think\Controller;

class SignController extends Controller{
    public function index(){
        $this->display();
    }

    public function SignUp(){
        // 获取表单post数据
        $email = I('post.email');
        $pwd = I('post.pwd');

        // 获取员工数据
        $User = M('User');
        $condition['email'] = $email;
        $userinfo=$User->where($condition)->find();

        if(0==count($userinfo))
            $this->error("登陆失败，不存在此邮箱");
        else{
            if($pwd!=$userinfo['pwd'])
                $this->error("登陆失败，密码错误！");
            else
            {
                // email信息写入session, 防止未登陆直接访问员工界面
                session('email',$email);
                $this->redirect('Home/index', array("email"=>$email));
            }
        }
    }

    public function SignIn()
    {
        $email=I('post.email');
        $name=I('post.name');
        $pwd=I('post.pwd');
        $level=I('post.level');

        // 确保邮箱、姓名和密码均不为空
        if($email&$name&$pwd){
            $User = M('User');
            $data['email'] = $email;
            $data['name'] = $name;
            $data['pwd'] = $pwd;
            $data['level'] = $level;
            $User->add($data);   //ThinkPHP的数据写入操作使用add方法
            $this->success('新增成功，即将返回登录页面', U('index/index'));
        }
    }
}