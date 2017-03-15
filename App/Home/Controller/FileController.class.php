<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
use Home\Model\FileModel;
class FileController extends HomeController {
    public function index(){
      
      
    }
    public function upload(){
       $file=D('File');
       $this->ajaxReturn($file->image());
    }

    public function face(){
        $file=D('File');
       echo $file->face();
    }


    //图像裁剪；
    public function crop(){
        if(IS_AJAX){
            $file=D('File');
       echo $file->crop();
        
        }else{
            echo 'feifajinqu';
        }
        
    }
}

/*$x=I('post.x');
        $y=I('post.y');
        $w=I('post.w');
        $h=I('post.h');
        $url=I('post.url');
        $bigPath=C('FACE_PATH').session('user_auth')['id'].'.jpg';
        $smallPath=C('FACE_PATH').session('user_auth')['id'].'_small.jpg';
        $image=new Image();
        $image->open($url);
        $image->crop($w,$h,$x,$y)->save($url);

        $image->thumb(200,200,Image::IMAGE_THUMB_FIXED)->save($bigPath);
         $image->thumb(50,50,Image::IMAGE_THUMB_FIXED)->save($smallPath);

        $imageArr=array(
            'bigPath'=>$bigPath,
            'smallPath'=>$smallPath,
            );
        return $imageArr;*/