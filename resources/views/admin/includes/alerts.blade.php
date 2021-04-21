@if($errors->any())warning
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif


@if(session('message'))
    <div class="alert alert-default-success">
        <p>{{session('message')}}</p>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-default-info">
        <p>{{session('info')}}</p>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-default-danger">
        <p>{{session('error')}}</p>
    </div>
@endif
