<?php
session_start();
if(isset($_SESSION['Name'])){
  echo $_SESSION['Name'];
  echo "    ";
  echo $_SESSION['Role'];

}else{
  echo"ERROR";
}
$link=mysqli_connect("localhost", "root", "", "lb2");
	if($_SESSION['Role']=='admin'){
			$product_id=$_GET['Id'];
			$product = mysqli_query($link,"SELECT * FROM 'users' WHERE 'id'='$product_id'");

			$query = "SELECT * FROM users WHERE 'id'='$product_id'";
			$result = mysqli_query($link,$query) or die (mysqli_error($link));


			$product = mysqli_fetch_assoc($result);
	}else{
			$product_id=$_SESSION['Name'];
			$product = mysqli_query($link,"SELECT * FROM 'users' WHERE 'first_name'='$product_id'");

			$query = "SELECT * FROM users WHERE 'first_name'='$product_id'";
			$result = mysqli_query($link,$query) or die (mysqli_error($link));


			$product = mysqli_fetch_assoc($result);
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

<div class="container">
	  <?php if($_SESSION['Role'] == 'admin') {?>

		   <form method="POST" action="update.php"  enctype="multipart/form-data">
		   <label for="first_name" value="<?=$query['first_name']?>">Отредактировать имя:</label>
		   <input type="text" name="first_name">

		   <label for="last_name" value="<?=$query['last_name']?>">Отредактировать фамилию:</label>
		   <input type="text" name="last_name">

		   <label for="password" value="<?=$query['password']?>">Отредактировать пароль:</label>
		   <input type="text" name="password">

		   <label for="role_id" value="<?=$query['role_id']?>">Отредактировать Role:</label>
		   <input type="text" name="role_id">

		   
		   <input type="hidden" name="id" value="<?=$product_id?>">

		   <p>Фото</p><input type="file" name="fileToUpload" id="fileToUpload">

		   <button type="submit" name="submit">Update</button>
		   <br>
		   <br>
		   <a href="logout.php">Выход</a>
		   </form>
  <?php }else{ ?>
  		  <form method="POST" action="update.php" enctype="multipart/form-data">
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
  <?php }?>

</div>

</body>
</html>
