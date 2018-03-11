@extends('layouts.app')

@section('content')
<?php

echo "<link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css'>";
echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src'https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>";

echo "<script>

	$(document).ready(function(){
		$(document).ready(function(){
    $('#myTable').DataTable();
});
		$.ajax({
			type: 'GET',
			headers:{
				'Content-Type': 'application/json',
				'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg0NmY2OGNmMDY5ZGNkMDY1ZmQxZDY2MzhmMjViMDVkZDcwMTI3YWQ2ZjIyYzYwNjQ3NWE2YzU1ZDI5MDc2NjU1NmUzOWNkMjAxNjUwZDNhIn0.eyJhdWQiOiIzIiwianRpIjoiODQ2ZjY4Y2YwNjlkY2QwNjVmZDFkNjYzOGYyNWIwNWRkNzAxMjdhZDZmMjJjNjA2NDc1YTZjNTVkMjkwNzY2NTU2ZTM5Y2QyMDE2NTBkM2EiLCJpYXQiOjE1MjA2ODcwMjEsIm5iZiI6MTUyMDY4NzAyMSwiZXhwIjoxNTUyMjIzMDIxLCJzdWIiOiI1MSIsInNjb3BlcyI6WyJQcm92aW5zaSIsIkthYnVwYXRlblwvS290YSIsIktlY2FtYXRhbiIsIktlbHVyYWhhbiIsIlNla29sYWgiLCJNb25vZ3JhZmkiLCJETEgiLCJUZW5hbnQiXX0.oeVG010S4yfK6Wjl1J04r22C638ehug98wA0kN9ZcNK8EIfSyM802jbcBWe-cFgktXLaeEYjL5HuSEssceBoqtKXQd8NX1kA85bbTxNvZEo8Dm45Flj4GLZ0jIqOWVzBSqjWscBdgA0CnjLv-GU0tzvE-_2v0kuUWqpxouOsCAtmuNkCsWi5ebbiMVVN8_RM9JG1VO_L9E19FEoJBBVgzvw9unDUxLWSvuKTf0ZpSdvKiFlmEzAfdnd1AO9Fu3EbgMw345DUYybjUpRJBjPDZihoB-b4SAhpxxD-lQ8OYqCq8F4oCwXhgQamSqhUPfvAnHThDDkQISVlad00C_A28kdpahK3fWwGbuZn22Y_ZHUwwHmp1YXvhJLiM_DeMFRhaaVTyqLkQJnvxbAEb7kAQRVCNTlV9xUNN4xzq3wsbIp50iWctiMaI1p7z_7wRgbtZ-Wy5tqz0q2CSTOQuSmjwxdhAAqad6hmegljlfQgjaCPeEvyC8eqV-25rwZ3HWz3L4fFnNGOGaxAPo64RSNRLEhF4Z2X0ULSpydf1GP-wH2DtldfbFC4meYjdTuEdCpxobTnXXbaoactUDlbkeC_AIjy9N_6yZ8mXY7ywWgEJIzd5Ij4nr4jet9-VzpTBcLUQ-ExU11ksQfkENTdUR6WFdqji6dQ1qIk8mHspYCYMXg'
			},
			url: 'http://api.samarindakota.go.id/api/v1/citra-niaga/tenant',
			success: function(data){
				document.write(JSON.stringify(data))
			},
			error: function(){
				document.write('error')
			}
		})
	})
</script>
";
?>

<table class="table" id="myTable">
	<thead>
		<th>Nama</th>
		<th>Pemilik</th>
		<th>Telepon</th>
		<th>Nomor</th>
		<th>Blok</th>
		<th>Jenis</th>
		<th>Jenis Usaha</th>
	</thead>
	<tbody>
		<tr>
			<td></td>
		</tr>
	</tbody>
</table>

@endsection