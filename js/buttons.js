$(function(){
	
	/*Вкладки пользователя*/
	/*var usertabs = 0;
	$('.firstpage_link').on('click', chosen_link(0));
	$('.aboutus_link').on('click', chosen_link(1));
	$('.contacts_link').on('click', chosen_link(2));

	function chosen_link(value){
		usertabs = value;
		alert(usertabs);
	}
	//alert (usertabs);
	switch (usertabs){
		case 0:
		alert ('Im here');
		$('.firstpage').css("display","run-in");
		$('.aboutus').css("display","none");
		$('.contacts').css("display","none");
		$('.error').css("display","none");
		break;
		case 1:
		alert ('Im 1');
		$('.aboutus').css("display","run-in");
		$('.contacts').css("display","none");
		$('.firstpage').css("display","none");
		$('.error').css("display","none");
		break;
		case 2:
		$('.contacts').css("display","run-in");
		$('.aboutus').css("display","none");
		$('.firstpage').css("display","none");
		$('.error').css("display","none");
		break;
		default:
		$('.error').css("display","run-in");
		$('.contacts').css("display","none");
		$('.aboutus').css("display","none");
		$('.firstpage').css("display","none");
		break;
	}*/
	

	/*Поля входа и выхода в систему*/
	var online = $('.onlinemsg').text();
	/*$(document).on('click','.logout_btn', function(){
		online = false;
	});*/
	if(online === ''){
		$('.login_link').css("display","block");
		$('.logout_link').css("display","none");
		$('.userpage').css("display","none");
		$('.firstpage').css("display","block");

	}else{
		$('.login_link').css("display","none");
		$('.logout_link').css("display","block");
		$('.firstpage').css("display","none");
		$('.userpage').css("display","block");
	}

	$('.user_navigation li').hover(function(){
			$(this).css("background-image","url('/../img/linkshover.png')");
			$(this).children("div").css("color","#adedcb");
			$(this).css('border-color','#adedcb');
		},
		function(){
			$(this).css("background-image","url('/../img/links.png')");
			$(this).children("div").css("color","#2a4837");
			$(this).css('border-color','#2a4837');
		});
 
    /* Не забыть добавить условие ЕСЛИ ONLINE*/

    /*var all_links =  document.querySelectorAll(".user_content div");
    alert(all_links);
    alert(all_links[0].getAttribute('class'));
    all_links.forEach(function(item,i,all_links){
    	alert(item.attr('class'));
    });*/

	/*var massLinks = ['thecabinet','thegoals','thetests','thediagrams'];
	var windowObjects =  
	massLinks.forEach(function(item,i,all_links){
    	alert(item);
    });*/
	//var linksObject = $('.user_content div').attr('class');
	//alert(linksObject);

	function chosenLink(){
		var class_name = $(this).attr('class');
		//alert(class_name);
		switch (class_name){
			case 'thecabinet':
				//alert(class_name);				
				$('.user_content .thegoals').css("display","none");
				$('.user_content .thetests').css("display","none");
				$('.user_content .thediagrams').css("display","none");
				$('.user_content .thecabinet').css("display","block");
				break;
			case 'thegoals':
				//alert(class_name);				
				$('.user_content .thecabinet').css("display","none");
				$('.user_content .thetests').css("display","none");
				$('.user_content .thediagrams').css("display","none");
				$('.user_content .thegoals').css("display","block");
				break;
			case 'thetests':	
				//alert(class_name);			
				$('.user_content .thegoals').css("display","none");
				$('.user_content .thecabinet').css("display","none");
				$('.user_content .thediagrams').css("display","none");
				$('.user_content .thetests').css("display","block");
				break;
			case 'thediagrams':	
				//alert(class_name);			
				$('.user_content .thegoals').css("display","none");
				$('.user_content .thetests').css("display","none");
				$('.user_content .thecabinet').css("display","none");
				$('.user_content .thediagrams').css("display","block");
				break;
			default:
				//alert('Default');
				break;
		}
		//$(this).children('div').css
	}

	$(document).on('click','.user_navigation li', chosenLink);

	/*Окно thecabinet*/

	$( ".thecabinet input" ).prop( "readonly", true );





});