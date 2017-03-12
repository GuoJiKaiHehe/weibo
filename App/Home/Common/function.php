<?php

function checkVerify($code,$id=1){
    $verify=new \Think\Verify();
    $verify->reset=false;
    return $verify->check($code,$id);
}

function encryption($username,$type=0){
    $key=sha1(C('COOKIE_KEY'));
    if(!$type){
            //加密
        return base64_encode($username ^ $key);
    }
        //解密；
    $username=base64_decode($username);
    return $username ^ $key;
    
}