@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lahan Parkir
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('lahan_parkirs.show_fields')
                    <a href="{!! route('lahanParkirs.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
