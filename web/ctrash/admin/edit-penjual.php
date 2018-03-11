
<?php 
include"konek.php";
?>

<?php 
$id=$_REQUEST['ferdi'];
$sql=mysql_query("select*from penjual where id_penjual=$id");
$arr=mysql_fetch_assoc($sql);
$nama=$arr['nama_penjual'];
$jenis=$arr['jenis_sampah'];
$lat=$arr['lat'];
$lon=$arr['lon'];
$satuan=$arr['satuan'];
$harga=$arr['harga'];
 ?>
<form method="post" action="alter-cpetugas.php" class="form-horizontal row-fluid">
	<h1 style="padding: 10px;"><center>Edit Penjual</center></h1><hr>
	                                           <div class="control-group">
                                            <label class="control-label" for="basicinput">nama</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="masukkan Nama " class="span8" name="nama" style="margin-left: 3px;" required="" value="<?php echo $ ?>">
                                                <span class="help-inline">
                                          </div> 
                                        </div>
                                         <div class="control-group">
                                         <label class="control-label" for="basicinput">Jenis sampah:</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan Jenis Sampah" class="span8" name="jenis" style="margin-left: 3px;" required="" >
                                                <span class="help-inline">
                                            </div>
                                        </div>
                                      
                                          <div class="control-group">
                                         
                                          <label class="control-label" for="basicinput" >Longitude:</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="masukkan longitude" class="span8" name="longitude" style="margin-left: 3px;" required="">
                                                <span class="help-inline">
                                           </div> 
                                        </div>
                                             <div class="control-group">
                                         <label class="control-label" for="basicinput" >Latitude :</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan Latitude" class="span8" name="latitude" style="margin-left: 3px;" required="" >
                                                <span class="help-inline">
                                               </div>
                                        </div>
                                         
                                             <div class="control-group">
                                        <label class="control-label" for="basicinput">satuan:</label>
                                            <div class="controls">
                                               <input type="text" id="basicinput" placeholder="Masukkan satuan" class="span8" name="satuan" style="margin-left: 3px;" required="" >
                                                <span class="help-inline">
                                              </div> 
                                        </div>
                                         <div class="control-group">
                                        <label class="control-label" for="basicinput">harga:</label>
                                            <div class="controls">
                                               <input type="text" id="basicinput" placeholder="Masukkan Harga" class="span8" name="harga" style="margin-left: 3px;" required="" >
                                                <span class="help-inline">
                                              </div> 
                                        </div>
                                         
                                         
                                        
                                        <div class="control-group" style="float: left; margin-bottom: 10px;" >
                                            <div class="controls">
                                                <button type="submit" class="btn"  style="background-color: skyblue">Add </button>  
                                            </div>
                                        </div>


                                        </form>
                                        </div>






