<?php
session_start();
$link=mysqli_connect("localhost", "root", "", "lb2");
if(isset($_SESSION['Name'])){
  echo $_SESSION['Name'];

}else{
  echo"ERROR";
}
$product_id=$_SESSION['Name'];
$product = mysqli_query($link,"SELECT * FROM 'users' WHERE 'first_name'='$product_id'");

$query = "SELECT * FROM users WHERE 'first_name'='$product_id'";
$result = mysqli_query($link,$query) or die (mysqli_error($link));


$product = mysqli_fetch_assoc($result);
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
   <form method="POST" action="updateUser.php" enctype="multipart/form-data">
   <label for="first_name" value="<?=$query['first_name']?>">Отредактировать имя:</label>
   <input type="text" name="first_name">

   <label for="last_name" value="<?=$query['last_name']?>">Отредактировать фамилию:</label>
   <input type="text" name="last_name">

   <label for="password" value="<?=$query['password']?>">Отредактировать пароль:</label>
   <input type="text" name="password">

   
   <input type="hidden" name="id" value="<?=$product_id?>">

   <p>Фото</p><input type="file" name="fileToUpload" id="fileToUpload">

   <button type="submit" name="submit">Update</button>
   </form>

   <a href="logout.php">Выход</a>
</div>

</body>
</html>
