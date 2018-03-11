<form method="post" action="add-penjual.php" class="form-horizontal row-fluid">
	<h1 style="padding: 10px;"><center>Add Penjual</center></h1><hr>
	                                          <div class="control-group">
                                            <label class="control-label" for="basicinput">nama</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="masukkan Nama " class="span8" name="nama" style="margin-left: 3px;" required="">
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
                                        <label class="control-label" for="basicinput">Nomor hp:</label>
                                            <div class="controls">
                                               <input type="text" id="basicinput" placeholder="Masukkan satuan" class="span8" name="satuan" style="margin-left: 3px;" required="" >
                                                <span class="help-inline">
                                              </div> 
                                        </div>
                                         <div class="control-group">

                                        <label class="control-label" for="basicinput">kec:</label>
                                            <div class="controls">
                                              <select name="kec">
                                                <?php
                                                 $sumber="smd.json";
                                             $konten=file_get_contents($sumber);
                                             $data=json_decode($konten,true);

                                                for ($i=0; $i <count ($data); $i++) { 
                                                  echo "<option value=".$data[$i]['id'].">".$data[$i]['name']."</option>";
                                                }
                                                 ?>

                                              </select>

                                              </div> 
                                        </div>
                                         
                                         
                                        
                                        <div class="control-group" style="float: left; margin-bottom: 10px;" >
                                            <div class="controls">
                                                <button type="submit" class="btn"  style="background-color: skyblue">Add </button>  
                                            </div>
                                        </div>

                                        </form>
                                        </div>






