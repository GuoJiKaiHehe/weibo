<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_TEMPLATE_SUFFIX'=>'.html',
    
   
    //设置模板替换变量；
    'TMPL_PARSE_STRING'=>array(
        '__CSS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/css',
        '__JS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/js',
        '__IMG__'=>__ROOT__.'/Public/'.MODULE_NAME.'/img',
        '__UPLOADIFY__'=>__ROOT__.'/Public/'.MODULE_NAME.'/uploadify',
        '__JCROP__'=>__ROOT__.'/Public/'.MODULE_NAME.'/jcrop',
    ),
    'COOKIE_KEY'=>'guojikai',
    'FACE_PATH'=>'./Uploads/face/',


    'URL_ROUTER_ON'=>true,
    //配置路由规则
    'URL_ROUTE_RULES'=>array(
    //每条键值对，对应一个路由规则
    'i/:domain'=>'Home/Space/index',
    ),
);