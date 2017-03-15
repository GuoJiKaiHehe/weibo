<?php

namespace Home\Model;
use Think\Model;

class CommentModel extends  Model{
    protected $_auto=array(
        array('create','time',SELF::MODEL_BOTH,'function'),
        array('ip','get_client_ip',SELF::MODEL_BOTH,'function'),
    );
    protected $_validate=array(
        //-1  ，长度不符合；
        //array('content','1,10',-1,0,'length'),
        // array('content','/\S+/g',-1,0,'regex'),
    );
    //发表评论；
    public function publish(){
        $content=I('post.content');
        $tid=I('post.tid');
        $uid=session('user_auth')['id'];
        $data=array(
            'content'=>$content,
            'tid'=>$tid,
            'uid'=>$uid,
        );
        
        if($this->create($data)){
            $cid=$this->add();
            if($cid){
                //评论成功！
               $topic=D('Topic');
               $topic->comCount($tid);
               return $cid;
            }

        }else{
            return  $this->getError();
        }
    }

    public function getList($page=1){

        $tid=I('post.tid');

        //总条数；
        $html='';
        $count=$this->table('__COMMENT__ a,__USER__ b')
                 ->field('a.id,a.content,a.create,a.uid,b.username,b.domain')
                ->where('a.uid=b.id AND a.tid='.$tid)
                ->count();
        $MaxPageNum=ceil($count/3);
        $first=($page-1)*3;
        for($i=1;$i<=$MaxPageNum;$i++){
            if($i==$page){
             $html.='<a href="javascript:void(0)" page="'.$i.'" class="page_comment select">'.$i.'</a>';
            }else{
                $html.='<a href="javascript:void(0)" page="'.$i.'" class="page_comment">'.$i.'</a>';
            }


     //   $html.='<a href="" page="{$i}" class="page_comment select" >'.{$i}.'</a>';

      

  //  $html.='<a href="###" page="'.{$i}.'" class="page_comment">'.{$i}.'</a>';

        }
        //列表；
       $list=$this->table('__COMMENT__ a,__USER__ b')
                 ->field('a.id,a.content,a.create,a.uid,b.username,b.domain')
                ->where('a.uid=b.id AND a.tid='.$tid)
                ->limit($first,3)
                ->select();
        return $listArr=array(
                   'list'=>$list,
                   'page'=>$html,
                );
    }

}


