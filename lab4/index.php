<?php require "./php/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Auth</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>
<body>
	<main class="main">
		<?php if (isset($_SESSION['logged_user'])) : ?>
		Вы, Авторизованы! Добро пожаловать, <?php echo $_SESSION['logged_user']->login; ?>!
		<a href = "./php/logout.php">Выйти</a>
		<?php else : ?>
				<form action="./php/login.php" method="POST" class="form">
					<input type="text" class="form__input" placeholder="Введите логин" name="login" value = "<?php echo @$data['login'];?>">
					<input type="password" class="form__input" placeholder="Введите пароль" name = "password" value = "<?php echo @$data['password'];?>">
					<input type="submit" class="form__submit" name = "do_login" value="Войти">
					<p class="form__notAcc">Нет аккаута? -><a href="./php/signup.php">Регистрация</a></p>
				</form>
		<?php endif;  ?>
	</main>
</body>
</html>