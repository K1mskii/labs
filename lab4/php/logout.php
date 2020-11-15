<?php 
require "db.php";
unset($_SESSION['logged_user']);

//Перебрасываем после выхода
header('Location: /labs/lab4/');
?>