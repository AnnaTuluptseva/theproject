<?php
function registrationCorrect() {
	$massErrors = array();

	if (!preg_match('/^([a-zA-Z0-9])(\w|-|_)+([a-z0-9])$/is', $_POST['username'])) $massErrors['username']='В логине пользователья не допускается использовать следующие символы: буквы латинского алфавитаб цифры, _ и -'; 
	if (!preg_match('/^([a-z0-9])(\w|[.]|-|_)+([a-z0-9])@([a-z0-9])([a-z0-9.-]*)([a-z0-9])([.]{1})([a-z]{2,4})$/is', $_POST['mail'])) $massErrors['username']='Email введен не корректно';
	return $massErrors;
}
?>