<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <title>Document</title>
    <head>
    
<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
<link rel="stylesheet" href="/3_12/weibo/Public/Home/css/jquery.ui.css">   
<link rel="stylesheet" href="/3_12/weibo/Public/Home/css/indexBase.css">

<script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.ui.js"></script>

<script type="text/javascript" src="/3_12/weibo/Public/Home/js/base.js"></script>


    <script src="/3_12/weibo/Public/Home/js/setting.js"></script>
    <link rel="stylesheet" href="/3_12/weibo/Public/Home/css/setting.css">


<script type="text/javascript">
var ThinkPHP={
    'IMG':'/3_12/weibo/Public/<?php echo MODULE_NAME;?>/img',
    'FACE':'/3_12/weibo/Public/<?php echo MODULE_NAME;?>/face',
    'MODULE':'/3_12/weibo/Home',
    'INDEX':'<?php echo U("Index/index");?>',
    'ROOT':'/3_12/weibo',
    'UPLOADIFY':'/3_12/weibo/Public/Home/uploadify',
    'UPLOADURL':'<?php echo U("File/upload");?>',
    'FACEURL':'<?php echo U("File/face");?>',
    'IMGURL':'<?php echo U("File/image");?>',
    'SERVER_NAME':'<?php echo $_SERVER["SERVER_NAME"];?>',
};

</script>


    </head>
<body>
    <header id="header">
     <div class="header_main">
        <div class="logo">微博系统</div>
        <div class="nav">
            <ul>
            <li><a href="<?php echo U('Index/index');?>" class="selected">首页</a></li>
            <li><a href="#">图片</a></li>
            <li><a href="#">找人</a></li>
            </ul>
        </div>
        <div class="person">
            <ul>
            <li><a href="#"><?php echo session('user_auth')['username'];?></a></li>
            <li class="app">
                消息<span class="badge"><?php echo ($count); ?></span>
                <dl class="list" style="display:none">
                    <dd><span class="badge text-right"><?php echo ($count); ?></span><a href="<?php echo U('Setting/refer');?>">@提到我的</a></dd>
                    <dd><a href="#">收到的评论</a></dd>
                    <dd><a href="#">发出的评论</a></dd>
                    <dd><a href="#">我的私信</a></dd>
                    <dd><a href="#">系统消息</a></dd>
                    <dd><a href="#" class="line">发私信»</a></dd>
                </dl>
            </li>
            <li class="app">帐号
                <dl class="list"  style="display:none">
                    <dd><a href="<?php echo U('Setting/index');?>">个人设置</a></dd>
                    <dd><a href="#">排行榜</a></dd>
                    <dd><a href="#">申请认证</a></dd>
                    <dd><a href="<?php echo U('User/logout');?>" class="line">退出»</a></dd>
                </dl>
            </li>
            </ul>
        </div>

        <div class="search">
            <form method="post" action="#">
            <input type="text" id="search"
            placeholder="请输入微博关键字" />
            <a href="javascript:void(0)" class="search_btn"></a>
            </form>
        </div>
    </div>
</header>
    <main id="main" class="clear">
    
<style>
   .main_right dl dd{
        border-bottom: :1px solid #ccc;
    }

</style>
    <div class="main_left">
    <ul>
    <li><a href="<?php echo U('setting/index');?>" >个人设置
    </a></li>
    <li><a href="<?php echo U('setting/avatar');?>">头像设置</a></li>
    <li><a href="<?php echo U('setting/domain');?>" >个性域名</a></li>
    <li><a href="<?php echo U('setting/refer');?>"  class="selected">@提及到我</a></li>
    </ul>
    </div>
    <div class="main_right">
        <h2>@提及到我</h2>
        <dl style="font-size:14px;">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if($item["read"] == 1): ?><dd class="a">
            您 被 微 博 ： “ 
            <a href="<?php echo U('Home/Index/details',array('tid'=>$item['tid'],'rid'=>$item['id']));?>"  class="text-muted" ><?php echo (mb_substr($item["topic"]["content"],0,10,'utf8')); ?>...</a>”提及到！
            </dd>
        <?php else: ?>
            <dd class="a">
            您 被 微 博 ： “ 
            <a href="<?php echo U('Home/Index/details',array('tid'=>$item['tid'],'rid'=>$item['id']));?>" ><?php echo (mb_substr($item["topic"]["content"],0,10,'utf8')); ?>...</a>”提及到！
            </dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </dl>

  </div>

</main>

    <footer id="footer" class="clear">
      <div class="footer_left">
    &copy; 2014 Ycku.com All Rights Reserved.</div>
    <div class="footer_right">Powered By ThinkPHP.</div>
</footer>
</body>
</html>