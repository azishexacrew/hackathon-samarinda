$(document).ready(function(){
	var DOMAIN = "http://localhost/API";
	var id = $("#userid").val()

	tabungan();
	function tabungan(){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {tabungan : 1, id : id},
			success : function(data){
				$("#get-tabungan").html(data);
			}
		})
	}

	tombolTambahTabungan();
	function tombolTambahTabungan(){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {tombolTambahTabungan : 1, id:id},
			success : function(data){
				$("#tombol-tambah-tabungan").html(data);
			}
		})
	}

	// add button
	$("body").delegate("#tambah_tabungan", "click", function(){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {tambah_tabungan : 1, id:id},
			success : function(data){
				if(data == 1){
					tombolTambahTabungan();
					swal("Berhasil", "Selamat anda sekarang mempunyai buku tabungan", "success");
				}else{
					swal("Ups!", "Sepertinya ada yang salah dengan sistem kami", "error");
				}
			}
		})
	})

	// pegawai
	pegawai(1);
	function pegawai(pn){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {pegawai : 1, pageno : pn},
			success : function(data){
				$("#get-pegawai").html(data);
			}
		})
	}

	// Halaman pegawai
	$("body").delegate(".page-link", "click", function(){
		var pn = $(this).attr("pn");
		pegawai(pn);
	})

	$(document).on('submit', '#form-pegawai', function(event){
		event.preventDefault();
		
		var name = $('#username_pegawai').val();
		var pass = $('#password_pegawai').val();
		var addr = $('#address_pegawai').val();
		var phone = $('#phone_pegawai').val();
		var sex = $('#sex_pegawai').val();
		var number_format = new RegExp(/^[0-9]$/);

		if(name != '' && pass != '' && addr != '' && phone != '')
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
						$("#form-pegawai")[0].reset();
						$("#tambah-pegawai").modal("hide");
						swal("Berhasil", "Selamat anda telah terdaftar", "success");
						pegawai(1);
					}else{
						swal("Ups!", "Maaf ada kesalahan sistem :(", "error");
					}
					//console.log(data);
				}
			});
		}
		else
		{
			swal("Error!", "Form foto tidak boleh kosong", "error");
			return false;
		}

	});

	$("body").delegate(".edit-pegawai", "click", function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method	: "POST",
			datatype: "json",
			data 	: {editPegawai : 1, id : eid},
			success : function(data){
				var data = JSON.parse(data);
				$("input[name*='idPegawai']").val(data.id_user);
				$("#edit_username_pegawai").val(data.username);
				$("#edit_address_pegawai").val(data.alamat);
				$("#edit_phone_pegawai").val(data.no_hp);
				$("#edit_sex_pegawai").append($('<option>').text(data.jenis_kelamin).attr('value', data.jenis_kelamin));
				$("#edit-pegawai").modal("show");
			}
		})
	})	

	$(document).on('submit', '#form-update-pegawai', function(event){
		event.preventDefault();
		var name = $('#edit_username_pegawai').val();
		var pass = $('#edit_password_pegawai').val();
		var addr = $('#edit_address_pegawai').val();
		var phone = $('#edit_phone_pegawai').val();
		var sex = $('#edit_sex_pegawai').val();

		if(name != '' && pass != '' && addr != '' && phone != '')
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
						$("#form-update-pegawai")[0].reset();
						$("#edit-pegawai").modal("hide");
						swal("Berhasil", "Selamat anda telah terdaftar", "success");
						pegawai(1);
					}else{
						swal("Ups!", "Maaf ada kesalahan sistem :(", "error");
					}
					//console.log(data);
				}
			});
		}
		else
		{
			swal("Error!", "Form foto tidak boleh kosong", "error");
			return false;
		}

	});

	$("body").delegate(".delete-pegawai", "click", function(){
		var did = $(this).attr("did");
		swal({
			title: "Hapus data?",
			text: "Data tidak akan bisa dikembalikan lagi!",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya, Hapus aja!",
			cancelButtonText: "Tidak, Batalkan!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					url : DOMAIN+"/core/proses.php",
					method	: "POST",
					data 	: {deletePegawai : 1, id : did},
					success : function(data){
						if(data == 1){
							swal("Berhasil", "Data telah di hapus", "success");
							pegawai(1);
						}else if(data == 0){
							swal("Ups", "Data gagal di hapus", "error");

						}else{
							swal("Ups", "Sistem ada kesalahan", "error");
						}
					}
				})			
			} else {
				swal("Dibatalkan", "File masih aman :)", "info");
			}
		});	

	})

	// anggota
	anggota(1);
	function anggota(pn){
		$.ajax({
			url : DOMAIN+"/core/manage_pegawai/proses.php",
			method : "POST",
			data : {anggota : 1, pageno : pn},
			success : function(data){
				$("#get-anggota").html(data);
			}
		})
	}

	// Halaman pegawai
	$("body").delegate(".page-link", "click", function(){
		var pn = $(this).attr("pn");
		anggota(pn);
	})

	$(document).on('submit', '#form-anggota', function(event){
		event.preventDefault();
		
		var name = $('#username_anggota').val();
		var pass = $('#password_anggota').val();
		var addr = $('#address_anggota').val();
		var phone = $('#phone_anggota').val();
		var sex = $('#sex_anggota').val();
		var number_format = new RegExp(/^[0-9]$/);

		if(name != '' && pass != '' && addr != '' && phone != '')
		{
			$.ajax({
				url: DOMAIN+"/core/manage_pegawai/proses.php",
				method :'POST',
				data :new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					if(data == 1){
						$("#form-anggota")[0].reset();
						$("#tambah-anggota").modal("hide");
						swal("Berhasil", "Selamat anda telah terdaftar", "success");
						anggota(1);
					}else{
						swal("Ups!", "Maaf ada kesalahan sistem :(", "error");
					}
					//console.log(data);
				}
			});
		}
		else
		{
			swal("Error!", "Form foto tidak boleh kosong", "error");
			return false;
		}

	});

	$("body").delegate(".edit-anggota", "click", function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/core/manage_pegawai/proses.php",
			method	: "POST",
			datatype: "json",
			data 	: {editAnggota : 1, id : eid},
			success : function(data){
				var data = JSON.parse(data);
				$("input[name*='idAnggota']").val(data.id_user);
				$("#edit_username_anggota").val(data.username);
				$("#edit_address_anggota").val(data.alamat);
				$("#edit_phone_anggota").val(data.no_hp);
				$("#edit_sex_anggota").append($('<option>').text(data.jenis_kelamin).attr('value', data.jenis_kelamin));
				$("#edit-anggota").modal("show");
			}
		})
	})	

	$(document).on('submit', '#form-update-anggota', function(event){
		event.preventDefault();
		var name = $('#edit_username_anggota').val();
		var pass = $('#edit_password_anggota').val();
		var addr = $('#edit_address_anggota').val();
		var phone = $('#edit_phone_anggota').val();
		var sex = $('#edit_sex_anggota').val();

		if(name != '' && pass != '' && addr != '' && phone != '')
		{
			$.ajax({
				url: DOMAIN+"/core/manage_pegawai/proses.php",
				method :'POST',
				data :new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					if(data == 1){
						$("#form-update-anggota")[0].reset();
						$("#edit-anggota").modal("hide");
						swal("Berhasil", "Selamat anda telah terdaftar", "success");
						anggota(1);
					}else{
						swal("Ups!", "Maaf ada kesalahan sistem :(", "error");
					}
					//console.log(data);
				}
			});
		}
		else
		{
			swal("Error!", "Form foto tidak boleh kosong", "error");
			return false;
		}

	});

	$("body").delegate(".delete-anggota", "click", function(){
		var did = $(this).attr("did");
		swal({
			title: "Hapus data?",
			text: "Data tidak akan bisa dikembalikan lagi!",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya, Hapus aja!",
			cancelButtonText: "Tidak, Batalkan!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					url : DOMAIN+"/core/manage_pegawai/proses.php",
					method	: "POST",
					data 	: {deleteAnggota : 1, id : did},
					success : function(data){
						if(data == 1){
							swal("Berhasil", "Data telah di hapus", "success");
							anggota(1);
						}else if(data == 0){
							swal("Ups", "Data gagal di hapus", "error");

						}else{
							swal("Ups", "Sistem ada kesalahan", "error");
						}
					}
				})			
			} else {
				swal("Dibatalkan", "File masih aman :)", "info");
			}
		});	

	})


	// Pesan
	// Coun notif 
	count_notif();
	function count_notif(){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {count_notif : 1},
			success : function(data){
				$("#count-notif").html(data);
				//alert(data);
			}
		})
	}

	$(document).on('submit', '#form-pesan', function(event){
		event.preventDefault();
		
		var tanggal = $('#tanggal_pesan').val();
		var isi_pesan = $('#isi_pesan').val();
		
		if(isi_pesan != '')
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
						$("#isi_pesan").val("");
						$("#modal-pesan").modal("hide");
						swal("Berhasil", "Pesan telah terkirim silahkan nunggu", "success");
						
					}else{
						swal("Ups!", "Maaf ada kesalahan sistem :(", "error");
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

	list_pesan();
	function list_pesan(){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {list_pesan : 1},
			success : function(data){
				$("#list-pesan").html(data);
				//alert(data);
			}
		})
	}

	function flag_pesan(mid){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {flag_pesan : 1, id : mid}
		})
	}

	$("body").delegate(".baca-pesan", "click", function(){
		var mid = $(this).attr("mid");
		flag_pesan(mid);
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method	: "POST",
			datatype: "json",
			data 	: {baca_pesan : 1, id : mid},
			success : function(data){
				var data = JSON.parse(data);
				$("#nama-pengirim").html(data.username);
				$("#isi-pesan-pengirim").html(data.is_pesan);
				$("#lihat-pesan").modal("show");
				
			}
		})
	})

	setInterval(function(){
		count_notif();   
		list_pesan();
	}, 5000); 
	
	kotak_pesan();
	function kotak_pesan(){
		$.ajax({
			url : DOMAIN+"/core/proses.php",
			method : "POST",
			data : {kotak_pesan : 1},
			success : function(data){
				$("#kotak_pesan").html(data);
				//alert(data);
			}
		})
	}
	
})