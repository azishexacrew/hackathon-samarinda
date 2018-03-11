
<?php include 'header.php' ?>
<?php 
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

 ?>
<div class="container">
  <div class="row">
    <div class="col-md-7 col-md-offset-3" style="margin-top: 30px">
      <h2 class="text-center">Dompet</h2>
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Daftar Sampah</div>

        <!-- Table -->
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>E-Tiket</th>
            <th>Jenis Sampah</th>
            <th>Berat Sampah</th>
            <th>Status</th>
          </tr>

<?php
$no=0;
$s_sampah = "SELECT * FROM data_sampah,kategori, user WHERE data_sampah.id_kat=kategori.id_kat AND user.id_user = $id AND data_sampah.id_user = $id";
$q_sampah = mysqli_query($conn,$s_sampah);
while ($td = mysqli_fetch_assoc($q_sampah)){
$no++;
?>

          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $td['etiket']; ?></td>
            <td><?php echo $td['nama_kat']; ?></td>
            <td><?php echo $td['berat']; ?></td>
            <td><?php 
            $st=$td['status']; 

            if($st==0){
              echo "<button class='btn btn-danger btn-sm'>Tunda</button>";              
            }else{
              echo "<button class='btn btn-primary btn-sm'>Diterima</button>";
            }
            ?></td>
          </tr>
<?php
}
?>
        </table>
      </div>
    </div>
  </div>
</div>  

<?php include 'footer.php' ?>