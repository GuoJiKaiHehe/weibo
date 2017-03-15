<?php
namespace Home\Controller;
use Think\Controller;
class TopicController extends HomeController {
    public function index(){
      
    }
    //发布微博；
    public function  publish(){
        if(IS_AJAX){
         //   print_r(I('post.','',false));exit;
           $iid='';
            if(!empty($img=I('post.img','',false)) ){
                if(is_array($img)){

                    $image=D('Image');
                    $iid=$image->storage($img); 
                }
            }

            $topic=D('Topic');
           echo $topic->publish($iid);
        }else{
            $this->error('非法访问');
        }
    }
    public function ajaxList(){
        if(IS_AJAX){
            $topic=D('Topic');
            $ajaxList=$topic->getList(I('post.first'));
            $this->assign('list',$ajaxList);
            $this->display();
        }else{
            $this->error('非法访问');
        }
    }
     public function ajaxCount(){
         $topic=D('Topic');
   
       echo  $topic->ajaxCount();
       
           //总页数；
       
    }


    public function reBroadCast(){
        if(IS_AJAX){
            $topic=D('Topic');
        echo $topic->publish('',I('post.reid'));

        }
    }
}