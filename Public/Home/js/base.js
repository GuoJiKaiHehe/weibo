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
	
});