<?php
namespace Home\Controller;
use Think\Controller;

class SignController extends Controller{
    public function index(){
        $this->display();
    }

    public function SignUp(){
        // 获取form数据
        $email = I('post.email');
        $pwd = I('post.pwd');

        $User = M('User');
        $condition['email'] = $email;
        $userinfo=$User->where($condition)->select(); //使用数组作为查询条件

        if(0==count($userinfo[0]))
            $this->error("登陆失败，不存在此邮箱");
        else{
            if($pwd!=$userinfo[0]['pwd'])
                $this->error("登陆失败，密码错误！");
            else
            {
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

        if($email&$name&$pwd){
            $User = M('User');
            $data['email'] = $email;
            $data['name'] = $name;
            $data['pwd'] = $pwd;
            $data['level'] = $level;
            $User->add($data);   //ThinkPHP的数据写入操作使用add方法
            $this->success('新增成功，即将返回注册页面', U('index/index'));
        }
    }
}