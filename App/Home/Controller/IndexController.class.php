<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController {
    public function index(){
      
       if($this->checkLogin()){
         $this->display();
        }else{
            $this->error('非法进入！');
        }
      
    }
}