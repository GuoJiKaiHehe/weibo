<?php

namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {

    protected function checkLogin(){

        if(!is_null(cookie('auto'))&& !session('?user_auth')){
            $username = encryption(cookie('auto'), 1);

            $user=D('User');
            $userObj=$user->where(array('username'=>$username))->find();
            print_r($userObj);
            $auth=array(
                'id'=>$userObj['id'],
                'username'=>$userObj['username'],
                'last_login'=>NOW_TIME,
                );
            session('user_auth',$auth);
            
        }
        if(session('?user_auth')){
            return 1;
        }else{
     
          return 0;
        }
    }
    protected function _initialize(){
       $refer=D('Refer');
       $count=$refer->getReferCount(session('user_auth')['id']);
       $this->assign('count',$count);
    }

    public function getRefer(){

        if(IS_AJAX){
            echo S('refer'.session('user_auth')['id']);
        }
    }

}