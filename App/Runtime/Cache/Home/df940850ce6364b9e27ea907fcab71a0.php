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
    
    <div class="main_left">
        <div class="WB_detail">
            <div class="WB_info">
               
                   
          


         <div class="WB_media_wrap "  style="display: block;">
            <div class="media_box">
               <div class="panel panel-default">
                   <div class="panel-heading">
                   <a href="<?php echo U('Space/index',array('id'=>$obj['uid']));?>">
                        <img src="/3_12/weibo/Public/Home/img/small_face.jpg" alt="">
                   </a>
                        <a href=""><?php echo ($obj['user']['username']); ?></a>
                   </div>
                   <div class="panel-body text-primary">
                       <?php echo ($obj["content"]); ?>

                       <input type="text" class="form-control"/>
                       <div class="footer">
                        <span class="time"><?php echo (date($obj["create"])); ?></span>
                        <span class="handler">赞(0) 
                         <a href="javascript:void(0)" class="re">转播(<?php echo ($obj["recount"]); ?>)</a> |
                         <a href="javascript:void(0)" class="com">评论(<?php echo ($obj["comcount"]); ?>)</a> | 收藏(0)</span>
                         <div class="re_box re_com_box" style="display:none;">
                            <p>表情、字数限制自行完成</p>
                            <textarea class="re_text" name="commend"></textarea>
                            <input type="text" name="reid" value="<?php echo ($item["id"]); ?>" />
                            <input class="re_button btn btn-default" type="button" value="转播">
                        </div>

                        <!--评论！-->
                        <div class="com_box re_com_box" style="display:none;">
                        <p>表情、字数限制自行完成</p>
                        <textarea class="re_text" name="comment_text"></textarea>
                        <input type="hidden" name="tid" value="<?php echo ($item["id"]); ?>" />
                        <input class="com_button btn btn-default pull-right" type="button" value="评论">
                        <div class="comment_content">
                        <!--这里通过Ajax插入评论列表-->
                       
                        </div>
                        </div>
                     </div>
                   </div>
                   <div class="panel-footer">
                       
                   </div>
               </div>
           
           </div>
            </div>

     </div>
    </div>
    <div class="main_right">
        
    </div>



</main>

    <footer id="footer" class="clear">
      <div class="footer_left">
    &copy; 2014 Ycku.com All Rights Reserved.</div>
    <div class="footer_right">Powered By ThinkPHP.</div>
</footer>
</body>
</html>