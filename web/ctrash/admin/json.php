<?php
echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>";
echo "
<script>
	$(document).ready(function(){
	$.ajax({
		type : 'GET',
		headers: {
			'Content-Type': 'application/json',
			'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY5OWU3MWZlZjgzN2E4NmJmMThhYWE5YmU1NDQxNzZhODVmYjI3ZDY4YjFkN2U0OThhMjljNWUxMjZlNTNkOTNhNzc5OWZlY2YxNWNhMDI5In0.eyJhdWQiOiIzIiwianRpIjoiNjk5ZTcxZmVmODM3YTg2YmYxOGFhYTliZTU0NDE3NmE4NWZiMjdkNjhiMWQ3ZTQ5OGEyOWM1ZTEyNmU1M2Q5M2E3Nzk5ZmVjZjE1Y2EwMjkiLCJpYXQiOjE1MjA3MjY1NjYsIm5iZiI6MTUyMDcyNjU2NiwiZXhwIjoxNTUyMjYyNTY2LCJzdWIiOiI5NSIsInNjb3BlcyI6WyJQcm92aW5zaSIsIkthYnVwYXRlblwvS290YSIsIktlY2FtYXRhbiIsIktlbHVyYWhhbiJdfQ.f5Iud7QO57n5_mZPRHM-tBuINkKaHKqToN3sHB6mPqh8u9NaSDdFT4xhtKDmcwapntZ3nWGMywRXJm1anOsAFDXA0zOyh7D8Q_DpV75aHuMGIIJHWpJowJ0eOCe2t0g2fjaQHgS7t9Q2LWiJlxz2-tYgOj6ld8xg2NL_OtuEgqksu5rOqaLc04skTHPGv89R97kbCvm4Dhk9bqy4TdjuI4AyjUF5ChFhh9I-g5q7CQhjjPmYBiK5ujwYk0_5OOYzD7CjU_Fgfa8vAMPyM4RojtSABjIO9Tjaxs0hZEV-pJRdg1ETEfOmlLJBQPnFjlS3eQDcTaLVMY4eT5isWhzBeGMhu7qVLJDA0gdvs858c959-gGXDNI0v9JxjoFNC2P9dklo7pKu5LAZgmbNJKLSkltShvI5XOewK6yQ3pbZs_7OXQz6U7kdwxWzCtggtadSwI9UmXZcbiSMmBLeCWJo-RxVryHVXsIKLFhHFOYan6CQIa6-Y1hEN5gcol7cSGwd8Qhe180RajrJCWfvUi4wtQri2M7iSyDR36qU59jHTy6ADRfkqunsOmLvhXFLhm_W_L5i3QSA0ilsI7jiD5juSnCWB4cE2db2OLMb70I4gPggo_XGYx94-pILHhuVfhKDFUcM753eCSFJkbQForPtF3W2ciabSRWt3cqPOMnJAWg'
			
			},
			url: 'http://api.samarindakota.go.id/api/v1/kecamatan?idKota=6472',
			success: function(data){
				document.write(JSON.stringify(data))
				},
			error : function(){
				document.write('error')
			}
		})
	});
	</script>";
?>