<?php 
require 'functions.php';
if (isset ($_POST["login"])){
$Username = $_POST["username"];
$password = $_POST["password"];

$result = mysqli_query($conn," SELECT *FROM user WHERE username = '$Username'");

 //cek username
 if (mysqli_num_rows($result) === 1){

    //cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])){
        header("location: userform.php");
        exit;
    }
 }

 $error = true;
}

 ?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Silahkan Log In</title>
      <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<form action="" method="post">
  <header>Login
  <?php if(isset($error)): ?>
    <p style="color:white; font-style: italic;" align="center;"> username atau password salah</p>
  <?php endif;  ?>
  </header>
  <label for="username">Username <span>*</span></label>
  <input type="text" name="username" id="username">
  <div class="help">At least 6 character</div>
  <label for="password">Password <span>*</span></label>
  <input type="password" name="password" id="password">
  <div class="help">Use upper and lowercase lettes as well</div>
  <button type="submit" name="login">Login</button>
</form>
</body>
</html>
