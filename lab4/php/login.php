<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<?php
require "db.php";

$data=$_POST;
	if(isset($data['do_login'])) // если была нажата кнопка
	{
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if( $user)
		{
			// Когда  логин сушествует, проверяем пароль
			if(password_verify($data['password'], $user->password))
			{
		  //	echo 'Логинится';
			// Все хорошо, логиним пользователя
				$_SESSION['logged_user'] = $user;

				echo '<body><main class="main"><div style = "color: #333;">Вы Авторизованы! <br/> Можете перейти на <a href="http://localhost/labs/lab4/index.php">главную</a> страницу!</div></main></body>';

			} else {
				$errors[] = 'Пароль введен неправильно';
			}
		} else
		{
			$errors[] = 'Пользователь не найден!';
		}

		if (!empty($errors)) {
			echo'<body><main class="main"><div style="color: #333;">'.array_shift($errors).'</div></main></body>';
		} 
	}
	?>

