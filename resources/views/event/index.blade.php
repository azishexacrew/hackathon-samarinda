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
      <div class="col-sm-5 col-sm-offset-4" align="center">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama</th>
              <th width="10">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($event as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama}}</td>
                <td><a href="{{route('event.edit',$item->id)}}" class="btn btn-info btn-sm" style="margin-top:0px">Detail</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
