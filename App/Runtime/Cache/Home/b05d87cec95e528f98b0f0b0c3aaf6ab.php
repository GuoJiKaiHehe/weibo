<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="weibo_content_data clear">
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