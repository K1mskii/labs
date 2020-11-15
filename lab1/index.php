<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labs</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main">
        <h1 class="h1">Пример получения значений переменных окружения сервера
        </h1>
        <form action="file.php" class="form">
            <input type="submit" value="Получить переменные окружения сервера" class="form__input submit">
        </form>
        <form action="file.php" class="form" method="POST">
            <input type="submit" value="Получить переменные окружения сервера (POST)" class="form__input submit">
        </form>
    </main>

    <script src="../js/jquery 3.5.1.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>