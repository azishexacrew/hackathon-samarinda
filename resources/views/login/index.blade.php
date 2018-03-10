@extends('_layouts.default')

@section('tubuh')
<div class="container-fluid" id="#body">
		<div class="row">
			<form action="{{route('loginn.store')}}" method="post">
				{{ csrf_field() }}
			<div class="panel panel-default">
			  <div class="panel-heading text-center">
			  <div class="h2">Masuk</div>
			</div>
			<div class="panel-body">
				<div class="row">
					@if ($errors->all())
						<div class="alert alert-dismissible alert-danger col-sm-offset-3 col-sm-6">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Login Gagal
						</div>
					@elseif(session()->get('note') == 'berhasil')
						<div class="alert alert-dismissible alert-success col-sm-offset-3 col-sm-6">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Login Berhasil
						</div>
					@endif
				</div>

				<div class="row">
					<div class="form-group col-sm-4 col-sm-offset-4 text-center" id="user-icon">
					<i class="fas fa-user fa-5x"></i>
					</div>
			  		<div class="form-group col-sm-offset-4 col-sm-4">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="nama" required="">
					</div>

					<div class="form-group col-sm-offset-4 col-sm-4">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" required="">
					</div>
					<div class="form-group col-xs-offset-7 col-xs-1">
						<button type="submit" class="btn btn-success" name="submit"><i class="fas fa-key"></i>Login</1button>
					</div>
				</div>
			</div>
			</form>
		</div>
</div>
@endsection
