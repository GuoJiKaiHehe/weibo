<?php

namespace Home\Model;
use Think\Model;

class TopicModel extends  Model{
    protected $_auto=array(
        array('create','time',self::MODEL_INSERT,'function'),
    );
    protected $_validate=array(
        // -9 内容必须在指定范围内；
        array('content','1,200',-9,0,'length'),

    );
    //发布微博；
    public function publish($iid=''){

        $data=array(
            'content'=>I('post.content'),
            'ip'=>get_client_ip(1),
            'iid'=>$iid,
            'uid'=>session('user_auth')['id'],
        );

        if($this->create($data)){
            return $tid=$this->add(); // tid;
            
        }else{
            return $this->getError();
        }
    }
    private function format($list){
        $map=array();
        foreach($list as $key=>$value){
            if(!empty($value['iid'])){
                $image=array();
               
                $map['id']=array('in',$value['iid']);
                $image=D('Image')->where($map)->field('data')->select();
              //  print_r($image);
                foreach($image as $k2=>$v2){
                    $list[$key]['image'][$k2]=json_decode($v2['data'],true);
                }
            }
$list[$key]['content']=preg_replace('/\[(a|b|c|d)_([0-9]+)\]/i', 
                        '<img src="'.__ROOT__.'/Public/'.MODULE_NAME.'/face/$1/$2.gif" style="display:inline-block;" class="" />',
                         $list[$key]['content']);


        }

        return $list;
    }
    public function getList($first,$total=5){


        return $this->format($this->table('__TOPIC__ a,__USER__ b')
                                ->field('a.id,a.content,a.create,b.username,a.create,b.id,a.iid')
                                ->order('a.create DESC')
                                ->where('a.uid=b.id')
                                ->limit($first,$total)
                                ->select());


    }

    public function ajaxCount(){
       
   
       $count=$this->where('1=1')->count();
       return  ceil($count/5);
           //总页数；
       
    }
}