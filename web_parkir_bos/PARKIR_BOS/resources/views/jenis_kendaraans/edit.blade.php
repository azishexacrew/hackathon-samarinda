@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jenis Kendaraan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jenisKendaraan, ['route' => ['jenisKendaraans.update', $jenisKendaraan->id], 'method' => 'patch']) !!}

                        @include('jenis_kendaraans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection