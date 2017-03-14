<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class SettingController extends HomeController {
    public function index(){
      if($this->checkLogin()){
            $user=D('User');
          //  $this->assign('user',$user->getUser());
            $this->display();
      }else{
        $this->error('非法进去');
      }
      
    }
    
}

