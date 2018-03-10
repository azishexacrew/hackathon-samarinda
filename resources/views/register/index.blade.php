@extends('_layouts.default-register')

@section('tubuh')
<div class="container-fluid text-center">
		<div class="row"> 
			<form>
			<div class="panel panel-default">
			  <div class="panel-heading">
			  <div class="h2">Buat Akun</div>
			</div>
			<div class="panel-body">	
				<div class="form-group col-sm-4 col-sm-offset-4" id="user-icon">
					<i class="fas fa-user fa-5x"></i>
				</div>
			  	<div class="form-group col-sm-offset-4 col-sm-4">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" required="">
				</div>
			  	<div class="form-group col-sm-offset-4 col-sm-4">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" required="">
				</div>
				<div class="form-group col-sm-offset-4 col-sm-4">

					<button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check"></i>Submit</button>
				</div>
			</div>
			</form>
		</div>
</div>
@endsection