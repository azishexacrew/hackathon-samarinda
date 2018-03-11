<?php include "header.php"; ?>


<div class="clearfix"></div>
<div class="container" style="margin-top: 80px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      
      <div class="panel panel-success">
        <div class="panel-heading"><h1>Edit Driver</h1></div>
        <div class="panel-body">
          
          <form action="edit_driver_aksi.php" method="post">
            <input type="hidden" name="id_driver" value="<?php echo $_GET['id'] ?>" >
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
              </div>
            </div>
            
            
            <div class="checkbox">
            </div>
            <button type="submit" class="btn btn-success">Edit Driver</button>
            
          </form>
        </div>
        
      </div>
    </div>
    
  </div>
</div>

<?php include "footer.php"; ?>