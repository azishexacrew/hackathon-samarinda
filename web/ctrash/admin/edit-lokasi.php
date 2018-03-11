
<?php 
include"konek.php";
?>

<?php 
$id_lokasi=$_REQUEST['ferdi'];
$sql=mysql_query("select*from peta where id_lokasi=$id_lokasi");
$arr=mysql_fetch_assoc($sql);
$nama=$arr['nama_lokasi'];
$latitude=$arr['lat'];
$longitude=$arr['lon'];
$status=$arr['status'];
 ?>
<form method="post" action="alter-datalokasi.php" class="form-horizontal row-fluid">
	<h1 style="padding: 10px;"><center>Edit Lokasi</center></h1><hr>
	                                          <div class="control-group">
                                              <input type="hidden" name="idlokasi" value="<?php echo $idlokasi; ?>">
                                            <label class="control-label" for="basicinput"  >Nama Lokasi : </label>
                                            <div class="controls">
                                                <input type="text" name="nama"    id="basicinput" placeholder="Isi nama lokasi " value="<?php echo $nama;  ?>"      class="span8" style="margin-left: 3px;  >
                                                <span class="help-inline">
                                          </div> 
                                        </div>
                                         <div class="control-group">
                                         <label class="control-label" for="basicinput">Latitude :</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan latitude" class="span8" name="latitude" style="margin-left: 3px;" required="" value="<?php echo $latitude;?>" >
                                                <span class="help-inline">
                                            </div>
                                        </div>
                                      
                                             <div class="control-group">

                                         <label class="control-label" for="basicinput" >Longitude:</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan Longitudet" class="span8" name="longitude" style="margin-left: 3px;" required="" value="<?php echo $longitude;?>" >
                                                <span class="help-inline">
                                               </div>
                                        </div>
                                         
                                             <div class="control-group">
                                        <label class="control-label" for="basicinput">Status :</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan status" class="span8" name="status"  style="margin-left: 3px;" required="" value="<?php echo $status ?>" >
                                                <span class="help-inline">
                                              </div> 
                                        </div>
                                        
                                        <div class="control-group" style="float: left; margin-bottom: 10px;" >
                                            <div class="controls">
                                                <button type="submit" class="btn"  style="background-color: skyblue">Edit </button>  <button type="submit" class="btn"  style="background-color: skyblue">Cancel</button>
                                                
                                            </div>
                                        </div>

                                        </form>
                                        </div>






