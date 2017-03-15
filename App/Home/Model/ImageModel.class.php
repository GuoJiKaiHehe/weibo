<?php
namespace Home\Model;
use Think\Model;
use Think\Image;
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
    public function crop(){
        

    }
}