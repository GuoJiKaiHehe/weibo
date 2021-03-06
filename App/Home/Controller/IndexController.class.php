<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController {
    public function index(){
      
       if($this->checkLogin()){

         $topic=D('Topic');
         $list=$topic->getList(0);
         
         $this->assign('list',$list);
         $this->display();
        }else{
            $this->error('非法进入！');
        }
      
    }

    public function details($tid,$rid){
        $topic=D("Topic");
        $refer=D('Refer'); //修改已读；
        $refer->readRefer($rid);
        $obj=$topic->getOne($tid);

        $this->assign("obj",$obj);
        
        $this->display();
    }
}