<?php
//Если нажата кнопка "Войти"
if (isset($_POST['enter']))
{
//Читаем хеш из файла pas.txt
$s=file('pas.txt'); 
	//Получаем хеш от пароля,  введенного пользователем	
	$hash=md5($_POST['passwd']);
	//Сравниваем хеш пароля и логин с теми.	
	if (($s[0]==$hash) and ($_POST['login']=='admin'))	
	{	
	require_once ("index.php");	
	exit;	
	}	
	else {	
	echo "Логин или пароль неверные";	
	echo "<a href ='index.php'>Назад</а>";	
	exit;	
	}	
	}
?>	
