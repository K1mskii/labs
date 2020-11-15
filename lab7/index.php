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
        <input type="button" onclick="load('news.txt', 'd')" value="Выполнить синхронизацию Ajax" class="button">
        <div id="d">Область загрузки AJAX</div>
    </main>

    <script src="../js/jquery 3.5.1.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        var req;
        var d;
        function processStateChange(){
            if (req.readyState < 4) document.getElementById(d).innerHTML = "<font color=red>Подгрузка <font color=red>AJAX";
                if (req.readyState == 4){
                    contentDiv = document.getElementById(d);
                    alert ('Ответ получен');
                    if (req.status == 200){
                        response = req.responseText;
                        contentDiv.innerHTML = response;
                        alert ('Статус HTTP ответа 200');
                    } else {
                        contentDiv.innerHTML = "Error: Status "+req.status;
                    }
                }
            }
        function load(URL, destination){
            d = destination;
            if (window.XMLHttpRequest) {
                alert ('Используется объект XMLHttpRequest');
                req = new XMLHttpRequest();
                req.onreadystatechange = processStateChange;
                req.open("GET", URL, true);
                req.send(null);
            }
            else if (window.ActiveXObject) {
                req = new ActiveXObject("Microsoft.XMLHTTP");
                alert ('Используется объект ActiveXObject');
                if (req) {
                    req.onreadystatechange = processStateChange;
                    req.open("GET", URL, true);
                    req.send();
                }
            }
        }       
    </script>   
</body>

</html>


    
