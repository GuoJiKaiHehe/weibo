<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends HomeController {
    public function index(){

       
        if(!$this->checkLogin()){

            $user=D('User');
            $this->display();
        }else{
            $this->redirect('login/index');
        }

    }
    public function verify(){
        $verify=new \Think\Verify();
        $verify->entry(1);
    }
    public function checkVerify(){

        if(IS_AJAX){
           echo checkVerify(I('post.verifyText'),1);
        }else{
            $this->error('非法进入');
        }
    }
   
}