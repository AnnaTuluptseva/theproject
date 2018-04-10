$(function(){
	//alert("Bye!");
	$(':text:first').focus();
	$('.registration').validate({
		rules: {
			username:{
				required: true
			},
			email:{
				required: true,
				email: true
			},
			password: {
				required: true,
				rangelength:[4,16]
			},
			password_again:{
				required: true,
				equalTo: '.password'
			}
			
		},
		messages: {
			username:{
				required: "Введите ваш логин."
			},
			email: {
				required: "Введите адрес электронной почты.",
				email: "Электронный адрес введен не корректно!"
			},
			password: {
				required: "Введите пароль!",
				rangelength: "Пароль должен содержать от 4 до 16 символов."
			},
			password_again: {
				required: "Введите подтверждение пароля!",
				equalTo: "Пароли не совпадают."
			}
			
		},

	});

});