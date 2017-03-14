<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
     
    }


    //用户注册：
    public function register(){
        if(IS_AJAX){
            $user=D('User');
            echo $user->register();
        }else{
            $this->error('非法进入');
        }
    }
    //用户登陆！
    public function login(){
    if(IS_AJAX){
           $user=D('User');
     echo  $user->login();
    }else{
            $this->error('非法进入');
        }
    }

    public function checkUserName(){
        if(IS_AJAX){

            $user=D('User');
            echo $user->checkField('username');
        }else{
            $this->error('非法进入');
        }
    }
    public function checkUserEmail(){
        if(IS_AJAX){
            $user=D('User');
            echo $user->checkField('email');
        }else{
            $this->error('非法进入');
        }
    }

     public function logout(){
        session(null);
        cookie('auto',null);
        $this->success('退出成功！', U('Login/index'));
    }
    public function updateUser(){
        if(IS_AJAX){
            $user=D('User');
            echo $user->updateUser();
        }else{
            $this->error('非法进入');
        }
    }
}