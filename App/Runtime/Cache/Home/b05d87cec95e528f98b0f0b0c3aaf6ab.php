<?php if (!defined('THINK_PATH')) exit();?><!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="weibo_content_data clear">
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
 -->

 <!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="weibo_content_data clear">
            <dt class="face">
                <a href="<?php echo U('Space/index',array('id'=>$item['uid']));?>">
                    <img src="/3_12/weibo/Public/Home/img/small_face.jpg" alt="">
                </a>
            </dt>
            <dd class="content clear">
                <h4><a href="<?php echo U('Space/index',array('id'=>$item['uid']));?>"><?php echo ($item["username"]); ?></a></h4>
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
                        <span class="handler">赞(0) 
                         <a href="javascript:void(0)" class="re">转播</a> | 评论 | 收藏</span>
                         <div class="re_box" style="display:none;">
                            <p>表情、字数限制自行完成</p>
                            <textarea class="re_text" name="commend"></textarea>
                            <input type="text" name="reid" value="<?php echo ($item["id"]); ?>" />
                            <input class="re_button btn btn-default" type="button" value="转播">
                        </div>
                     </div>
            </dd>
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
 -->


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(empty($item["reid"])): ?><dl class="weibo_content_data clear">
            <dt class="face">
                <a href="<?php echo U('Space/index',array('id'=>$item['uid']));?>">
                    <img src="/3_12/weibo/Public/Home/img/small_face.jpg" alt="">
                </a>
            </dt>
            <dd class="content clear">
                <h4><a href="<?php echo U('Space/index',array('id'=>$item['uid']));?>"><?php echo ($item["username"]); ?></a></h4>
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
                        <span class="handler">赞(0) 
                         <a href="javascript:void(0)" class="re">转播(<?php echo ($item["recount"]); ?>)</a> |
                         <a href="javascript:void(0)" class="com">评论(<?php echo ($item["comcount"]); ?>)</a> | 收藏(0)</span>
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
                        <p style="text-align:center;">加载中....<img src="/3_12/weibo/Public/Home/img/loadmore.gif"
                        alt=""></p>
                        </div>
                        </div>
                     </div>
            </dd>
        </dl>

        <?php else: ?> <!--這里是转发的微博！-->
            <dl class="weibo_content_data clear">
            <dt class="face">
                <a href="<?php echo U('Space/index',array('id'=>$item['uid']));?>">
                    <img src="/3_12/weibo/Public/Home/img/small_face.jpg" alt="">
                </a>
            </dt>
            <dd>
            <h4><a href="<?php echo U('Space/index',array('id'=>$item['uid']));?>"><?php echo ($item["username"]); ?></a></h4>
            <p>
                <?php echo ($item["content"]); ?>
            </p></dd>

             <dd>
                 <div class="re_content clear">
                <h5><a href="<?php echo U('Space/index',array('id'=>$item['recontent']['uid']));?>"><?php echo ($item["recontent"]["username"]); ?></a></h5>
                <p><?php echo ($item["recontent"]["content"]); ?></p>
                <div class="footer">
                    <span class="time"><?php echo ($item["create"]); ?></span>
                    <span class="handler">赞(0) 
                     <a href="javascript:void(0)" class="re">转播(<?php echo ($item["recontent"]["recount"]); ?>)</a> | 
                     <a href="javascript:void(0)" class="com">评论(<?php echo ($item["recontent"]["comcount"]); ?>)</a> | 收藏</span>
                     <div class="re_box re_com_box" style="display:none;">
                        <p>表情、字数限制自行完成</p>
                        <textarea class="re_text" name="commend"></textarea>
                        <input type="text" name="reid" value="<?php echo ($item["recontent"]["id"]); ?>" />
                        <input class="re_button btn btn-default" type="button" value="转播">
                    </div>
                    <div class="com_box re_com_box" style="display:none;">
                        <p>表情、字数限制自行完成</p>
                        <textarea class="re_text" name="comment_text"></textarea>
                        <input type="hidden" name="tid" value="<?php echo ($item["recontent"]["id"]); ?>" />
                        <input class="com_button" type="button" value="评论">
                        <div class="comment_content">
                        <!--这里通过Ajax插入评论列表-->
                        <p style="text-align:center;">加载中....<img src="/3_12/weibo/Public/Home/img/loadmore.gif"
                        alt=""></p>
                        </div>
                        </div>
                 </div>
                </div>
                
             </dd>
             <dd>
                 <div class="footer">
                    <span class="time"><?php echo ($item["create"]); ?></span>
                    <span class="handler">赞(0) 
                     <a href="javascript:void(0)" class="re">转播(<?php echo ($item["recount"]); ?>)</a> | 
                     <a href="javascript:void(0)" class="com">评论(<?php echo ($item["comcount"]); ?>)</a> | 收藏</span>
                     <div class="re_box re_com_box" style="display:none;">
                        <p>表情、字数限制自行完成</p>
                        <textarea class="re_text" name="commend"></textarea>
                        <input type="text" name="reid" value="<?php echo ($item["id"]); ?>" />
                        <input class="re_button btn btn-default" type="button" value="转播">
                    </div>
                    <div class="com_box re_com_box" style="display:none;">
                        <p>表情、字数限制自行完成</p>
                        <textarea class="re_text" name="comment_text"></textarea>
                        <input type="hidden" name="tid" value="<?php echo ($item["id"]); ?>" />
                        <input class="com_button" type="button" value="评论">
                        <div class="comment_content">
                        <!--这里通过Ajax插入评论列表-->
                        <p style="text-align:center;">加载中....<img src="/3_12/weibo/Public/Home/img/loadmore.gif"
                        alt=""></p>
                        </div>
                        </div>
                 </div>
             </dd>
            </dl><?php endif; endforeach; endif; else: echo "" ;endif; ?>