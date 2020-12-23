<?php
session_start();
require_once("login.php");
$target_dir = "images/";
$link=mysqli_connect("localhost", "root", "", "lb2");

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
    	$uploadOk = 1;
	} else {
        echo "File is not an image.";
    	$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       








    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['first_name']))
    {
        $err[] = "Имя может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['first_name']) < 3 or strlen($_POST['first_name']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id FROM users WHERE first_name='".mysqli_real_escape_string($link, $_POST['first_name'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким именем уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {


        // Убераем лишние пробелы и делаем двойное хеширование
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $role_id = $_POST['role_id'];


		$photo =  basename( $_FILES["fileToUpload"]["name"]);
        mysqli_query($link,"INSERT INTO users SET first_name='".$first_name."', password='".$password."',  last_name = '".$last_name."', role_id = '".$role_id."', photo='".$photo."'");

        mysqli_query($link,"INSERT INTO roles SET title='".$role_id."'");
        header("Location:index.php");

        
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }





         exit();
	} else {
        echo "Sorry, there was an error uploading your file.";
	}
}


?>