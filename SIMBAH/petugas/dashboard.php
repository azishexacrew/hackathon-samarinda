<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<!-- Mirrored from byrushan.com/projects/mae/1-0/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Mar 2018 22:45:17 GMT -->
<?php 
require '../core/database/content.php'; 
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/index.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Admin</title>

    <link href="../vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="../vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="../vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">

    <link href="../vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="../vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css" rel="stylesheet">
    <link href="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="../vendors/farbtastic/farbtastic.css" rel="stylesheet">
    <link href="../vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
    <link href="../vendors/summernote/dist/summernote.css" rel="stylesheet">
    <link href="../vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">


    <!-- CSS -->
    <link href="../css/app.min.1.css" rel="stylesheet">
    <link href="../css/app.min.2.css" rel="stylesheet">

</head>
<body data-ma-header="teal">
    <header id="header" class="media">
        <div class="pull-left h-logo">
            <a href="dashboard.php" class="hidden-xs">
                <?php echo($_SESSION["username"]) ?>   
                <small>
                    <?php 
                    $level = ($_SESSION["level"]); 
                    if($level == 1){
                        echo "Administartor";
                    }else if($level == 2){
                        echo "Pegawai";
                    }else{
                        echo "Anggota";
                    }
                    ?> 
                </small>
            </a>
            <input type="hidden" id="userid" value="<?php echo $_SESSION["userid"] ?>">
            <div class="menu-collapse" data-ma-action="sidebar-open" data-ma-target="main-menu">
                <div class="mc-wrap">
                    <div class="mcw-line top palette-White bg"></div>
                    <div class="mcw-line center palette-White bg"></div>
                    <div class="mcw-line bottom palette-White bg"></div>
                </div>
            </div>
        </div>

        <ul class="pull-right h-menu">
            <li class="hm-search-trigger">
                <a href="#" data-ma-action="search-open">
                    <i class="hm-icon zmdi zmdi-search"></i>
                </a>
            </li>

            <li class="dropdown hidden-xs hidden-sm h-apps">
                <a data-toggle="dropdown" href="#">
                    <i class="hm-icon zmdi zmdi-apps"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="#">
                            <i class="palette-Red-400 bg zmdi zmdi-calendar"></i>
                            <small>Calendar</small>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="palette-Green-400 bg zmdi zmdi-file-text"></i>
                            <small>Files</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="palette-Light-Blue bg zmdi zmdi-email"></i>
                            <small>Mail</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="palette-Orange-400 bg zmdi zmdi-trending-up"></i>
                            <small>Analytics</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="palette-Purple-300 bg zmdi zmdi-view-headline"></i>
                            <small>News</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="palette-Blue-Grey bg zmdi zmdi-image"></i>
                            <small>Gallery</small>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown hidden-xs">
                <a data-toggle="dropdown" href="#"><i class="hm-icon zmdi zmdi-more-vert"></i></a>
                <ul class="dropdown-menu dm-icon pull-right">
                    <li class="hidden-xs">
                        <a data-action="fullscreen" href="#"><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                    </li>
                    <li>
                        <a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-face"></i> Privacy Settings</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-settings"></i> Other Settings</a>
                    </li>
                </ul>
            </li>
            <li class="hm-alerts" data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                <a href="#"><i class="hm-icon zmdi zmdi-notifications"></i></a>
            </li>
            <li class="dropdown hm-profile">
                <a data-toggle="dropdown" href="#">
                    <img src="../img/profile-pics/1.jpg" alt="">
                </a>

                <ul class="dropdown-menu pull-right dm-icon">
                    <li>
                        <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="media-body h-search">
            <form class="p-relative">
                <input type="text" class="hs-input" placeholder="Search for people, files & reports">
                <i class="zmdi zmdi-search hs-reset" data-ma-action="search-clear"></i>
            </form>
        </div>

    </header>

    <section id="main">
        <aside id="s-user-alerts" class="sidebar">
            <ul class="tab-nav tn-justified tn-icon m-t-10" data-tab-color="teal">
                <li><a class="sua-messages" href="#sua-messages" data-toggle="tab"><i class="zmdi zmdi-email"></i></a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade" id="sua-messages">
                    <ul class="sua-menu list-inline list-unstyled palette-Light-Blue bg">
                        <li><a href="#"><i class="zmdi zmdi-check-all"></i> Mark all</a></li>
                        <li><a href="#"><i class="zmdi zmdi-long-arrow-tab"></i> View all</a></li>
                        <li><a href="#" data-ma-action="sidebar-close"><i class="zmdi zmdi-close"></i> Close</a></li>
                    </ul>

                    <div class="list-group lg-alt c-overflow" id="list-pesan"></div>

                    <a href="#" class="btn btn-float btn-danger m-btn">
                        <i class="zmdi zmdi-plus"></i>
                    </a>
                </div>
            </div>
        </aside>

        <aside id="s-main-menu" class="sidebar">
            <div class="smm-header">
                <i class="zmdi zmdi-long-arrow-left" data-ma-action="sidebar-close"></i>
            </div>

            <ul class="smm-alerts">
                <li class="active" data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                    <i class="zmdi zmdi-email"></i><span id="count-notif"></span>
                </li>
            </ul>

            <ul class="main-menu">
                <li class="active">
                    <a href="index-2.html"><i class="zmdi zmdi-home"></i> Home</a>
                </li>
                <li class="<?php if($_GET['pages']=='pesan'){echo 'active';} ?>"><a href="dashboard.php?pages=pesan"><i class="zmdi zmdi-format-underlined"></i> Pesan</a></li>
                <li><a href="../logout.php"><i class="zmdi zmdi-format-underlined"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Modal Lihat Pesan -->
        <div class="modal fade" id="lihat-pesan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="nama-pengirim"></h4>
                    </div>
                    <div class="modal-body">
                        <p id="isi-pesan-pengirim"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Lihat Lokasi</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <section id="content">
            <?php 
            if(isset($_GET["pages"])){
                if($_GET["pages"]=="pesan"){
                    include '../pages/pesan.php';
                }
            }else{
                include 'home.php';
            }
            ?>
        </section>

        <footer id="footer">
            Copyright &copy; 2015 Material Admin

            <ul class="f-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </footer>

    </section>

    <!-- Page Loader -->
    <div class="page-loader palette-Teal bg">
        <div class="preloader pl-xl pls-white">
            <svg class="pl-circular" viewBox="25 25 50 50">
                <circle class="plc-path" cx="50" cy="50" r="20"/>
            </svg>
        </div>
    </div>

    <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->

        <!-- Javascript Libraries -->
        <!-- Javascript Libraries -->
        <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="../vendors/bootstrap-growl/bootstrap-growl.min.js"></script>

        <script src="../vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="../vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="../vendors/bower_components/nouislider/distribute/jquery.nouislider.all.min.js"></script>
        <script src="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
        <script src="../vendors/summernote/dist/summernote-updated.min.js"></script>
        <script src="../vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="../vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="../vendors/bower_components/chosen/chosen.jquery.min.js"></script>
        <script src="../vendors/fileinput/fileinput.min.js"></script>
        <script src="../vendors/input-mask/input-mask.min.js"></script>
        <script src="../vendors/farbtastic/farbtastic.min.js"></script>


        <script src="../js/functions.js"></script>
        <script src="../js/actions.js"></script>
        <script src="../js/demo.js"></script>
        <script src="../js/script.js"></script>
       <!--  <script>
          function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 4,
              center: uluru
          });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
          });
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzqHbJ2oOE02Q9Ud_EWXqZ3Fh-7h-8bHw&callback=initMap"> -->
</script>
</body>

<!-- Mirrored from byrushan.com/projects/mae/1-0/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Mar 2018 22:45:17 GMT -->
</html>