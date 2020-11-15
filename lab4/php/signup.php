<?php  
require "db.php";
$data = $_POST;
if( isset($data['do_signup']) )
{
	//здесь делаем проверки на пустоту логина
	$errors = array();
	if (trim($data['login']) =='') {
		$errors[] = 'Введите логин !';
	}
	
	if ($data['email'] =='') {
		$errors[] = 'Введите email !';
	}

	if ($data['password'] =='') {
		$errors[] = 'Введите пароль !';
	}

	if ($data['password_2'] !=$data['password']) {
		$errors[] = 'Пароли не одинаковы !';
	}

  // исключаем два одинаковых мейла
	if (R::count('users', "login = ?", array($data['login']))>0)
	{
		$errors[] = 'Пользователь с таким Логином существует !';
	}

	if (R::count('users', "email = ?", array($data['email']))>0)
	{
		$errors[] = 'Пользователь с таким Email существует !';
	}

	//здесь регистрируем
	if (empty($errors)) 
	{
	// все хорошо, регисирируем в Базе Данных
	// Ред Бин исключает SQL иньекции
		$user = R::dispense('users');
		$user->login=$data['login'];
		$user->email=$data['email'];
		$user->password= password_hash($data['password'], PASSWORD_DEFAULT);
		$user->join_date=time();
		R::store($user);
		echo '<body><div style = "color: #333;">Вы успешно зарегистрированы! </div><hr></body>';
	} else 
	{
		echo'<body><div id="errors">'.array_shift($errors). '</div><hr></body>';
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Auth</title>
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<main class="main">
		<form action="../php/signup.php" method="POST" class="form">
				<input type="text" name="login" class="form__input" placeholder="Введите логин" value = "<?php echo @$data['login'];?>">
				<input type="email" name="email" class="form__input" placeholder="Введите email" value = "<?php echo @$data['email'];?>">
				<input type="password" name="password" class="form__input" placeholder="Введите пароль" value = "<?php echo @$data['password'];?>">
				<input type="password" name="password_2" class="form__input" placeholder="Повторите пароль" value = "<?php echo @$data['password_2'];?>">
				<input type="submit" name = "do_signup" class="form__submit" value="Зарегистрироваться">
				<p class="form__notAcc">Есть аккаунт? -> <a href="../index.php">Авторизоваться</a></p>
		</form>
	</main>
</body>
</html>

