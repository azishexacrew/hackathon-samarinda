<?php
if(isset($_REQUEST['submitBtn'])){
    include 'konek.php';
    $username=$_REQUEST['nama'];
    $password= ($_REQUEST['password']);
    $sql="SELECT username,password FROM admin WHERE username='$username' AND password='$password'";
    $result=mysql_query($sql) or die(mysql_error());
    $rws=  mysql_fetch_array($result);
    $user=$rws[0];
    $pwd=$rws[1];    
    if($user==$username && $pwd==$password){
        session_start();
        $_SESSION['admin_login']=1;
        $_SESSION['admin_id']=$username;
    header('location:home.php?con=12'); 
    }
else{
    header('location:index.php');  
}
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Login Admin</title>
	<link rel="stylesheet" href="style1.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	
</head>
<body>
	<div class="lg-container">
		<h1>Login Admin</h1>
		<form action="" id="lg-form" name="lg-form" method="post">
			
			<div>
				<label for="username">Nik:</label>
				<input type="text" name="nama" id="username" placeholder="Nomor Id" required="" />
			</div>
			
			<div>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" placeholder="password" required="" />
			</div>
			
			<div>				
				<button type="submit" id="login" name="submitBtn">Login</button>
			</div>
			
		</form>
		<div id="message"></div>
	</div>
</body>
</html>