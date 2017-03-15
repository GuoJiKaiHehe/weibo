<?php

namespace Home\Model;
use Think\Model;
use Think\Model\RelationModel;
class ReferModel extends  RelationModel{
    protected $_auto=array(
        array('create','time',self::MODEL_INSERT,'function'),
    );
    protected $_link=array(
              'topic'=>array(
                'mapping_type'=>self::BELONGS_TO,
                'class_name'=>'Topic',
                'foreign_key'=>'tid',
                'mapping_fields'=>'content',
                ),
        );
    public function referTo($tid,$uid){
        $data=array(
            'tid'=>$tid,
            'uid'=>$uid,
        );
        if($this->create($data)){
            
            if(S('refer'.$uid)){
                $count=S('refer'.$uid);
                S('refer'.$uid,$count+1);
            }else{
                S('refer'.$uid,1);
            }
            return $this->add();
        }else{
            return $this->getError();
        }
    }

    public function getRefer(){
        //通过tid 得到 微博列表内容；，并且 uid=我现在的uid
        $map['uid']=session('user_auth')['id'];
      return  $this->relation(true)->where($map)->select();
    }

    public function readRefer($id){
        $map['id']=$id;
        if(S('refer'.session('user_auth')['id'])){
                $count=S('refer'.session('user_auth')['id']);
                S('refer'.session('user_auth')['id'],$count-1);
          }else{
                S('refer'.$uid,0);
         }
        return $this->where($map)->save(array('read'=>1));
    }

    public function getReferCount($uid){
        $map=array(
            'uid'=>$uid,
            'read'=>0
        );
        return $this->where($map)->count();
    }
}