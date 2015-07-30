@if(Session::has('errors'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong>
            @foreach($errors->all() as $error)
                <p>{{ $error  }}</p>
            @endforeach
    </div>
@endif