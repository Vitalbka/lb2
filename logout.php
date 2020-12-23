<?php
session_start();
$link=mysqli_connect("localhost", "root", "", "lb2");

unset($_SESSION['Name']);
unset($_SESSION['Role']);
unset($_SESSION['User']);

header("Location:login.php");
?>