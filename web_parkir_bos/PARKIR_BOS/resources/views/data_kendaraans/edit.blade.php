@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Kendaraan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataKendaraan, ['route' => ['dataKendaraans.update', $dataKendaraan->id], 'method' => 'patch']) !!}

                        @include('data_kendaraans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection