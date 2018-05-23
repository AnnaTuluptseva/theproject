$(function(){
	
	
	
	var online = $('.onlinemsg').text(); //определение вошол ли пользователь в систему
	//alert(online);
	//Ссылки входа и выхода в систему
	if(online === ''){
		$('.logout_link').css("display","none");
		$('.userpage').css("display","none");
		$('.login_link').css("display","block");
		$('.firstpage').css("display","block");
		

	}else{
		$('.login_link').css("display","none");		
		$('.firstpage').css("display","none");
		$('.logout_link').css("display","block");
		$('.userpage').css("display","block");
	}

	//Навигация пользователя
	//Отображение ссылок навигации пользователя
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
 
    // Не забыть добавить условие ЕСЛИ ONLINE

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

	//Функция для выбора ссылки и отображения её содержимого
	function chosenLink(){
		var class_name = $(this).attr('class');
		//alert(class_name);
		switch (class_name){
			case 'thecabinet':
				//alert(class_name);				
				$('.user_content .thegoals').css("display","none");
				$('.user_content .thetests').css("display","none");
				$('.user_content .thediagrams').css("display","none");
				$('.user_content div.newgoal').css("display","none");
				$('.user_content .thecabinet').css("display","block");
				break;
			case 'thegoals':
				//alert(class_name);				
				$('.user_content .thecabinet').css("display","none");
				$('.user_content .thetests').css("display","none");
				$('.user_content .thediagrams').css("display","none");
				$('.user_content div.newgoal').css("display","none");
				$('.user_content .thegoals').css("display","block");
				break;
			case 'thetests':	
				//alert(class_name);			
				$('.user_content .thegoals').css("display","none");
				$('.user_content .thecabinet').css("display","none");
				$('.user_content .thediagrams').css("display","none");
				$('.user_content div.newgoal').css("display","none");
				$('.user_content .thetests').css("display","block");
				break;
			case 'thediagrams':	
				//alert(class_name);			
				$('.user_content .thegoals').css("display","none");
				$('.user_content .thetests').css("display","none");
				$('.user_content .thecabinet').css("display","none");
				$('.user_content div.newgoal').css("display","none");
				$('.user_content .thediagrams').css("display","block");
				break;
			default:
				//alert('Default');
				break;
		}
		//$(this).children('div').css
	}

	$(document).on('click','.user_navigation li', chosenLink);

	//Окно thecabinet
	$( ".thecabinet input" ).prop( "readonly", true );

	//Окно Goals
	$('.thegoals span').hover(function(){
			$(this).css('border-color','#adedcb');
			$(this).css('box-shadow','3px 3px 3px rgba(116, 204, 156, .75)');
			//$(this).attr('title', новое_значение);
		},
		function(){
			$(this).css('border-color','#2a4837');
			$(this).css('box-shadow','3px 3px 3px rgba(19,23,25,.75)');
		});
	//завешна ли поставленная цель?
	$(document).on('click','.futuregoal', function(){
		var isAchived = confirm("Цель достигнута?");
		var idgoal = $(this).attr('id');		
		//alert(idgoal);
		if(isAchived)
			document.location.href = "http://diplom/functions/achivedgoal.php?idgoal="+idgoal;
	});
	//создание новой цели
	//$( ".newgoal input" ).prop( "readonly", true );
	$(document).on('click','span.newgoal', function(){
		//alert('Hello!');
		$('.user_content .thegoals').css("display","none");
		$('.user_content .newgoal').css("display","block");
		//$( ".newgoal input" ).prop( "readonly", false );
	});


	// Задния к тесту

	$(document).on('click','.mytest', function(){
		alert('Hello!');
		document.location.href = "http://diplom/functions/mygoa.php";
	});
});