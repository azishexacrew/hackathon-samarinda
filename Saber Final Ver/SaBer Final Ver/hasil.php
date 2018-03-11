<?php 
require "functions.php";
$lapor = query("SELECT * FROM lapor");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Laporan</title>
</head>
<body>
	<h1>
		<table border="1" cellpadding="10" cellspacing="0"> 
			<tr>
				<th>No</th>
				<th>Status</th>
				<th>Permasalahan</th>
				<th>Deskripsi</th>
				<th>Lokasi</th>
				<th>Aksi</th>
			</tr>
			<?php $i=1; ?>
			<?php foreach($lapor as $row): ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<input type="checkbox" name="checkbox">
				</td>
				<td><?= $row["permasalahan"];  ?></td>
				<td><?= $row["deskripsi"];  ?></td>
				<td><?= $row["lokasi"];  ?></td>
				<td>
					<a href="hapus.php?id= <?= $row["id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>

		</table>
	</h1>
</body>
</html>