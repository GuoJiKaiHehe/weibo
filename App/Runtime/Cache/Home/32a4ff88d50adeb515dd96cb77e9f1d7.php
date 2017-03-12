<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
    <link rel="stylesheet" href="/3_12/weibo/Public/Home/css/jquery.ui.css">   
    <link rel="stylesheet" href="/3_12/weibo/Public/Home/css/base.css">
    <link rel="stylesheet" href="/3_12/weibo/Public/Home/css/login.css">
    <script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.js"></script>
    <script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.ui.js"></script>
    <script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/3_12/weibo/Public/Home/js/jquery.form.js"></script>
    <script type="text/javascript" src="/3_12/weibo/Public/Home/js/base.js"></script>
    <script type="text/javascript" src="/3_12/weibo/Public/Home/js/login.js"></script>
    <script type="text/javascript">
    var ThinkPHP={
        'IMG':'/3_12/weibo/Public/<?php echo MODULE_NAME;?>/img',
        'MODULE':'/3_12/weibo/index.php/Home',
        'INDEX':'<?php echo U("Index/index");?>',
    };
   
    </script>
</head>
<body>
<header id="header">
    
</header>
<main id="main">
 <!--登陆-->  
<form action="" id="login">
<p>
    <label for="username">账号：</label>
    <input type="text" name="username" class="text" placeholder="账号/邮箱"/>
</p>
<p>
<label for="password"> 密码： </label>
  <input type="password" name="password" class="text"placeholder="密码" />
</p>

<label class="auto" for="auto">
    <input type="checkbox" name="auto" id="auto">自动登录
</label>


<input type="submit" value="登陆" name="submit" class="submit" />

    <div class="bottom">
        <a href="javascript:void(0)" id="reg_link">注册新用户</a> |
        <a href="javascript:void(0)">忘记密码？</a>
    </div>
</form> 

<!--注册-->
<form action="" id="register" class="form-horizontal">
<ol class="error">
    
</ol>
<div class="form-group">
    <label  for="rg_user"  class="col-sm-2 control-label">账号：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="rg_user" name="username" placeholder="请输入账号">
      <span class="star">*</span>
    </div>
  </div>

    <div class="form-group">

    <label for="pass" class="col-sm-2 control-label">密码：</label>

    <div class="col-sm-10">
        <input type="password" name="password" class="text form-control" id="pass" placeholder="密码，不小于6位！" />
    <span class="star">*</span>
    </div>
   
    </div>

    <div class="form-group">

    <label for="pass" style="padding-left:2px;" class="col-sm-2 control-label">确码：</label>

    <div class="col-sm-10">
        <input type="password" name="repassword" class="text form-control" id="pass"
    placeholder="和密码一致" />
    <span class="star">*</span>
    </div>
   
    </div>

    <div class="form-group">
        <label for="email" class="control-label col-sm-2">邮箱：</label>

    <div class="col-sm-10">
        <input type="text" name="email" class="text form-control" id="email" placeholder="电子邮件，用于找回密码！" />
        <span class="star">*</span>
     </div>
    </div>

    <div class="form-group">
        <label for="birthday" class="control-label col-sm-2">生日：</label>
      <div class="col-sm-10">
        <input type="text" readonly name="birthday" class="text form-control" id="birthday"placeholder="出生日期" />
        <span class="star">*</span>
        </div>
    </div>
</form>
</main>
<div id="info">
 弹出信息！   
</div>
<form id="verify" class="form-horizontal">
    <ol class="error"></ol>

    <div class="form-group">
        <label for="verifyText" style=" text-align:right;padding-right:0;margin-top:0px;" class="control-label col-sm-4">验证码：</label>
      <div class="col-sm-6">
        <input type="text" name="verifyText" class="text verifyText  form-control" id="verifyText"placeholder="验证码" />
        <span class="star">*</span>
        </div>
    </div>
    <div  style="margin:0 auto;text-align:center;">
        <img src="<?php echo U('verify');?>" class="verifyimg changeimg">
    </div>
</form>
<footer id="footer">
    <p class="footer_text">&copy;2009-2014 瓢城 Web 俱乐部. Powered by
ThinkPHP.<p>
</footer>
</body>
</html>