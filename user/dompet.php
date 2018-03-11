
<div class="panel panel-primary">
                <div class="panel-heading"><h1>Dompet Sampah</h1></div>
                <div class="panel-body">

			  <!-- Table -->
			  <table class="table table-bordered">
			    <tr>
			    	<th>No</th>
			    	<th>E-Tiket</th>
			    	<th>Jenis Sampah</th>
			    	<th>Keterangan</th>

			    	<th>Berat Sampah</th>
			    	<th>Pendapatan</th>
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
			    	<td><?php echo $td['ket']; ?></td>			    	
			    	<td><?php echo $td['berat']; ?></td>
			    	<td>
			    		<?php 
			    			$hasil = $td['berat'] * $td['harga_kat'];
			    			echo "Rp. ".number_format($hasil, 0,',', '.');
			    		?>
			    			
			    	</td>
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

