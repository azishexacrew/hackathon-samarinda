<?php include '../core/helper.php' ?>
<?php include '../core/koneksi.php' ?>
<?php is_admin() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tong Sampah</title>
	<link href="../pustaka/css/bootstrap.min.css" rel="stylesheet">
	<link href="../pustaka/css/tema.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<nav id="custom-bootstrap-menu" class="navbar navbar-default" style="margin-bottom: 0px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img width="80px" src="../image/logo-tong3.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Beranda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Driver <span class="caret"></span></a>

          <ul class="dropdown-menu">
            <li><a href="tambah_driver.php">Tambah Driver</a></li>
            <li><a href="list_driver.php">List Driver</a></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>

          <ul class="dropdown-menu">
            <li><a href="tambah_user.php">Tambah User</a></li>
            <li><a href="list_user.php">List User</a></li>

          </ul>
        </li> 
        <li><a href="daftar_harga.php">Daftar Harga</a></li> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>

          <ul class="dropdown-menu">
            <li><a href="../logout.php">Logout</a></li>
          </ul>
        </li>     
              
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>