<?php
session_start();
if(isset($_SESSION['Name'])){
  echo $_SESSION['Name'];
  echo "   ";
  echo $_SESSION['Role'];

}else{
  echo"ERROR";
}
$link=mysqli_connect("localhost", "root", "", "lb2");

if($_SESSION['Role']=='admin'){
    if(isset($_GET['del'])){
      $id=$_GET['del'];
      $query="DELETE FROM users WHERE id=$id";
      $query1="DELETE FROM roles WHERE id=$id";

      mysqli_query($link,$query)or die(mysqli_error($link));
        mysqli_query($link,$query1)or die(mysqli_error($link));

    }

    $query = "SELECT * FROM users";
    $result = mysqli_query($link,$query) or die (mysqli_error($link));
    for ($data=[]; $row=mysqli_fetch_assoc($result) ; $data[]=$row);

}else{
echo "<table border=1 style='text-align: center;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Photo</th></tr>";
$res = mysqli_query($link, 'SELECT * FROM users');
while($row = mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['last_name']."</td>";
    echo "<td>".$row['role_id']."</td>";
    echo "<td>"."<img style='width: 80px;' src = 'images/".$row['photo']."'></td>";
    echo "</tr>";
}
echo "</table>";
}




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
<table>
  <?php if($_SESSION['Role'] == 'admin') {?>
    <?php foreach ($data as $users) { ?>
        <tr>
            <td><?=$users['first_name']?></td>
            <td><?=$users['last_name']?></td>
            <td><?=$users['password']?></td>
            <td><?=$users['role_id']?></td>
            <td><img style="width: 80px;" src="images/<?=$users['photo']?>"></td>
            <td><a href="edit.php?Id=<?=$users['id']?>">edit</a></td>
            <td><a href="?del=<?=$users['id']?>">delete</a></td>
        </tr>
        
        

    <?php }?>
    <p><a href="add.php">Добавить</a></p>
        <p><a href="logout.php">Выход</a></p>
  </table>
  <?php }elseif ($_SESSION['Role']=='user'){ ?>
    <div class="container">
        <h4>User</h4>
        <p><a href="edit.php">edit</a></p>
        <a href="logout.php">Выход</a>
    </div>
  <?php }?>
 


</body>
</html>