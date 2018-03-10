@extends('_layouts.default')

@section('tubuh')
<div class="container-fluid" id="body">
		<div class="row">
			<form action="{{route('registerr.store')}}" method="post">
				{{ csrf_field() }}
			<div class="panel panel-default">
			  <div class="panel-heading text-center">
			  <div class="h2">Pengaturan</div>
			</div>
			<div class="panel-body">
				<div class="row">
					@if ($errors->all())
						<div class="alert alert-dismissible alert-danger col-sm-offset-3 col-sm-6">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Pendaftaran Gagal
						</div>

					@elseif(session()->get('note') == 'berhasil')
						<div class="alert alert-dismissible alert-success col-sm-offset-3 col-sm-6">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Pendaftaran Berhasil
						</div>
					@endif
				</div>

				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
            <div class="form-group">
              <label for="" class="control-label">Username</label>
              <input type="text" class="form-control" name="" value="">
            </div>
          </div>
				</div>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <div class="form-group">
              <label for="">Password</label>
              <input type="text" class="form-control" name="" value="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <div class="form-group">
              <label for="">Re-Password</label>
              <input type="text" class="form-control" name="" value="">
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-sm-8 text-right">
            <button type="submit" class="btn btn-md btn-success" name="kirim">Kirim</button>
          </div>
        </div>

			</div>
			</form>
		</div>
</div>
@endsection
