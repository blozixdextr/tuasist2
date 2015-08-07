@extends('layouts.register')

@section('content')
    <div id="registerFormWrap" style="max-width: 600px; margin: 0 auto">
        <h1>{!! trans('auth.title') !!}</h1>
        @include('includes.errors')
        {!! Form::open(['url' => '/auth/login', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'registerForm']) !!}
        <div class="form-group fa-iconed{!! ($errors && $errors->has('email')) ? ' has-error' : '' !!}">
            {!! Form::label('email', trans('register.email.label'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                <i class="fa fa-envelope fa-fw"></i>
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('register.email.placeholder'), 'required' => 'required']) !!}
                {!! Form::errorMessage('email') !!}
            </div>
        </div>
        <div class="form-group fa-iconed{!! ($errors && $errors->has('password')) ? ' has-error' : '' !!}">
            {!! Form::label('password', trans('register.password.label'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                <i class="fa fa-key fa-fw"></i>
                {!! Form::input('password', 'password', old('password'), ['class' => 'form-control', 'placeholder' => trans('register.password.placeholder'), 'required' => 'required']) !!}
                {!! Form::errorMessage('password') !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <div class="checkbox">
                    <label for="accept_terms">
                        {!! Form::checkbox('remember', 1, old('remember', true)) !!}
                        {!! trans('auth.remember_me.label') !!}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit(trans('auth.submit'), ['class' => 'btn btn-success btn-lg']) !!}
                {{ trans('general.or') }} <a href="/auth/facebook" class="btn btn-primary"><i class="fa fa-facebook"></i> {{ trans('auth.facebook.login') }}</a>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <p>{{ trans('auth.no_account') }} <a href="/register">{{ trans('auth.register_now') }}</a></p>
            </div>
        </div>

        {!! Form::close() !!}

        </div>

@endsection
