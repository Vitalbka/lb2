<?php
// Страница авторизации
// Соединямся с БД
session_start();
$link=mysqli_connect("localhost", "root", "", "lb2");
$first_name = $_POST['first_name'];
$password = $_POST['password'];
$query = mysqli_query($link, "SELECT id FROM users WHERE first_name='".$first_name."'AND password='$password'");

    if(mysqli_num_rows($query) == 1)
    {
      $query1 = mysqli_query($link,"SELECT * FROM users INNER JOIN roles ON role_id = title WHERE users.role_id = 'admin' AND users.first_name = '".$first_name."'");


     if (mysqli_num_rows($query1) == 1) {
                $_SESSION['Name'] = $first_name;
                $_SESSION['Role'] = 'admin';
                $_SESSION['User'] = $users;
       header("Location:tableAdmin.php");

      } else {
        $_SESSION['Name'] = $first_name;
        $_SESSION['Role'] = 'user';
        $_SESSION['User'] = $users;

       header("Location:tableAdmin.php");
      }

      

        //  header("Location:tableAdmin.php");
    }else{
      echo "Вы ввели неправильное имя или пароль!";
      echo '<br>';
      echo '<a href="index.php">Повторить попытку</a>';
    }

?>
