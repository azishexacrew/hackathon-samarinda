
<?php

include"konek.php";

?>
<style type="text/css">
   title
   {

    background-color:blue;
    width: 200px;
    height :20px;
    color: blue;
    border-radius: 1px dotted blue;
   } 


</style>
     <div class="module-body">
                                <section class="docs" style="overflow-x: scroll;">
                                 
                                  
                                   <center><h3>
                                        Data Penjual</h3></center><hr>
                                        
                                    <table >
                                    
                                        <tr>
                                            <td> <input type="text" name="cari" style="margin-top: 18px; margin-left: 40px;" placeholder="cari berdasarkan nomor pekerja"  id="myInput4" onkeyup="myFunction4()"></td>
                                      
                                        <td> <input type="text" name="cari" style="margin-top: 18px;margin-left: 30px;" placeholder="cari berdasarkan Nama "  id="myInput5" onkeyup="myFunction5()"</td>
                                        
                                       <td style="padding-left: 10px;"><?php
                                        include"konek.php";

     $entries2=3;
    $query=mysql_query("select * from penjual"); //input
    $get_pages=mysql_num_rows($query);
    
    if ($get_pages>$entries2)  //proses
    {
        echo "<b>Halaman</b> :  ";
        $pages=1;
        while($pages<=ceil($get_pages/$entries2))
        {
            if ($pages!=1 OR $page>1)
            {
                echo "|";
            }
        ?>
        <a href="home.php?con=6&id_penjual=<?php echo ($pages-1); ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900" title="pilih untuk melihat halaman <?php echo $pages;?>"><?php echo $pages; ?></a>
        <?php
            $pages++;
        }
    }else{
        $pages=0;
    }
    ?>
<b>&nbsp;&nbsp;Jumlah data :&nbsp;<?php echo mysql_num_rows($query); ?></b> 
</td>


 
                                         
                                        </tr>
                                </table>
                                    
                                    <p>
                                         
                                    <form method="post" action="home.php?con=8" style="width: 1000px;">

                                       <table class=" table table-striped" id="myTable2" style="width: 1000px;">
                                  <thead>
                                    <tr>
                         <th></th>
                        <th>Id</th>
                        <th>nama</th>
                         <th>Jenis Sampah</th>
                         <th>Latitude</th>
                        <th>Longitude</th>
                        <th>no.HP</th>
                        <th>Kecamatan</th>
                                    </tr>
                                  </thead>
                                  <tbody >
                             <?php
                             $i=0;
                             $page=$_REQUEST['id_penjual'];
                             $offset=$page*$entries2;
                       $sql=mysql_query("select * from penjual order by id_penjual desc limit $offset,$entries2");
                           if (mysql_num_rows($sql)>0) { 
                        while($rws1=  mysql_fetch_assoc($sql)){
                             echo "<tr><td><input type='checkbox' title='Klik untuk memilih Data'  name='hapus[]' value=".$rws1[id_penjual];
                            echo " /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='home.php?con=7&ferdi=".$rws1[id_penjual]."' title='Edit Data Petugas'><img src='../edit.png'></a></td>";
                            echo "<td>".$rws1['id_penjual']."</td>";
                             echo "<td>".$rws1['nama_penjual']."</td>";
                             echo "<td>".$rws1['jenis_sampah']."</td>";
                            echo "<td>".$rws1['lat']."</td>";
                            echo "<td>".$rws1['lon']."</td>";
                             echo "<td>".$rws1['no_hp']."</td>";
                            echo "<td>".$rws1['kec']."</td>";
                          $i++; 
                           echo "</tr>";
                            }
                                            echo "<tr>";
                                            echo "<td> <button type='submit' class='btn' name='admin' style='background-color:#e5e5e5;width:70px;' title='Hapus Data Petugas'><img src='../delete2.png' style='width:15px;' title='Hapus Data Pekerja'>&nbsp;Hapus</button></td>";



                                            echo"</tr>";
                
   
                }else{
                 echo"<tr>";

                  echo"<td colspan='13'><center><b>Data Petugas Tidak ada</b></center></td>";
                echo"</tr>" ;  

                }

                ?>

                                  </tbody>
                                </table>                
                                   
                                 </form>
                                 <script src="../jquery.js">
                                 </script>
                                 <script type="text/javascript">
                                   $(document) .ready(function () {
                                    $("sentuh").mouseover(function () {
                                        $("satu").show();

                                    })

                                   }) 

                                 </script>
                                   
                                 </script>
                                 <div class="nama">
                                   

                                 </div>
                                </section>
                                </div>