<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_TEMPLATE_SUFFIX'=>'.html',
    
    'DEFAULT_THEME'=>'Default',
    //设置模板替换变量；
    'TMPL_PARSE_STRING'=>array(
		'__EASYUI__'=>__ROOT__.'/Public/'.MODULE_NAME.'/easyui',
        '__CSS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/css',
        '__JS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/js',
        '__IMG__'=>__ROOT__.'/Public/'.MODULE_NAME.'/img',
    ),
);