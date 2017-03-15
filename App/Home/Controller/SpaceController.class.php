<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class SpaceController extends HomeController {
        public function index($id=0,$domain=''){

            if($id==0 && $domain=='') $this->error('feifafangwen');
             $user=D("User");
            if($id>0 && $domain==''){

                $obj=$user->getUser($id);
           
               $this->assign('username',$obj['username']);
               $this->assign('intro',$obj['intro']);
               if(empty($obj['face'])){
                     $face='./Public/Home/img/big.jpg';
               }else{
                    $face=json_decode($obj['face']);
                    $face=$face->big;
                  
               }
               $this->assign('face',$face);
                $this->display();
            }else if($domain){

                $obj=$user->getUserByDomain($domain);
               if(!$obj) $this->error('此用户不存在个性域名！');
                $this->assign('username',$obj['username']);
               $this->assign('intro',$obj['intro']);
               if(empty($obj['face'])){
                     $face='./Public/Home/img/big.jpg';
               }else{
                    $face=json_decode($obj['face']);
                    $face=$face->big;
                  
               }
               $this->assign('face',$face);
                $this->display();
            }
           
           
        }

        public function setUrl(){
          //ajax 发送 用户名来，根据用户名来查询domain
          if(IS_AJAX){
            $user=D('User');
            $obj=$user->getUserByUsername();
            if($obj){
              if(!empty($obj['domain'])){
                echo __ROOT__.'/i/'.$obj['domain'];
                
              }else{
                  echo U('Space/index',array('id'=>$obj['id']));
              }
          }

          }



        }
    
}

