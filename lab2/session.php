<?php
session_start();
include_once("bd.php");
if (isset($_SESSION['id'])){
 $id = $_SESSION['id'];
 $_SESSION['Result'] = mysqli_fetch_row (mysqli_query($db, "SELECT * FROM users WHERE id = '$id'"));
}
?>