<?php
return array(
	//'配置项'=>'配置值'
	//设置可访问的目录；
	'MODULE_ALLOW_LIST'=>array('Home','Admin'),
	//设置默认目录；
	'DEFAULT_MODULE'=>'Home',
    'TEPL_TEMPLATE+SUFFIX'=>'.html',
	//trace调试；
	//'SHOW_PAGE_TRACE'=>true,
	/*'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_NAME'=>'weibo2',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_PORT'=>3306,
    'DB_PREFIX'=>'weibo_',
    'DB_CHARSET'=>'utf8',*/
   // 'DB_DEBUG'=>TRUE,
    'TMPL_ACTION_ERROR'=>'Public/jump',
    'TMPL_ACTION_SUCCESS'=>'Public/jump',
    



    'DEFAULT_THEME'=>'Default',
    'DB_TYPE'=>'mysql',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_PREFIX'=>'weibo_',
    'DB_DSN'=>'mysql:host=localhost;dbname=weibo2;charset=UTF8',
    'URL_MODEL'=>2,
   // 'COOKIE_KEY'=>'www.ycku.com',

    'UPLOAD_PATH'=>'./Uploads/',
 'DATA_CACHE_TYPE'=>'Memcache',


    //=开启路由功能；
    /*'URL_ROUTER_ON'=>true,
    'URL_ROUTE_RULES'=>array(
        'i/:domain'=>'Space/index',

    ),*/

);