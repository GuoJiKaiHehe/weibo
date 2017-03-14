<?php

namespace Home\Model;
use Think\Model;

class UserModel extends  Model{
    protected $_auto=array(
        array('password','sha1',SELF::MODEL_BOTH,'function'),
        );
    protected $_validate=array(
        //-1,用户名长度不合法
        array('username','/[^@]{2,20}/g',-1,0,'regex'),
        //-2,密码长度不合法
        array('password','6-20',-2,0,'length'),
        //-3,密码和密码确认必须一致
        array('repassword','password',-3,0,'confirm'),
        //-4,邮箱格式不正确
        array('email','email',-4,0),
        //-5,用户名被占用
        array('username','',-5,0,'unique',self::MODEL_INSERT),
        //-6,生日不能为空
        array('birthday','require',-6,0),
        //-7,生日不能为空
        array('email','',-7,0,'unique',self::MODEL_INSERT),

    );
   

    public function register(){
        $data=array(
            'username'=>I('post.username'),
            'password'=>I('post.password'),
            'repassword'=>I('post.repassword'),
            'email'=>I('post.email'),
            'birthday'=>I('post.birthday'),
            'last_login'=>NOW_TIME,
            'last_ip'=>get_client_ip(1),
            'create'=>NOW_TIME,

        );
        if($this->create($data)){
            return  $this->add();
        }else{
            return  $this->getError();
        }
    }
    public function login(){
        $auto=I('post.auto');
        $value=I('post.username');
        $nameType='';

        if(strpos($value,'@')){
            $nameType='email';
        }else{
            $nameType='username';
        }
        $data=array(
            $nameType=>$value,
            'password'=>sha1(I('post.password')),
        );
        $userObj=$this->where($data)->field('id,password,username')->find();
        sleep(2);
        if($userObj){
            $update=array(
                'id'=>$userObj['id'],
                'last_login'=>NOW_TIME,
                'last_ip'=>get_client_ip(1),
            );
            $this->save($update);
            $auth=array(
                'id'=>$userObj['id'],
                'username'=>$userObj['username'],
                'last_login'=>$userObj['last_login'],
            );
            session('user_auth',$auth);
            if($auto=='on'){
                cookie('auto',encryption($userObj['username']),3600*24*30);
            }
            return 1;
        }else{
            return -9; //账号或密码不正确;
        }
        
    }

    //检查字段；
    public function checkField($field){
        $data=array(
            $field=>I('post.'.$field),
        );
      // print_r($this->create($data));
       //如果在数据表找到数据则没有返回值；
       //
       sleep(2);
        if($this->create($data)){ 
            return 'true';
        }else{
            return 'false'; 
        }
    }
    public function getUser($id=0){
        if(!$id){
            $id=session('user_auth')['id'];
        }
        return $this->where('id='.$id)->find();
    }
    public function updateUser(){
         $id=session('user_auth')['id'];
         $data=array(
            'intro'=>I('post.intro')
        );
        return  $this->where('id='.$id)->save($data);
    }
}