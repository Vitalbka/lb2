<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       .container {
           width: 400px;
       }
   </style>
</head>
<body style="padding-top: 3rem;">

<div class="container">
   <form method="POST"  enctype="multipart/form-data" action="uploadAdmin.php">
   <label for="first_name">Введите имя:</label>
   <input type="text" name="first_name">

   <label for="last_name">Введите фамилию:</label>
   <input type="text" name="last_name">

   <label for="password">Введите пароль:</label>
   <input type="text" name="password">

   <label for="role_id">Role:</label>
   <input type="text" name="role_id">

   

<p>Фото</p><input type="file" name="fileToUpload" id="fileToUpload">
<br>
<br>

   <button type="submit" name="submit">Добавить</button>
   </form>
</div>

</body>
</html>