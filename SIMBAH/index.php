<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<!-- Mirrored from byrushan.com/projects/mae/1-0/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Mar 2018 22:48:33 GMT -->
<?php 
require 'core/database/content.php'; 
// if(isset($_SESSION["userid"])){
//     header("location: dashboard.php");
// }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Admin</title>

    <!-- Vendor CSS -->
    <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
    <link href="vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
    <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

    <link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css" rel="stylesheet">
    <link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="vendors/farbtastic/farbtastic.css" rel="stylesheet">
    <link href="vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
    <link href="vendors/summernote/dist/summernote.css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/app.min.1.css" rel="stylesheet">
    <link href="css/app.min.2.css" rel="stylesheet">
</head>

<body>
    <div class="login" data-lbg="teal">
        <!-- Login -->
        <div class="l-block toggled" id="l-login">
            <div class="lb-header palette-Teal bg">
                <i class="zmdi zmdi-account-circle"></i>
                Hi there! Please Sign in
            </div>

            <div class="lb-body">
                <form id="form-login">
                    <div class="form-group fg-float" id="error-email">
                        <label class="control-label" for="inputError2"></label>
                        <div class="fg-line">
                            <input type="text" id="form-email" name="email" class="input-sm form-control fg-input">
                            <label class="fg-label">Email Address</label>
                        </div>
                    </div>

                    <div class="form-group fg-float" id="error-password">
                        <div class="fg-line">
                            <input type="password" id="form-password" name="password" class="input-sm form-control fg-input">
                            <label class="fg-label">Password</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="fg-line">
                            <div class="select">
                                <select name="level" class="form-control">
                                    <option>-- PIlih Level --</option>
                                    <option value="anggota">Anggota</option>
                                    <option value="petugas">Pegawai</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn palette-Teal bg">Sign in</button>
                </form>

                <div class="m-t-20">
                    <a data-block="#l-register" data-bg="blue" class="palette-Teal text d-block m-b-5" href="#">Creat an account</a>
                    <a data-block="#l-forget-password" data-bg="purple" href="#" class="palette-Teal text">Forgot password?</a>
                </div>
            </div>
        </div>

        <!-- Register -->
        <div class="l-block" id="l-register">
            <div class="lb-header palette-Blue bg">
                <i class="zmdi zmdi-account-circle"></i>
                Create an account
            </div>

            <div class="lb-body">
                <form id="form-register">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" name="nama_r" id="nama_r" class="input-sm form-control fg-input">
                            <label class="fg-label">Name</label>
                        </div>
                    </div>

                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" name="email_r" id="email_r" class="input-sm form-control fg-input">
                            <label class="fg-label">Email Address</label>
                        </div>
                    </div>

                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="password" name="password_r" id="password_r" class="input-sm form-control fg-input">
                            <label class="fg-label">Password</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <select class="selectpicker" data-live-search="true">
                                
                            </select>
                        </div>
                    </div>

                    <div class="checkbox m-b-30">
                        <label>
                            <input type="checkbox" value="">
                            <i class="input-helper"></i>
                            Accept the license agreement
                        </label>
                    </div>

                    <button class="btn palette-Blue bg">Create Account</button>
                </form>

                <div class="m-t-30">
                    <a data-block="#l-login" data-bg="teal" class="palette-Blue text d-block m-b-5" href="#">Already have an account?</a>
                    <a data-block="#l-forget-password" data-bg="purple" href="#" class="palette-Blue text">Forgot password?</a>
                </div>
            </div>
        </div>

        <!-- Forgot Password -->
        <div class="l-block" id="l-forget-password">
            <div class="lb-header palette-Purple bg">
                <i class="zmdi zmdi-account-circle"></i>
                Forgot Password?
            </div>

            <div class="lb-body">
                <p class="m-b-30">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input">
                        <label class="fg-label">Email Address</label>
                    </div>
                </div>

                <button class="btn palette-Purple bg">Create Account</button>

                <div class="m-t-30">
                    <a data-block="#l-login" data-bg="teal" class="palette-Purple text d-block m-b-5" href="#">Already have an account?</a>
                    <a data-block="#l-register" data-bg="blue" href="#" class="palette-Purple text">Create an account</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript Libraries -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
    <script src="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

    <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        <script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>


        <script src="js/functions.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript">
            // $(document).ready(function(){
            //     $.ajax({
            //         url : "http://api.samarindakota.go.id/api/v1/kecamatan?idKota=6472",
            //         datatype : "json",
            //         headers: { "Content-Type":"application/json","Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNjYTA4NWQ3OWQzY2I4M2NkMjgwYWE4MzIzZjc2NDBhNzc2OWMxYWUxNDMyZTk0YzBiZDhlMmM0N2IyZTExZmYxMzhjYTE4NTE1N2VjOGJkIn0.eyJhdWQiOiIzIiwianRpIjoiM2NhMDg1ZDc5ZDNjYjgzY2QyODBhYTgzMjNmNzY0MGE3NzY5YzFhZTE0MzJlOTRjMGJkOGUyYzQ3YjJlMTFmZjEzOGNhMTg1MTU3ZWM4YmQiLCJpYXQiOjE1MjA2NzE5NTgsIm5iZiI6MTUyMDY3MTk1OCwiZXhwIjoxNTUyMjA3OTU4LCJzdWIiOiI5NiIsInNjb3BlcyI6WyJLZWNhbWF0YW4iXX0.b0bi3i_zAL3nE5txcuS4H6rYQVMCnwA1746EN3U2XiIumthBHJf0DPV8dGy6nE8iW7zJhwygMWeTwPL2PS873GQ9FqZJHMQXuFCUsXAzly2vSab_3GIUUJhfkML60GbNwLRgOOGmeVIaICk0nBxM9thJntcestQfiqILSsFYgsB-quWPUXHW4O1oegREeHYVYwFgqg44s1uSgRB5bM3Ymm2crAp5kwTTqXehEpD2A1ZQub9Im1Zf2QsqDrZZz8SzETS25C2TH0LZBKcUxLOGqh4il0aZvC_Cj9jibYL3aNKhffGmVQS4qj5k3xvh7YcJsdrzlGEx58AefpGLeconXqX8GMN0HLW_1gHY-OV0GZphdZYlt4gPHPFVMWg4nlEZ9-EiP6T5n_3APBvJBXtkwRQ9oONMJSOZTmu-skqku0HBrQq7Ak5iaIUoUQCEWac7DhRPCvILzt0sTt7x-GhyQy0DxLu1BXB5_q5UQ-jqPPGZw_Agqh71_r2KdD4m_beGkxXJgQ_nrFDi9Fm8tMfRfG5Lf9LUkH_h4J7xwqL4wnQe78r33mtSc5RnlLfIZY0Vu8_snuMJrPczrCEx4XNtbm3-LuHFYONaKWZoqsdnNlaUH3Kb28UHbFiLgk7P4Ih7yj2e3ocBqr81XeQpbxONNOET8mLxjGeVipKb15-2e3g" },
            //         type : 'GET',
            //         contentType: "application/json",
            //         success : function (data) {
            //             console.log(data);
            //         },
            //         error : function (data, errorThrown) {
            //             alert(3);
            //         }
            //     });
            // })
        </script>
        
    </body>

    <!-- Mirrored from byrushan.com/projects/mae/1-0/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Mar 2018 22:48:33 GMT -->
    </html>