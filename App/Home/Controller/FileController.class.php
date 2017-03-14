<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class FileController extends HomeController {
    public function index(){
      
      
    }
    public function upload(){
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

            echo json_encode($imageArr);

        }else{
            $this->ajaxReturn($upload->getError());
        }
    }
}

