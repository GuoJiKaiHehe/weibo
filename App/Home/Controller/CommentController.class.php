<?php

namespace Home\Controller;
use Think\Controller;

class CommentController extends Controller{
    //发表评论；
    //
    public function publish(){
        if(IS_AJAX){
            $comment=D("Comment");
           echo $comment->publish();
        }
    }

    //获取评论列表；
    public function getList(){
        $comment=D("Comment");
        if(empty($page=I('post.page'))){
            $page=1;
        }else{
            $page=I('post.page');
        }

        $listArr=$comment->getList($page);

        $this->assign('list',$listArr['list']);
        $this->assign('page',$listArr['page']);
        $this->display();
    }
}