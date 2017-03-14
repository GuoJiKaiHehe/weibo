<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <title>Document</title>
    <head>
    
<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
<link rel="stylesheet" href="/3_12/weibo/Public/Home/css/jquery.ui.css">   
<link rel="stylesheet" href="/3_12/weibo/Public/Home/css/base.css">

<script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.ui.js"></script>

<script type="text/javascript" src="/3_12/weibo/Public/Home/js/base.js"></script>


<script type="text/javascript" src="/3_12/weibo/Public/Home/js/rl_exp.js"></script> 

<link rel="stylesheet" href="/3_12/weibo/Public/Home/css/rl_exp.css">
<script type="text/javascript" src="/3_12/weibo/Public/Home/uploadify/jquery.uploadify.min.js"></script> 
<link rel="stylesheet" href="/3_12/weibo/Public/Home/uploadify/uploadify.css">
<script type="text/javascript" src="/3_12/weibo/Public/Home/js/index.js"></script>
<link rel="stylesheet" href="/3_12/weibo/Public/Home/css/index.css">
<script type="text/javascript" src="/3_12/weibo/Public/Home/js/kaiUpload.js"></script>
<script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.scrollUp.js"></script>       

<script type="text/javascript">
var ThinkPHP={
    'IMG':'/3_12/weibo/Public/<?php echo MODULE_NAME;?>/img',
    'FACE':'/3_12/weibo/Public/<?php echo MODULE_NAME;?>/face',
    'MODULE':'/3_12/weibo/index.php/Home',
    'INDEX':'<?php echo U("Index/index");?>',
    'ROOT':'/3_12/weibo',
    'UPLOADIFY':'/3_12/weibo/Public/Home/uploadify',
    'UPLOADURL':'<?php echo U("File/upload");?>',
};

</script>


    </head>
<body>
    <header id="header">
     <div class="header_main">
        <div class="logo">微博系统</div>
        <div class="nav">
            <ul>
            <li><a href="#" class="selected">首页</a></li>
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
                    <dd><a href="#">个人设置</a></dd>
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
    <div class="weibo_form clear">
    <span class="left">和大家分享一点新鲜事吧？</span>

    <span class="right weibo_num">可以输入<strong>200</strong>
    个字</span>
    <textarea class="weibo_text form-control" id="rl_exp_input" rows="5">
        
    </textarea>
   
    <a href="javascript:void(0);" class="weibo_pic" id="pic_btn">图片</a>
<div class="weibo_pic_box" id="pic_box" style="display:none;">
    <div class="weibo_pic_header">
    <span class="weibo_pic_info">共 0 张，还能上传 4 张（按住ctrl可
    选择多张）</span>
    <a href="javascript:void(0);" class="close">×</a>
    </div>
    <input type="file" name="file" id="file">
    <div class="weibo_pic_list">
    
    </div>
</div>
<a href="javascript:void(0);" id="rl_exp_btn" class="weibo_face">表情</a>
<div class="rl_exp" id="rl_bq" style="display:none;">
        <ul class="rl_exp_tab clearfix">
            <li><a href="javascript:void(0);" class="selected">默认</a></li>
            <li><a href="javascript:void(0);">拜年</a></li>
            <li><a href="javascript:void(0);">浪小花</a></li>
            <li><a href="javascript:void(0);">暴走漫画</a></li>
        </ul>
        <ul class="rl_exp_main clearfix rl_selected"></ul>
        <ul class="rl_exp_main clearfix" style="display:none;"></ul>
        <ul class="rl_exp_main clearfix" style="display:none;"></ul>
        <ul class="rl_exp_main clearfix" style="display:none;"></ul>
        <a href="javascript:void(0);" class="close">×</a>
    </div>

    <input class="weibo_button btn btn-primary pull-right" type="button" value="发布">
    </div>

     <div class="weibo_content clear">
         <ul>
            <li><a href="javascript:void(0)" class="selected">我关注的<i
            class="nav_arrow"></i></a></li>
            <li><a href="javascript:void(0)">互听的</a></li>
        </ul>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="weibo_content_data clear">
            <dt class="face">
                <a href="javascript:void(0)"><img src="/3_12/weibo/Public/Home/img/small_face.jpg" alt=""></a>
            </dt>
            <dd class="content clear">
                <h4><a href="javascript:void(0)"><?php echo ($item["username"]); ?></a></h4>
                    <p><?php echo ($item["content"]); ?></p>
                    <div class="img-list clear">
                        <?php if(!empty($item["image"])): ?><ol class="clear">
                            <?php if(is_array($item["image"])): foreach($item["image"] as $key=>$img): ?><li class="small_li"> 
                              <img src="/3_12/weibo<?php echo ($img["thumb"]); ?>" unfold="/3_12/weibo<?php echo ($img["unfold"]); ?>" source="/3_12/weibo<?php echo ($img["source"]); ?>"  alt="" />
                               </li><?php endforeach; endif; ?>
                            </ol>
                            <div class="img_zoom clear" style="display:none;">
                                <ol>
                                <li class="in"><a href="javascript:void(0)">收起</a></li>
                                <li class="source">
                                <a href="/3_12/weibo<?php echo ($img["source"]); ?>"
                                target="_blank">查看原图</a>
                                </li>
                                </ol>
                                <img data-src="##"
                                alt="">
                                </div><?php endif; ?>
                    </div>
                    <div class="footer">
                        <span class="time"><?php echo ($item["create"]); ?></span>
                        <span class="handler">赞(0) | 转播 | 评论 | 收藏</span>
                     </div>
            </dd>
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        <div id="loadmore">
            正在加载<img src="/3_12/weibo/Public/Home/img/loadmore.gif" alt="">
        </div>
     </div>
    </div><!--left weibo-->


    <div class="main_right">
    right
</div>

<div id="info">
    

</div>
<div id="ajax_html1" style="display:none;">
   <dl class="weibo_content_data clear">
            <dt class="face">
                <a href="javascript:void(0)"><img src="/3_12/weibo/Public/Home/img/small_face.jpg" alt=""></a>
            </dt>
            <dd class="content clear">
                <h4><a href="javascript:void(0)"><?php echo session('user_auth')['username'];?></a></h4>
                    <p>#内容#</p>
                    <div class="img-list clear">
                        
                           <ol class="clear">
                            
                                #THUMB#
                              <!-- <li class="small_li"> 
                              <img src="/3_12/weibo<?php echo ($img["thumb"]); ?>" unfold="/3_12/weibo<?php echo ($img["unfold"]); ?>" source="/3_12/weibo<?php echo ($img["source"]); ?>"  alt="" />
                               </li> -->
                            
                            </ol>
                            <div class="img_zoom clear" style="display:none;">
                                <ol>
                                <li class="in"><a href="javascript:void(0)">收起</a></li>
                                <li class="source">
                                <a href="#查看原图#"target="_blank">查看原图</a>
                                </li>
                                </ol>
                                <img data-src="##"
                                alt="">
                                </div>
                       
                    </div>
                    <div class="footer">
                        <span class="time">#时间#</span>
                        <span class="handler">赞(0) | 转播 | 评论 | 收藏</span>
                     </div>
            </dd>
        </dl>
</div>




</main>

    <footer id="footer">
      <div class="footer_left">
    &copy; 2014 Ycku.com All Rights Reserved.</div>
    <div class="footer_right">Powered By ThinkPHP.</div>
</footer>
</body>
</html>