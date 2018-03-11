
<?php include 'header.php' ?>

<div class="container" style="margin-top: 40px">
	<div class="row">
		<div class="col-md-4" >
			<div class="panel panel-success">
                <div class="panel-heading"><h1>Tambah Sampah</h1></div>
                <div class="panel-body">
                  
                  <form action="tambah_sampah_aksi.php" method="post">

<?php

function create_random($length)
{
    $data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
    $string = '';
    for($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
}

$etiket=create_random(4);


?>


                  <div class="form-group">
                      <label>E-tiket</label>
                      
                      <div class="input-group">
                      <input type="hidden" name="etiket" value="<?php echo $etiket; ?>">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span></span>
                        <input type="text" class="form-control" disabled="disabled" placeholder="E-tiket" name="etiket" value="<?php echo $etiket; ?>" required >                        
                      </div>
                      <span class="help-block">Ini adalah E-Tiket Jemput Sampah Anda.</span>
                    </div>

                    
                    <div class="form-group">
                      <label for="exampleInputName1">Jenis Sampah</label>
                      
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></span>                    
							
            						<select class="form-control" name="id_kat" required>
                          <option value="">Pilih Kategori</option>
                          <option value="">------------------</option>

            						<?php 
            							$query = mysqli_query($conn, "SELECT * FROM kategori");	
            							while($result = mysqli_fetch_array($query)): ?>	
                          
            						  <option value="<?php echo $result['id_kat'] ?>"><?php echo $result['nama_kat'] ?></option>
            						<?php endwhile; ?>
            						</select>						
                        
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Keterangan</label>
                      
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Keterangan" name="ket" required>
                      </div>
                    </div>
                    
                    
                    <div class="checkbox">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Tambah Sampah</button>
                    
                  </form>
                </div>
                
              </div>
		</div>

    <div class="col-md-8">
      <?php include_once "dompet.php"; ?>
    </div>
	</div>
</div>	

<?php include 'footer.php' ?>