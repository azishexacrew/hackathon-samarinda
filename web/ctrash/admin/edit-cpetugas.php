
<?php 
include"konek.php";
?>

<?php 
$nip=$_REQUEST['ferdi'];
$sql=mysql_query("select*from petugas where nip=$nip");
$arr=mysql_fetch_assoc($sql);
$nip=$arr['nip'];
$nama=$arr['nama_petugas'];
$jk=$arr['jk'];
$tempat=$arr['tempat_lahir'];
$tanggal=$arr['tgllahir'];
$email=$arr['email'];
$password=$arr['password'];
$lokasi=$arr['lokasi'];
 ?>
<form method="post" action="alter-cpetugas.php" class="form-horizontal row-fluid">
	<h1 style="padding: 10px;"><center>Edit Petugas</center></h1><hr>
	                                          <div class="control-group">
                                            <label class="control-label" for="basicinput"  >Nip : </label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Isi Nip " class="span8" name="nip" style="margin-left: 3px;" required="" value="<?php echo $nip; ?>">
                                                <span class="help-inline">
                                          </div> 
                                        </div>
                                         <div class="control-group">
                                         <label class="control-label" for="basicinput">Nama :</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan nama" class="span8" name="nama" style="margin-left: 3px;" required=""  value="<?php echo $nama ;?>">
                                                <span class="help-inline">
                                            </div>
                                        </div>
                                         <div class="control-group">
                                         
                                          <label class="control-label" for="basicinput" > jenis kelamin</label>
                                            <div class="controls">
                                               <select name="jk" value="<?php echo $jk; ?>">
                                                 <option>-pilih-</option>
                                                 <option value="L">Laki-laki</option>
                                                 <option value="P">Perempuan</option>

                                               </select>
                                                <span class="help-inline">
                                           </div> 
                                        </div>
                                          <div class="control-group">
                                         
                                          <label class="control-label" for="basicinput" > Tempat Lahir:</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="masukkan tempat lahir" class="span8" name="tempat" style="margin-left: 3px;" required="" value="<?php echo $tempat;?>">
                                                <span class="help-inline">
                                           </div> 
                                        </div>
                                             <div class="control-group">
                                         <label class="control-label" for="basicinput" >tanggal lahir :</label>
                                            <div class="controls">
                                                <input type="date" id="basicinput" placeholder="Masukkan tanggal lahir" class="span8" name="tanggal" style="margin-left: 3px;" required="" value="<?php echo $tanggal; ?>" >
                                                <span class="help-inline" >
                                               </div>
                                        </div>
                                         
                                             <div class="control-group">
                                        <label class="control-label" for="basicinput">Email:</label>
                                            <div class="controls">
                                               <input type="email" id="basicinput" placeholder="Masukkan Email" class="span8" name="email" style="margin-left: 3px;" required="" value="<?php echo $email;?>" >
                                                <span class="help-inline">
                                              </div> 
                                        </div>
                                         <div class="control-group">
                                       <label class="control-label" for="basicinput">Password:</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan password" class="span8" name="password"  style="margin-left: 3px;" required=""  value="<?php echo $password; ?>" >
                                                <span class="help-inline">
                                          </div>   
                                        </div>
                                         <div class="control-group">
                                        <label class="control-label" for="basicinput"  >Lokasi :</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Masukkan Lokasi" class="span8" name="lokasi"  style="margin-left: 3px;" required="" value="<?php echo $lokasi; ?>">
                                                <span class="help-inline">
                                        </div>
                                        <div class="control-group" style="float: left; margin-bottom: 10px;" >
                                            <div class="controls">
                                                <button type="submit" class="btn"  style="background-color: skyblue">Edit </button>
                                            </div>
                                        </div>


                                        </form>
                                        </div>






