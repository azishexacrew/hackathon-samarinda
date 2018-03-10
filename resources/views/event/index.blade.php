@extends('_layouts.default')

@section('tubuh')
  <div class="container-fluid">
    <div class="row">
      <div class="panel panel-default">
			  <div class="panel-heading text-center">
			      <div class="h2">
              Daftar Event
            </div>
        </div>
			</div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-sm-offset-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($event as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
