<?php
// Страница авторизации
// Соединямся с БД
session_start();
$link=mysqli_connect("localhost", "root", "", "lb2");
/*$first_name = $_POST['first_name'];
$password = $_POST['password'];
$query = mysqli_query($link, "SELECT id FROM users WHERE first_name='".$first_name."'AND password='$password'");

    if(mysqli_num_rows($query) == 1)
    {
      $query1 = mysqli_query($link,"SELECT * FROM users INNER JOIN roles ON role_id = title WHERE users.role_id = 'admin' AND users.first_name = '".$first_name."'");


      if (mysqli_num_rows($query1) == 1) {
                $_SESSION['Name'] = $first_name;

       header("Location:tableAdmin.php");

      } else {
        $_SESSION['Name'] = $first_name;


       header("Location:tableUser.php");
      }
      
    }else{
      echo "Вы ввели неправильное имя или пароль!";
    }
*/
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
   <a href="table.php">Таблица пользователей</a>

<div class="container">
   <form method="POST" action="check.php">
   <label for="first_name">Имя:</label>
   <input type="text" name="first_name">




   <label for="password">Пароль:</label>
   <input type="text" name="password">


 

   <button type="submit" name="submit">Вход</button>
   <a href="login.php">Зарегистрироваться</a>
   </form>
</div>

</body>
</html>
