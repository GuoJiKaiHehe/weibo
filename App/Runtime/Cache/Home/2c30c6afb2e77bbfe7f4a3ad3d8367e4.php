<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><ol class="comment_list">
    <li>
        <?php if(empty($obj["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['uid']));?>" target="_blank"><?php echo ($obj["username"]); ?></a>
        <?php else: ?>
        <a href="/3_12/weibo/i/<?php echo ($obj["domain"]); ?>"
        target="_blank"><?php echo ($obj["username"]); ?></a><?php endif; ?> ：<?php echo ($obj["content"]); ?>
        </li>
        <li class="line"><?php echo ($obj["create"]); ?></li>
    </ol><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="page">
        <?php echo ($page); ?>
    </div>