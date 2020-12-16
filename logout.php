<?php
session_start();
$link=mysqli_connect("localhost", "root", "", "lb2");

unset($_SESSION['Name']);
header("Location:login.php");
?>