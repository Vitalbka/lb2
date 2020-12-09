<?php 
$link=mysqli_connect("localhost", "root", "", "lb2");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];
$id = $_POST['id'];
mysqli_query($link," UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `password` = '$password', `role_id` = '$role_id' WHERE users.id = $id");

mysqli_query($link," UPDATE `roles` SET `title` = '$role_id' WHERE roles.id = $id");

header("Location:tableAdmin.php");
 ?>