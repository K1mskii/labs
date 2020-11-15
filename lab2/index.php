<?php
    // открываем сессию
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie на 7 дней</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main">


        <form action="auth.php" method="post" class="form">
            <fieldset class="fieldset">
                <legend class="legend">Авторизация</legend>
                <input type="text" name="user_name" class="form__input input" placeholder="Login">
                <input type="password" name="user_pass" class="form__input input" placeholder="Password">
                <input type="submit" name="Submit" class="form__submit submit">
            </fieldset>
        </form>
        

    </main>

</body>
</html>