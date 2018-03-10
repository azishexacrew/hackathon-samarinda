<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Tong Sampah</title>
    <link href="pustaka/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom: 0px;">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tong Sampah</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>


        <div class="clearfix"></div>
        <div class="container" style="margin-top: 80px">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              
              <div class="panel panel-success">
                <div class="panel-heading"><h1>Daftar</h1><span>Isi formulir pendaftaran dibawah ini</span></div>
                <div class="panel-body">
                  
                  <form action="register_aksi.php" method="post">
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Username" name="user" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required>
                      </div>
                    </div>
                    
                    
                    <div class="checkbox">
                    </div>
                    <button type="submit" class="btn btn-success">Daftar</button>
                    <a href="login.php"><button type="button" class="btn btn-primary">Masuk</button></a>
                    
                  </form>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>


    <script src="pustaka/js/jquery.js"></script>
    <script src="pustaka/js/bootsrap.min.js"></script>
  </body>
</html>