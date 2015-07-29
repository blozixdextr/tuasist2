@extends('layouts.index')

@section('content')

    <form class="form-horizontal" role="form" action="/auth/login" method="post">
        @include('includes.alerts')
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" />                                    </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" />                                    </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <div class="checkbox">
                    <label for="remember">
                        {!! Form::checkbox('remember', 'true', old('remember', true)) !!} Remember Me.
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-block btn-primary">Sign In</button>
            </div>
        </div>

    </form>
    <a href="/auth/register" class="btn btn-green">Sign up today</a>
    <a class="btn btn-default" href="/auth/facebook">Sign in with facebook</a>
@endsection
