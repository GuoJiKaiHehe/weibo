<?php
namespace Home\Model;
use Think\Model;
use Think\Image;
use Think\Upload;
class FileModel {

    public function image(){
        $upload=new Upload();
        $upload->rootPath=C('UPLOAD_PATH');
        $info=$upload->upload();
        if($info){
            $path=$info['Filedata']['savepath'];
            $name=$info['Filedata']['savename'];
            $imgPath=C('UPLOAD_PATH').$path.$name;
            $image=new Image();
            $image->open($imgPath);
            $thumbPath=C('UPLOAD_PATH').$path.'_150'.$name;
            $unfoldPath=C('UPLOAD_PATH').$path.'_550'.$name;
            $image->thumb(150,150)->save($thumbPath);

            $image->open($imgPath);
            $image->thumb(550,550)->save($unfoldPath);
            $imageArr=array(
                'thumb'=>$thumbPath,
                'unfold'=>$unfoldPath,
                'source'=>$imgPath,
                );

            return  json_encode($imageArr);

        }else{
            $this->ajaxReturn($upload->getError());
        }
    }

    public function face(){
        $upload=new Upload();
        $upload->rootPath=C('UPLOAD_PATH');
        $upload->maxSize=1048576;
        $info=$upload->upload();
        if($info){
            $path=$info['Filedata']['savepath'];
            $name=$info['Filedata']['savename'];
            $imgPath=C('UPLOAD_PATH').$path.$name;
            $image=new Image();
            $image->open($imgPath);
            $image->thumb(500,500)->save($imgPath);
            return $imgPath;
        }else{
          return  $this->$upload->getError();
        }
    }


    public function crop(){
           
        $url=I('post.url');
        $x=I('post.x');
        $y=I('post.y');
        $h=I('post.h');
        $w=('post.w');
      
        $smallPath=C('FACE_PATH').session('user_auth')['id'].'_small.jpg';
        $bigPath=C('FACE_PATH').session('user_auth')['id'].'big.jpg';
        
        $image = new Image();
        $image->open($url);
        $image->thumb($w, $h)->save($url);
        $image->thumb(200, 200, Image::IMAGE_THUMB_FIXED)->save($bigPath);
        $image->thumb(50, 50, Image::IMAGE_THUMB_FIXED)->save($smallPath);

        $imageArr=array(
            'big'=>$bigPath,
            'small'=>$smallPath,
        );
         $user=D('User');
      $user->updateFace(json_encode($imageArr));
      $userObj=$user->getUser();
      $auth=array(
                'id'=>$userObj['id'],
                'username'=>$userObj['username'],
                'face'=>json_decode($userObj['face']),
               
       );
      session('user_auth',$auth);
      echo  json_encode($imageArr);
        
      

    }

}