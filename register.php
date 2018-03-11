<?php include "header.php"; ?>

        <div class="container" style="margin-top: 40px">
          <div class="row">            
              <?php if(isset($_GET['pesan']) != "" ): ?>
                <div class="alert alert-danger" role="alert"><?php echo $_GET['pesan'] ?></div>                    
              <?php endif ?>

              <form action="register_aksi.php" method="post">
              <div class="row">
              <div class="col-md-5">
              <div class="panel panel-success">
                <div class="panel-heading"><h1>Daftar</h1><span>Daftar disini, untuk menjadi kontributor sampah</span></div>
                <div class="panel-body">          
                                     
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
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required>
                      </div>
                    </div>
<hr>

<a href="login.php" class="pull-right"><p>Ke Form Login</p></a>
                  </div>
              </div>
</div>

<!--biodata-->
<div class="col-md-7">
<div class="panel panel-primary">
                <div class="panel-heading"><h1>Biodata</h1><span>Isi biodata dibawah ini dengan lengkap dan benar.</span></div>
                <div class="panel-body">          
                                        
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" placeholder="Nama" name="nama">
                    </div>

                    <div class="form-group">
                      <label>HP</label>
                      <input type="text" class="form-control" placeholder="HP" name="hp">
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                    </div>

                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select name="kecamatan" class="form-control">
                        <option value="">Pilih Kecamatan</option>
                        <option value="">------------------</option>
                        
                        <?php 
                          $data_kecamatan = get_kecamatan($token);
                          $result = json_decode($data_kecamatan, 1);                          
                          for ($i = 0; $i < count($result['data']); $i++):
                        ?>
                        <option value="<?php echo $result['data'][$i]['name']; ?>"><?php echo $result['data'][$i]['name']; ?></option>
                        <?php endfor ?>

                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select name="kelurahan" class="form-control">
                        <option value="">Pilih Kelurahan</option>
                        <option value="">------------------</option>
                        
                        <?php 
                          $data_kelurahan = get_kelurahan($token);
                          $result = json_decode($data_kelurahan, 1);                          
                          for ($i = 0; $i < count($result['data']['data']); $i++):
                        ?>
                        <option value=""><?php echo $result['data']['data'][$i]['name'];  ?></option>
                        <?php endfor ?>

                      </select>
                    </div>
                    

                    <div class="checkbox">
                    </div>
                    <button type="submit" class="btn btn-success">Daftar</button>
                    
                    
                  
                  
                </div>
                


              </div>

</div>

              </form>
            </div>
            

        </div>

<div style="margin-bottom: 80px;"></div>

<?php include "footer.php"; ?>
