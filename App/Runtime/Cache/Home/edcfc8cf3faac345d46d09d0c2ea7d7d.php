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


    <script src="/3_12/weibo/Public/Home/js/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="/3_12/weibo/Public/Home/uploadify/jquery.uploadify.min.js"></script> 
    <script type="text/javascript" src="/3_12/weibo/Public/Home/jcrop/js/jquery.Jcrop.js"></script> 
    <link rel="stylesheet" href="/3_12/weibo/Public/Home/uploadify/uploadify.css">
     <link rel="stylesheet" href="/3_12/weibo/Public/Home/jcrop/css/jquery.Jcrop.css">
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
                消息
                <dl class="list" style="display:none">
                    <dd><a href="#">@提到我的</a></dd>
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
    
    <div class="main_left">
    <ul>
    <li><a href="<?php echo U('setting/index');?>" >个人设置
    </a></li>
    <li><a href="<?php echo U('setting/avatar');?>">头像设置</a></li>
    <li><a href="<?php echo U('setting/domain');?>"  class="selected">个性域名</a></li>
    <li><a href="<?php echo U('setting/refer');?>"  >@提及到我</a></li>
    </ul>
    </div>
    <div class="main_right">
      <h2>个性域名设置！</h2>
        <dl>
<dd class="domain_help" style="display:none;">个性域名必须是4 ~ 10个字符范围内，只能是数字、字母组成，且必须
没有被注册！注册后，无法修改！</dd>

<dd class="register_domain" style="display:none;">
<input type="text" name="domain" class="form-control"><b style="color:red;">*</b>

<input type="submit" value=" 注 册 " class="register btn btn-primary btn-block"
style="margin:0;"></dd>
    

<dd class="domain"> 您 的 个 性 域 名 地 址 为 ：<a href="/3_12/weibo/i/<?php echo ($domain); ?>"
target="_blank">http://<?php echo $_SERVER['SERVER_NAME'];?>/3_12/weibo/i/<?php echo ($domain); ?></a></dd>

</dl>
<p style="margin:20px
0;font-size:13px;color:red;text-align:center;">(PS：这里不做前后端验证，不
做域名唯一性验证，请自行完成)</p>
</div>
    
    </div>

</main>

    <footer id="footer" class="clear">
      <div class="footer_left">
    &copy; 2014 Ycku.com All Rights Reserved.</div>
    <div class="footer_right">Powered By ThinkPHP.</div>
</footer>
</body>
</html>