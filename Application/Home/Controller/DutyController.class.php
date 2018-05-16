<?php
namespace Home\Controller;
use Think\Controller;

class DutyController extends Controller{
    public function sign(){
        $data['name'] = I("post.name");
        $Sign = M('Sign');
        $Sign->add($data);
        $this->success('打卡成功！');
    }
}