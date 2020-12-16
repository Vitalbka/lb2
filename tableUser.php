<?php
session_start();
$link=mysqli_connect("localhost", "root", "", "lb2");

if(isset($_SESSION['Name'])){
  echo $_SESSION['Name'];

}else{
  echo"ERROR";
}


echo "<table border=1 style='text-align: center;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Photo</th></tr>";
$res = mysqli_query($link, 'SELECT * FROM users');
while($row = mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['last_name']."</td>";
    echo "<td>"."<img style='width: 80px;' src = 'images/".$row['photo']."'></td>";
    echo "</tr>";
}
echo "</table>";
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
<h4>User</h4>
<p><a href="editUser.php">edit</a></p>
   <a href="logout.php">Выход</a>

</div>
</body>
</html>
