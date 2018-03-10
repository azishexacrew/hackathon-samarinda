$(document).ready(function(){
	var DOMAIN = "http://localhost/API";
	var id = $("#userid").val()
	// Form Register
	$(document).on('submit', '#form-register', function(event){
		event.preventDefault();
		
		var email = $('#email_r').val();
		var nama = $('#nama_r').val();
		var pass = $('#password_r').val();
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

		if(!e_patt.test(email)){
			swal("Error","Email harus sesuai dengan format", "error");
			return false;
		}
		if(email != '' && pass != '' && nama != '')
		{
			$.ajax({
				url: DOMAIN+"/core/proses.php",
				method :'POST',
				data :new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					if(data == 1){
						$("#form-register")[0].reset();
						swal("Berhasil", "Selamat anda telah terdaftar", "success");
					}else{
						swal("Ups!", "Maaf ada kesalahan sistem :(", "error");
					}
					console.log(data);
				}
			});
		}
		else
		{
			swal("Error!", "Form foto tidak boleh kosong", "error");
			return false;
		}

	});

	// Form Login
	$(document).on('submit', '#form-login', function(event){
		event.preventDefault();
		
		var email = $('#form-email').val();
		var pass = $('#form-password').val();
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

		if(!e_patt.test(email)){
			swal("Error","Email harus sesuai dengan format", "error");
			return false;
		}
		if(email != '' && pass != '')
		{
			$.ajax({
				url: DOMAIN+"/core/proses.php",
				method :'POST',
				data :new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					if(data == "petugas"){
						window.location.href = encodeURI(DOMAIN+"/petugas/dashboard.php");
					}
					else if(data == "anggota"){
						window.location.href = encodeURI(DOMAIN+"/anggota/dashboard.php");
					}
					else if(data == "admin"){
						window.location.href = encodeURI(DOMAIN+"/admin/dashboard.php");
					}
					else if(data == 0){
						swal("Ups!", "Periksa kembali identitas diri anda", "info");
					}else{
						swal("Ups!", "Maaf ada kesalahan sistem!", "error");
					}
				}
			});
		}
		else
		{
			swal("Error!", "Form foto tidak boleh kosong", "error");
			return false;
		}

	});
});