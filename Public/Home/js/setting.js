$(function(){
	
	$('.main_right .submit').on('click',function(){
		var  value=$('textarea[name="intro"]').val();
		$.ajax({
			url:ThinkPHP['MODULE']+'/User/updateUser',
			type:'POST',
			beforeSend:function(xhr){
				
			},
			data:{'intro':value},
			success:function(msg){
				$('#info').dialog('open').html('修改成功！').removeAttr('class').addClass('succ');
				setTimeout(function(){
					$('#info').dialog('close');
				},1000);
			}
		})
	});
	
	//头像上传；
	if(document.getElementById('file')!=null){
		
			$('#file').uploadify({
				swf:ThinkPHP['UPLOADIFY']+'/uploadify.swf',
				uploader:ThinkPHP['FACEURL'],
				width:120,
				height:35,
				buttonCursor:'pointer',
				fileSizeLimit:'1MB',
				removeTimeout:0,
				fileTypeDesc:'图片类型',
				fileTypeExts: '*.jpeg; *.jpg; *.png; *.gif',
				buttonText:'上传图片',
				overrideEvents:['onSelectError','onSelect','onDialogClose'],
				
				onSelectError : function (file, errorCode, errorMsg) {
					//图片上传成功！
					switch(errorCode) {
					case -110:
					$('#info').dialog('open').html('超过1024KB...');
					
					setTimeout(function () {
						$('#info').dialog('close').html('...');
						}, 1000);
						break;
					}
				},
				onUploadSuccess:function(file,data,response){
					//$('#face').css({width:'400',height:'400'});
					$('#face,#preview_box img').attr('src',ThinkPHP['ROOT']+'/'+data);
					$('#url').val(data);
					$('#preview_box').show();
					$('.save,.cancel').show().css('display','block');
					$('#face').one('load',function(){
						
							jcrop=$.Jcrop('#face',{
								onChange:showPreview,
								onSelect:showPreview,
								aspectRatio:1,
							});
						jcrop.setSelect([0,0,200,200]);	
							//图片还没有加载，提前隐藏会报错；
							$('#file').hide();
							
					
					});
					
				}
			});
		
	}
	$('#main').on('click','.cancel',function(){
	jcrop.destroy();
	$('#face,#preview_box img').attr('src',ThinkPHP['IMG']+'/big.jpg').css({width:'auto',height:'auto'});
	$('.save,.cancel').hide();
	$('#file').show();
	return nothing(e);
});
$('#main').on('click','.save',function(){
	$.ajax({
		type:'POST',
		url:ThinkPHP['MODULE']+'/File/crop',
		data: {
		x : $('#x').val(),
		y : $('#y').val(),
		h : $('#h').val(),
		w : $('#w').val(),
		url : $('#url').val(),
		},
		beforeSend:function(){
			jcrop.destroy();
			$('.save,.cancel').hide();
			
		},
		success:function(data){
			if(data){
				var json=$.parseJSON(data);
				$('#info').dialog('open').html('上传成功！').removeAttr('class').addClass('.succ');
				jcrop.destroy();
				$('#face,#preview_box img').attr('src',ThinkPHP['IMG']+'/big.jpg').css({width:'auto',height:'auto'});
				$('#preview_box').hide();
				$('.save,.cancel').hide();
				$('#file').show();
				$('#face').attr('src',ThinkPHP['ROOT']+json.big).css({
					'width':200,
					'height':200
				})
				$('#preview_box').hide();
				setTimeout(function(){
					
					
					$('#info').dialog('close');
				})
			}else{
				
			}
		},
	});
});
var pathname=location.pathname;
 if(pathname=='/3_12/weibo/setting/domain.html'){
	$.ajax({
		url:ThinkPHP['MODULE']+'/Setting/getDomain',
		type:'POST',
		beforeSend:function(xhr){
			
		},
		success:function(msg){
			var user=$.parseJSON(msg);
			console.log(user);
			if(user.domain==null){
				$('.domain_help').show();
				$('.register_domain').show();
				$('.register').show();
				$('.domain').hide();
			}else{
				$('.domain_help').hide();
				$('.register_domain').hide();
				$('.register').hide();
				$('.domain').show().html(' 您 的 个 性 域 名 地 址 为 ：'
										 +'<a href="'+ThinkPHP['ROOT']+'/i/'+user.domain+'"'
										 +'target="_blank">'
										 +'http:\/\/'+ThinkPHP['SERVER_NAME']+ThinkPHP['ROOT']+'/i/'+user.domain+'</a>');
			}
		}
	});
	$('.register').on('click',function(){
		var _this=this;
		$.ajax({
			url:ThinkPHP['MODULE']+'/Setting/register',
			type:'POST',
			beforeSend:function(){
				$(_this).attr('disable',true);
			},
			data:{
				'domain':$('input[name="domain"]').val(),
			},
			success:function(data){
				$(_this).removeAttr('disable');
				if(data){
					$('#info').dialog('open').removeAttr('class').addClass('succ').html('注册成功！');
				}
				setTimeout(function(){
					$('#info').dialog('close');
					location.reload();
				},1000);
			}
		});
	});
} 

	
});

function nothing(e){
	e.stopPropagation();
	e.preventDefault();
	return false;
}



 function showPreview(coords){
		$("#x").val(coords.x);
		$("#y").val(coords.y);
		$("#w").val(coords.w);
		$("#h").val(coords.h);
        if(parseInt(coords.w) > 0){
            //计算预览区域图片缩放的比例，通过计算显示区域的宽度(与高度)与剪裁的宽度(与高度)之比得到
            var rx = $("#preview_box").width() / coords.w; 
            var ry = $("#preview_box").height() / coords.h;
            //通过比例值控制图片的样式与显示
            $("#crop_preview").css({
                width:Math.round(rx * $("#face").width()) + "px",	//预览图片宽度为计算比例值与原图片宽度的乘积
                height:Math.round(rx * $("#face").height()) + "px",  //预览图片高度为计算比例值与原图片高度的乘积
                marginLeft:"-" + Math.round(rx * coords.x) + "px",
                marginTop:"-" + Math.round(ry * coords.y) + "px"
            });
        }
    }