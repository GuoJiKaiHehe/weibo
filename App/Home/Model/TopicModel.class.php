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
    public function publish($iid='',$reid=0){

        $data=array(
            'content'=>I('post.content'),
            'ip'=>get_client_ip(1),
            'iid'=>$iid,
            'uid'=>session('user_auth')['id'],
            'reid'=>$reid,
        );
        if($this->create($data)){
             $tid=$this->add(); // tid;

             if($data['reid']>0){
                
                $this->reCount($reid);
             }
            return $tid;
        }else{
            return $this->getError();
        }
    }
    public  function reCount($id){
        // $map['id']=$id;
        $this->where(array('id'=>$id))->setInc('reCount');
       
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
                            //'/(@\S+)\s/i';
            $list[$key]['content']=preg_replace('/(@\S+)\s?/i','<a href="'.__ROOT__.'/$1"  class="space">$1</a>',$list[$key]['content']);
            if(!empty($list[$key]['reid'])){
              //  var_dump($list[$key]['reid']);
                //echo $this->getReContent($list[$key]['reid']);
                $list[$key]['recontent']=$this->getReContent($list[$key]['reid'])[0];
               
            }
        }

        return $list;
    }
    public function getList($first,$total=5){


        return $this->format($this->table('__TOPIC__ a,__USER__ b')
                                ->field('a.id,a.content,a.create,b.username,b.domain,a.uid,a.create,a.iid,a.reid,a.reCount')
                                ->order('a.create DESC')
                                ->where('a.uid=b.id')
                                ->limit($first,$total)
                                ->select());

    }

    public function getReContent($reid){

        //获取转发微博的内容！；
        return $this->format($this->table('__TOPIC__ a,__USER__ b')
                           ->field('a.id,a.content,a.create,b.username,b.domain,a.uid,a.create,a.iid,a.reid,a.reCount')
                           ->where(array('a.id='.$reid.' AND a.uid=b.id'))
                           ->select());
        
    }

    public function ajaxCount(){
       
   
       $count=$this->where('1=1')->count();
       return  ceil($count/5);
           //总页数；
       
    }
    /*public function getOne($tid){

        return $this->where('id='.$tid)->field('')->find();
    }*/


}