@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset ('mysetting/css/admin-template.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">USer Dashboard</div>
                <div class="card-body">
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
