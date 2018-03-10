@extends('_layouts.basic')

@section('content')
  <main class="py-4">
    <div class="col-md-12">
      <div class="container m-t-80">
        <div class="card w-100">
          <div class="card-body text-center">
            <h3 class="card-title">Verifikasi Tenant</h3>
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg" placeholder="Cari Data Tenant" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary " type="button"><i class="fa fa-search fa-fw"></i> Cari</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
