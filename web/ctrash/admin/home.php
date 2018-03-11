
<?php
error_reporting(0);
?>
<?php
session_start();
if (!isset($_SESSION['admin_login'])) 
header('location:index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CTrash</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html"></a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                       
                        <form class="navbar-search pull-left input-append" action="#" style="margin-bottom: 10px;">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li >
                              <a href=""> 
                                
                               </a> 
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </home
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                  <li class="active"><a href="home.php?con=12"><i class="menu-icon icon-home"></i>Home
                                </a></li>
            
                                    <li><a href="home.php?con=1"><i class="menu-icon icon-tasks"></i>Statistik</a>
                                 <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon ">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>kelolah data </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                         <li class="satu" style="cursor: pointer;"><a ><i></i>Lokasi </a>
                                            <ul class="ulsatu" style="display:none; ">
                                 <li><a href="home.php?con=1">Entry data </a></li>
                                 <li><a href="home.php?con=20">Data lokasi</a></li>
                             </ul>
                                </li>
                                        <li class="dua" style="cursor: pointer;"><a><i ></i>Penduduk </a>
                                          <ul class="uldua" style="display:none; ">
                                 <li><a href="home.php?con=4">Entry data </a></li>
                                 <li><a href="home.php?con=5">Data Penduduk</a></li>
                             </ul>
                                        </li>
                                        <li class="tiga" style="cursor: pointer;"><a><i ></i>Petugas </a>
                                          <ul class="ultiga" style="display:none; ">
                                 <li><a href="home.php?con=4">Entry data </a></li>
                                 <li><a href="home.php?con=5">Data Petugas</a></li>
                             </ul>
      </li>
      </li>
                                        <li class="empat" style="cursor: pointer;"><a><i ></i>Penjual </a>
                                          <ul class="ulempat" style="display:none; ">
                                 <li><a href="home.php?con=13">Entry data </a></li>
                                 <li><a href="home.php?con=14">Data Penjual</a></li>
                             </ul>

                                        </li>


                                        <li class="lima" style="cursor: pointer;"><a><i ></i>keluhan </a>
                                          <ul class="ullima" style="display:none; ">
                                 
                                 <li><a href="home.php?con=22">Data keluhan</a></li>
                             </ul>

                                        </li>
                                       
                               <script src="../jquery.js"></script>
                                        <script type="text/javascript">
                                      $(document) .ready(function () {
                                             $(".satu").click(function () {
                                                 $(".ulsatu").fadeToggle("fast")
                                                 
                                             });
                                              $(".dua").click(function () {
                                                 $(".uldua").fadeToggle("fast")
                                             });
                                              $(".tiga").click(function () {
                                                 $(".ultiga").fadeToggle("fast")
                                             });
                                              $(".empat").click(function () {
                                                 $(".ulempat").fadeToggle("fast")
                                             });
                                               $(".lima").click(function () {
                                                 $(".ullima").fadeToggle("fast")
                                             });
                                         })  ;
                                        </script>
                                    </ul>
                                       <li><a href="home.php?con=9"><i class="menu-icon icon-key"></i>Ganti Password</a>
                                           <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Keluar</a>
                                </li>  
                                
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                
                            <!--/#btn-controls-->
                            <div class="module" >                


                                 
<?php
if ($_REQUEST['con']==1) {
include"lokasi.php";
}
if ($_REQUEST['con']==2) {
include"edit-lokasi.php";
}
if ($_REQUEST['con']==3) {
include"statistik.php";
}
if ($_REQUEST['con']==4) {
include"add-cpetugas.php";
}
if ($_REQUEST['con']==5) {
include"data-cpetugas.php";
}
if ($_REQUEST['con']==7) {
include"edit-cpetugas.php";
}
if ($_REQUEST['con']==8) {
include"hapus-petugas.php";
}
if ($_REQUEST['con']==9) {
include"ganti-password.php";
}
if ($_REQUEST['con']==13) {
include"penjual.php";
}
if ($_REQUEST['con']==11) {
include"data-penjual.php";
}
if ($_REQUEST['con']==12) {
include"peta.php";
}
if ($_REQUEST['con']==14) {
include"tabel-penjual.php";
}

?>

<script src="filter.js"></script>
<script src="filter2.js"></script>
<script src="filter3.js"></script>
<script src="filter4.js"></script>
<script src="filter5.js"></script>
<script src="filter6.js"></script>

                      </div>
                            <!--/.module-->
        
                          
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container" style="height: 20px;">
                <b class="copyright">
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

      
    </body>
