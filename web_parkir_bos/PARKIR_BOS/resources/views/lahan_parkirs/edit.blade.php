@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lahan Parkir
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lahanParkir, ['route' => ['lahanParkirs.update', $lahanParkir->id], 'method' => 'patch']) !!}

                        @include('lahan_parkirs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection