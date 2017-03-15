$(function(){
	var totalNum=200;
	
	function check_num(){
		var text=$('.weibo_text');
		var value=$.trim($(text).val());
		var len=value.length;
		var diff=totalNum-len;
		if(diff<0){
			diff=parseInt(Math.abs(diff));
			var str='你已经超过了<strong>'+diff+'</strong>字';
			$('.weibo_num').html(str);
			return false;
		}else{
			
			var str='可以输入<strong>'+diff+'</strong>个字';
			$('.weibo_num').html(str);
				
			if(len>0){
				return true;
			}
			
		}
		
	}
	
	$('.weibo_text').on('keyup',function(){
		check_num()
	}).on('paste',function(){
		setTimeout(function(){
			check_num()
		},50)
	}).on('focus',function(){
		setTimeout(function(){
			check_num()
		},50)
	});
	//点击发布微博；
	$('#main').on('click','.weibo_button',function(){
		if($.trim($('.weibo_text').val()).length==0){
			$('#info').dialog('open').removeAttr('class').addClass('Infoerror').html('请输入内容！');
			setTimeout(function(){
				$('#info').dialog('close');
			},1000)
		}else{
			if($('.weibo_text').val().length==0 && $('.weibo_pic_content input[name="image"]').length>0){
				$('.weibo_text').val('分享图片');
			}
			if(check_num()){
				var img=[];
				var image=$('.weibo_pic_list input[name="image"]');
				for(var i=0;i<image.length;i++){
						img[i]=image.eq(i).val();
				}
				send_ajax(img);
			}
		}
	});
	//点击放大图片；
	$('#main').on('click','.img-list ol img',function(){
		var unfold=$(this).attr('unfold');
		console.log(unfold);
		
		$(this).parent().parent().next().show(1000).find('img').attr('src',unfold);	

	});
	$('#main').on('click','.in',function(){
		$(this).parent().parent().hide(1000);
	});
	
	img_center();
function img_center(){
	var allimg=$('.img-list img')
	for(var i=0;i<allimg;i++){
		if(allimg.eq(i).width()>100){
			allimg.eq(i).css('left',(allimg.eq(i)-width()-100)/2);
		}
		if(allimg.eq(i).height()>100){
			allimg.eq(i).css('left',(allimg.eq(i)-height()-100)/2);
		}
		
	}
}
	window.scrollFlag=true;
	window.pageNum=5;
	window.first=5;
	window.page=1;
	
	$.ajax({
		url:ThinkPHP['MODULE']+'/Topic/ajaxCount',
		type:'POST',
		success:function(msg){
			window.count=parseInt(msg);
			
		}
	});
	
	$(window).scroll(function(e){
		
		if(window.page<window.count){
			if(window.scrollFlag){
				setTimeout(function(){
					
					if($(window).scrollTop()+$(window).height()-200>=$(document).height()-200){
						$.ajax({
							url:ThinkPHP['MODULE']+'/topic/ajaxList',
							type:'POST',
							data:{
								first:window.first,
								
							},
							success:function(data){
								window.page++;
								window.first=(window.page-1)*window.pageNum;
								$('#loadmore').before(data);
							}
						})
					}
						
					//定时器加载数据结束后，再把flag变为true
					window.scrollFlag=true;
				},500);
				window.scrollFlag=false;
			}
		}else{
			$('#loadmore').html('没有更多数据了！');
		}
	});
	$.scrollUp({
		scrollName:'scrollUp',
		topDistance:'300',
		topSpeed:300,
		animation:false,
		animationInSpeed:200,
		animationOutSpeed:200,
		scrollText:'',
		activeOverlay:false,
	});
	setUrl(); //设置url space、
	
	//转播微博按钮点击事件；
	$('#main').on('click','.re',function(){
		if($(this).parent().parent().find('.re_box').is(':hidden')){
			$(this).parent().parent().find('.re_box').show();
		}else{
			$(this).parent().parent().find('.re_box').hide();
		}
		
		
	});
	//点击转发按钮；
	$('#main').on('click','.re_button',function(){
		var _this=this;
		var reid=$(this).parent().find('input[name="reid"]').val();
		var content=$(this).parent().find('.re_text').val();
		
		$.ajax({
			type:'POST',
			url:ThinkPHP['MODULE']+'/Topic/reBroadCast',
			data:{
				'reid':reid,
				'content':content,
			},
			beforeSend:function(e){
				$(_this).attr('disable',true);
			},
			success:function(data){
				if(data){
					
				
					$('#info').dialog('open').removeAttr('class').addClass('succ').html('转播成功！');
					
					setTimeout(function(){
						$('#info').dialog('close')
						$(_this).removeAttr('disable');
						$(_this).parent().find('.re_text').val('');
						$(_this).parent().hide();
					},1000);
				}
			}
		})
	});
	
	
	
});//document.readyState
function setUrl(){
	
		
	
	for(var i=0;i<$('.space').length;i++){
		var username=$('.space').eq(i).text().substr(1);
		if($('.space').eq(i).attr('flag')!='true'){
			$.ajax({
				url:ThinkPHP['MODULE']+'/Space/setUrl',
				type:'POST',
				data:{'username':username},
				beforeSend:function(xhr){
					
				},
				async:false,
				success:function(data){
					if(data){
						//alert(data);
						$('.space').eq(i).attr('flag','true');
						console.log($('.space').get(i));
						$('.space').get(i).href = data;
					}else{
						$('.space').eq(i).replaceWith('@'+username+' ');
					}
				}
			});
		}
	}
	
}



function send_ajax(img){
	$.ajax({
			url:ThinkPHP['ROOT']+'/Topic/publish',
			type:'POST',
			data:{
				'content':$('.weibo_text').val(),
				'img':img,
			},
			beforeSend:function(xhr){
				$('.weibo_button').attr('disable',true);
			},
			success:function(msg){
				$('.weibo_pic_box').hide();
				$('.weibo_button').removeAttr('disable');
				if(msg){
				$('#info').dialog('open').removeAttr('class').addClass('succ').html('发布成功！');	
				var content=$('.weibo_text').val();
				    // img  图片；
				var html="";
				var ajaxhtml1=$('#ajax_html1').html();
				//var imgObj=img.$.parseJSON(img);
							 
				if(ajaxhtml1.indexOf('#内容#')>=0){
					html=ajaxhtml1.replace(/#内容#/g,content);
				}
				if(ajaxhtml1.indexOf('#THUMB#')>=0){
					var str='';
					for(var i=0;i<img.length;i++){
						var imgObj=$.parseJSON(img[i]);
						console.log(imgObj);
						str+='<li><img src="'+ThinkPHP['ROOT']+imgObj.thumb+'" unfold="'+ThinkPHP['ROOT']+imgObj.unfold+'" source="'+ThinkPHP['ROOT']+imgObj.source+'"  /></li>'
					}
					html=html.replace(/#THUMB#/g,str);
				}
				if(html.indexOf('#时间#')>=0){
					html=html.replace(/#时间#/g,'刚刚发布');
				}
				if(html.search(/\[(a|b|c|d)_([\d]+)\]/)>=0){
					html=html.replace(/\[(a|b|c|d)_(\d+)\]/g,'<img src="'+ThinkPHP['FACE']+'/$1/$2.gif"  />');
				}
				setTimeout(function(){
					$('.weibo_content ul').after(html);
					$('#info').dialog('close');
					$('.weibo_text').val('');
					$('.weibo_pic_list').html('');
				},1000);
				}else{
					$('#info').dialog('open').removeAttr('class').addClass('Infoerror').html('发布失败，系统出错！');
				}
			},
		});
}

