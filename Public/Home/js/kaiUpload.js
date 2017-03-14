$(function(){
	var kaiUpload={
		uploadTotal : 0, //已上传的数目
		uploadLimit : 8,
		uploadify:function(){
			$('#file').uploadify({
				swf:ThinkPHP['UPLOADIFY']+'/uploadify.swf',
				uploader:ThinkPHP['UPLOADURL'],
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
					var json=$.parseJSON(data);
					$('.weibo_pic_list').append('<div class="weibo_pic_content">'
													+'<img src="'+ThinkPHP['ROOT']+json['thumb']+'"   class="weibo_box_img" />'
													+'<input type="hidden" name="image" value='+data+'     />'
													+'</div>');
													
						setTimeout(function(){
							kaiUpload.thumb();
						},50);						
				}
			});
		},
		init:function(){
			$('#pic_btn').on('click',function(){
				var TL=$(this).position();
				$('.weibo_pic_box').show().css({
					left:TL.left,
					top:TL.top+30,
				});
				kaiUpload.uploadify();
				
				
			});
			$('#pic_box a.close').on('click',function(){
				$('#pic_box').hide();
				
			});
			/* $(document).on('click',function(e){
				
				var jqTarget=$(e.target);
				console.log(jqTarget.closest('#pic_btn'));
				if(jqTarget.closest('#pic_btn').==1)return;
				if(jqTarget.closest('#pic_btn')==0){
					$('#pic_box').hide();
					
				}
			}); */
		},
		thumb:function(){
			var img=$('.weibo_box_img');
			var length=img.length;
			$(img[length-1]).hide();
			if($(img[length-1]).width()>100){
				$(img[length-1]).css('left',-($(img[length-1]).width()-100)/2)
			}
			if($(img[length-1]).height()>100){
				$(img[length-1]).css('top',-($(img[length-1]).height()-100)/2)
			}
			$(img[length-1]).show(500);
		},
		remove:function(){
			
		},
		
		
	}
	kaiUpload.init();
});