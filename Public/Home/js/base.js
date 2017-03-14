$(function(){

  var infoLayer=$('#info').dialog({
		width:200,
		height:50,
		draggable:false,
		resizable:false,
		modal:true,
		closeOnEscape:false,
		autoOpen:false,
	}).parent().find('.ui-widget-header').hide();
	$('#info').dialog('close');
	
	// 头部hover
	$('.app').hover(function(){
		$(this).css({
			background : '#fff',
			color : '#333',
		}).find('.list').show();
	},function(){
		$(this).css({
			background : 'none',
			color : '#fff',
		}).find('.list').hide();
	})
});
/* function imgLoadEvent(callback,url){
	var img =new Image();
	img.onreadystatechange=function(){
		if(this.readyState=='complete'){
			callback({'w':img.width,"h":img.height});
		}
	}
	if (this.complete == true){
		callback({ "w": img.width, "h": img.height });
	
	}
	img.onerror=function(){
			callback({"w":0,"h":0});
	}
		img.src="url";
	
} */
	
	







