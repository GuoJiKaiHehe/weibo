<?php
namespace Home\Model;
use Think\Model;

class ImageModel extends  Model{

    public function storage($img=array()){
        $iid='';
        $data=array();

        foreach($img as $key=>$value){
            $data['data']=$value;
            $iid.=$this->add($data).',';
        }
       
        return substr($iid,0,-1);
        
    }
}