<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class SettingController extends HomeController {
    public function index(){
      if($this->checkLogin()){
            $user=D('User');

            $this->assign('user',$user->getUser());
         
            $this->display();
      }else{
        $this->error('非法进去');
      }
      
    }

    //头像设置；
    public function avatar(){
        if($this->checkLogin()){
            $user=D('User');
          

            if(json_decode($user->getFace()['face'])){

                $face=__ROOT__.json_decode($user->getFace()['face'])->big;
            }else{
                $face=__ROOT__.'./Public/Home/img/big.jpg';

            }
        $this->assign('face',$face);
        
        $this->display();
        }else{
            $this->error('非法进去');
          }

           
    }

    //个性域名设置；
    public function domain(){
        if($this->checkLogin()){
            
            $this->display();
        }
    }
    public function getDomain(){
        $user=D('User');
            $obj=$user->getUser();
            echo json_encode($obj);
    }
    //注册域名；
    public function register(){
        if(IS_AJAX){
            $user=D('User');
            echo $user->updateField('domain');
        }else{
            $this->error('非法进去');
        }
    }
    public function refer(){
        
        $refer=D('Refer');
        $list=$refer->getRefer();

        $this->assign('list',$list);
        $this->display();
    }
    
}

