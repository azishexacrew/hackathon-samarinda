@extends('_layouts.default-register')

@section('tubuh')
<div class="container-fluid">
		<div class="row">
			<form action="{{route('registerr.store')}}" method="post">
				{{ csrf_field() }}
			<div class="panel panel-default">
			  <div class="panel-heading text-center">
			  <div class="h2">Buat Akun</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="alert alert-dismissible alert-danger col-sm-offset-3 col-sm-6">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Pendaftaran Gagal
					</div>
					<div class="alert alert-dismissible alert-success col-sm-offset-3 col-sm-6">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Pendaftaran Berhasil
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4 col-sm-offset-4 text-center" id="user-icon">
					<i class="fas fa-user fa-5x"></i>
					</div>
					<div class="col-sm-6">
			  	<div class="form-group col-sm-offset-7 col-sm-5">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" required="">
				</div>
				<div class="form-group col-sm-offset-7 col-sm-5">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" required="">
				</div>
				<div class="form-group col-sm-offset-7 col-sm-5">
					<label for="name">Nama</label>
					<input type="text" class="form-control" name="name" required="">
				</div>
				<div class="form-group col-sm-offset-7 col-sm-5">
					<label for="jk">Jenis Kelamin</label>
					<select class="form-control">
						<option value="pria">Pria</option>
						<option value="wanita">Wanita</option>
					</select>
				</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group col-sm-5">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" name="phone" required="">
						</div>
						<div class="col-sm-8"></div>
						<div class="form-group col-sm-5">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" name="alamat" required="">
						</div>
						<div class="col-sm-8"></div>
					  	<div class="form-group col-sm-5">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" required="">
						</div>
						<div class="col-sm-8"></div>
						<div class="form-group col-sm-5">
							<button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check"></i>Submit</button>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
</div>
@endsection
