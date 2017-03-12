$(function () {
	//随机背景；
	//alert(ThinkPHP.IMG+'/login_bg'+Math.floor()*5+'.jpg')
	var rand_bg=Math.floor(Math.random()*5)+1;
	$('body').css({
		'background-image':'url('+ThinkPHP['IMG']+'/login_bg'+rand_bg+'.jpg'+')',
		'background-size':'100%',
	});
	
	//点击弹出注册对话框；
	$('#reg_link').click(function(){
		$('#register').dialog('open');
	});
	$('#birthday').datepicker({
		
		dateFormat:'yy-mm-dd',
		buttonText:'日期',
		changeYear:true,
		changeMonth:true,
		yearRange:'1955:',
		dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],  
		dayNamesMin: ['日','一','二','三','四','五','六'],  
		 monthNamesShort: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		yearSuffix: '年',
		showMonthAfterYear: true,  
		maxDate:new Date(),
		monthNames:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		currentText:'今天',
		closeText:'关闭',	
	});
	//注册对话框配置；
	$('#register').dialog({
		width:'500',
		height:380,
		title:'注册新用户',
		modal:true,
		autoOpen:false,
		resizable:false,
		closeText:'关闭',
		buttons:[{
			'text':'提交',
			'click':function(e){
				$(this).submit();
			},
		}],
	}).validate({
		submitHandler:function(form){
			$('#verify').dialog('open');
		},
		errorLabelContainer:'#register ol.error',
		wrapper:'li',
		showErrors:function(errorMap, errorList){
			var errors=this.numberOfInvalids();
			if(errors>0){
				$('#register').dialog('option', 'height', errors * 20 +
370);
			}else{
				$('#register').dialog('option', 'height', 380);
			}
			this.defaultShowErrors();
		},
		highlight:function(element,errorClass){
			//alert($(element).parent().find('.star'));
			$(element).css('border','1px solid red');
			
			//$(element).parent().find('span').removeAttr('class').addClass('err').html('&nbsp;')
			//alert($(element).parent().find('.star'));
			
		},
		unhighlight:function(element){
			//alert('un')
			$(element).css('border','1px solid #ccc');
			//$(element).parent().find('span').removeAttr('class');
			
		},
		rules:{
			username:{
				required:true,
				rangelength:[2,20],
				at:true,
				remote:{
					url:ThinkPHP['MODULE']+'/User/checkUserName',
					type:'POST', //返回true 则可以注册；
					 beforeSend:function(){
						
						$('#register  #rg_user').parent().find('span').removeAttr('class').addClass('loading').html('&nbsp;')
						// alert('true');
					},
					complete:function(jqXHR){
						   
						if(jqXHR.responseText=='true'){
							 
							$('#register  #rg_user').parent().find('span').removeAttr('class').addClass('succ').html('&nbsp;')
						}else{
							$('#register  #rg_user').parent().find('span').removeAttr('class').addClass('err').html('&nbsp;')
						}
					}, 
				}
			},
			password:{
				required:true,
				rangelength:[6,20],
			},
			repassword:{
				equalTo:'#pass',
				
			},
			email:{
				required:true,
				email:true,
				remote:{
					url:ThinkPHP['MODULE']+'/User/checkUserEmail',
					type:'POST',
					beforeSend:function(){
						
						$('#register  #email').parent().find('span').removeAttr('class').addClass('loading').html('&nbsp;')
						// alert('true');
					},
					complete:function(jqXHR){
						   
						if(jqXHR.responseText=='true'){
							 
							$('#register  #email').parent().find('span').removeAttr('class').addClass('succ').html('&nbsp;')
						}else{
							$('#register  #email').parent().find('span').removeAttr('class').addClass('err').html('&nbsp;')
						}
					}, 
				},
				
			},
			birthday:{
				required:true,
				date:true,
			}
			
		},
		messages:{
			username:{
				required:'用户名不得为空!',
				rangelength:'必须在{0}-{1}位之间',
				at:'不得包含@字符',
				remote:'用户名被占用',
			},
			password:{
				required:'密码不得为空！',
				rangelength:'必须在{0}-{1}位之间'
			},
			repassword:{
				equalTo:'必须和密码一致！',
			},
			email:{
				required:'邮箱不得为空',
				email:'请输入合法邮箱地址',
				remote:'邮箱被占用',
			},
			birthday:{
				required:'生日不得为空！',
				date:'请输入合法的日期',
			}
			
		}
		
	});
	$.validator.addMethod('at',function(value,element){
		var pattern=/@+/g;
		return this.optional(element)|| !pattern.test(value);
	});
	//邮箱自动补全；
	$('#register #email').autocomplete({
		delay:0,
		autoFucos:true,
		source:function(request,response){
			var hosts = ['qq.com', '163.com','263.com', 'sina.com.cn','gmail.com', 'hotmail.com'];
			var term=request.term;
			var name=term;
			var host='';
			var ix=term.indexOf('@');
			var result=[];
			result.push(term);
			if(ix!=-1){
				name=term.slice(0,ix);
				host=term.slice(ix+1);
			}
			if(name){
				var findedResult=$.grep(hosts,function(value,key){
					//没找到。所以都返回；
					return value.indexOf(host)>-1; //返回能找到host的哪些邮箱；
				});
				
				result=$.map(findedResult,function(value,key){
					return name+'@'+value;
				});
			}
			//  qq.com . indexOf('')
			response(result);
		}
	});
	
	//验证码：
	$('#verify').dialog({
		width:400,
		height:250,
		modal:true,
		title:'请输入验证码',
		autoOpen:false,
		resizable:false,
		closeText:'关闭',
		buttons:[{
			text:'提交',
			click:function(e){
				$(this).submit();
			}
		}]
		
	}).validate({
		submitHandler:function(form){
			if($('#verify').attr('ok')=='ok'){
				$('#register').ajaxSubmit({
				url:ThinkPHP['MODULE']+'/user/register',
				type:'POST',
				beforeSubmit:function(){
					$('#info').dialog('open').removeAttr('class').addClass('loading').html('正在加载中...');
					
				},
				success:function(msg){
					if(msg>0){
						$('#info').removeAttr('class').addClass('succ').html('注册成功！');
						
					}else if(msg==-5){
						$('#info').removeAttr('class').addClass('Infoerror').html('用户名被占用');
					}else{
						$('#info').removeAttr('class').addClass('Infoerror').html('注册失败！');
					}
					setTimeout(function(){
						//生成cookie;
						$('#info').dialog('close');
						$('#loading').dialog('close');
						$('#register').resetForm();
						$('#register').dialog('close');
						$('#register .form-group span').html('*').css('color','red');
						$('#verify').dialog('close');
					},1500);
				},
				error:function(){
					$('#info').dialog('close')
				}
				
			});
			}
			
		},
		rules:{
			verifyText:{
				required:true,
				rangelength:[5,5],
			},
		},
		messages:{
			verifyText:{
				required:'不得为空',
				rangelength:'必须是{0}位',
			},
		},
		highlight:function(element,errorClass){
			//alert($(element).parent().find('.star'));
			$(element).css('border','1px solid red');
			
			//$(element).parent().find('span').removeAttr('class').addClass('err').html('&nbsp;')
			//alert($(element).parent().find('.star'));
			
		},
		unhighlight:function(element){
			//alert('un')
			$(element).css('border','1px solid #ccc');
			
			
		},
	});
	$('body').on('keyup','.verifyText',function(){
		var value=$(this).val();
		$('#verifyText').parent().find('span').removeAttr('class');
		$('#verify').removeAttr('ok');
		var len=value.length;
		if(len==5){
			console.log($('#verifyText').parent().find('span'));
			$('#verifyText').parent().find('span').removeAttr('class').addClass('loadin').html('&nbsp;');
			
			$.ajax({
				url:ThinkPHP['MODULE']+'/login/checkVerify',
				type:'POST',
				data:{
					verifyText:$('#verifyText').val(),
				},
				success:function(msg){
					if(msg){
					$('#verifyText').parent().find('span').removeAttr('class').addClass('succe').html('&nbsp;');
					
					//提交注册验证!
					$('#verify').attr('ok','ok');
			
					}else{
					$('#verifyText').parent().find('span').removeAttr('class').addClass('err').html('&nbsp;');	
					$('#verify').removeAttr('ok');
					}
				}
			})
		}else{
			
		}
	}).find('.changeimg').click(function(){
		var src=$(this).attr('src');
		if(src.indexOf('?')>-1){
			$(this).attr('src',src+'&rand='+Math.random());
		}else{
			$(this).attr('src',src+'?rand='+Math.random());
		}
		
	});
	
	
	function login(form){
	$(form).ajaxSubmit({
			url:ThinkPHP['MODULE']+'/User/login',
			type:'POST',
			beforeSubmit:function(xhr){
				$('#info').dialog('open').removeAttr('class').addClass('loading').html('正在加载中...');
				$('#login .submit').attr('disable',true);
			},
			success:function(msg){
				$('#login .submit').removeAttr('disable');
				if(msg>0){
					$('#info').dialog('open').removeAttr('class').addClass('succ').html('登陆成功');
				}else if(msg<0){
					$('#info').dialog('open').removeAttr('class').addClass('error').html('登陆失败！');
				}
				setTimeout(function(){
					
					$('#info').dialog('close');
					$('#login').resetForm();
					$('#login').off('.login');
					//location.href=ThinkPHP['INDEX'];
				},1500);
			}
		});
	}
	$('#login').validate({
		submitHandler:function(form){
			
			
			$('#login').on('click.login','.submit',function(){
				login(form);
			})
			
		},
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:40,
			},
			password:{
				required:true,
				rangelength:[6,20],
			}
		},
		messages:{
			username:{
				required:'不得为空',
				minlength:'不得小于{0}',
				maxlength:'不得大于{0}',
			},
			password:{
				required:'不得为空',
				rangelength:'必须在{0}-{1}之间',
			}
			
		}
	});
	
	
	
	/* $(form).ajaxSubmit({
				url:ThinkPHP['MODULE']+'/user/register',
				type:'POST',
				beforeSubmit:function(){
					$('#info').dialog('open').removeAttr('class').addClass('loading').html('正在加载中...');
					
				},
				success:function(msg){
					if(msg>0){
						$('#info').removeAttr('class').addClass('succ').html('注册成功！');
						
					}else if(msg==-5){
						$('#info').removeAttr('class').addClass('Infoerror').html('用户名被占用');
					}else{
						$('#info').removeAttr('class').addClass('Infoerror').html('注册失败！');
					}
					setTimeout(function(){
						$('#info').dialog('close');
					},1500);
				},
				error:function(){
					$('#info').dialog('close')
				}
				
			}); */
	
	
	
});