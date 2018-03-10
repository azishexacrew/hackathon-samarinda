@if($errors->count())
<div class="alert alert-danger">
    <ul class="pull-left">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="clearfix"></div>
</div>
@endif
