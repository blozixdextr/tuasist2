@extends('layouts.index')

@section('content')

    @include('includes.alerts')
    <form class="form-horizontal" role="form" action="/auth/register" method="post">

        {!! csrf_field() !!}
        <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-9">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="First Name" />                                    </div>
        </div>
        <div class="form-group">
            <label for="last_name" class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-9">
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" />                                    </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input required="required" type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />                                    </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input required="required" type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" />                                    </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password</label>
            <div class="col-sm-9">
                <input required="required" type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" />                                    </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <div class="checkbox">
                    <label for="accept_terms">
                        {!! Form::checkbox('accept_terms', 'true', old('accept_terms', true)) !!} I Accept All The <a href="/terms" class="skin-text">Terms And Services</a>.
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
            </div>
        </div>

    </form>
@endsection
