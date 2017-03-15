<?php

namespace Home\Controller;
use Think\Controller;

class ReferController extends Controller{

    public function getReferCount(){

        $refer=D('Refer');
        echo $refer->getReferCount(session('user_auth')['id']);
    }


}