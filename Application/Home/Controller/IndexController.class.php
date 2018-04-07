<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        // 实例化登录界面
        $this->display();
    }
}