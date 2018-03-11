
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
                                        Data Petugas</h3></center><hr>
                                        
                                    <table >
                                    
                                        <tr>
                                            <td> <input type="text" name="cari" style="margin-top: 18px; margin-left: 40px;" placeholder="cari berdasarkan nomor pekerja"  id="myInput4" onkeyup="myFunction4()"></td>
                                      
                                        <td> <input type="text" name="cari" style="margin-top: 18px;margin-left: 30px;" placeholder="cari berdasarkan Nama "  id="myInput5" onkeyup="myFunction5()"</td>
                                        
                                       <td style="padding-left: 10px;"><?php
                                        include"konek.php";

     $entries2=3;
    $query=mysql_query("select * from petugas"); //input
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
        <a href="home.php?con=6&nip=<?php echo ($pages-1); ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900" title="pilih untuk melihat halaman <?php echo $pages;?>"><?php echo $pages; ?></a>
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
                        <th>Nip</th>
                        <th>nama</th>
                         <th>Tempat Lahir</th>
                         <th>Tanggal lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Lokasi</th>
                                    </tr>
                                  </thead>
                                  <tbody >
                             <?php
                             $i=0;
                             $page=$_REQUEST['nip'];
                             $offset=$page*$entries2;
                       $sql=mysql_query("select * from petugas order by nip desc limit $offset,$entries2");
                           if (mysql_num_rows($sql)>0) { 
                        while($rws1=  mysql_fetch_assoc($sql)){
                             echo "<tr><td><input type='checkbox' title='Klik untuk memilih Data'  name='hapus[]' value=".$rws1[nip];
                            echo " /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='home.php?con=7&ferdi=".$rws1[nip]."' title='Edit Data Petugas'><img src='../edit.png'></a></td>";
                            echo "<td>".$rws1['nip']."</td>";
                             echo "<td>".$rws1['nama_petugas']."</td>";
                            echo "<td>".$rws1['tempat_lahir']."</td>";
                            echo "<td>".$rws1['tgllahir']."</td>";
                             echo "<td>".$rws1['jk']."</td>";
                            echo "<td>".$rws1['email']."</td>";
                            echo "<td>".$rws1['password']."</td>";
                            echo "<td>".$rws1['lokasi']."</td>";    
                          }  
                          $i++; 
                           echo "</tr>";
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