@extends('layouts.index')

@section('content')
    <h1>{!! trans('register.title') !!}</h1>
    {!! Form::open(['url' => '/auth/register', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'registerForm']) !!}
    <div class="form-group{!! ($errors && $errors->has('first_name')) ? ' has-error' : '' !!}">
        {!! Form::label('user_type', trans('register.user_type.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <div class="radio">
                <label for="userTypePersonal" style="margin-right: 20px">
                    {!! Form::radio('user_type', 'personal', old('user_type', 'personal') == 'personal' ? true : false, ['id' => 'userTypePersonal']) !!}
                    {!! trans('register.user_type.personal') !!}
                </label>
                <label for="userTypeCompany">
                    {!! Form::radio('user_type', 'company', old('user_type', 'personal') == 'company' ? true : false, ['id' => 'userTypeCompany']) !!}
                    {!! trans('register.user_type.company') !!}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('first_name')) ? ' has-error' : '' !!}">
        {!! Form::label('first_name', trans('register.first_name.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-user fa-fw"></i>
            {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => trans('register.first_name.label'), 'required' => 'required']) !!}
            {!! Form::errorMessage('first_name') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('last_name')) ? ' has-error' : '' !!}">
        {!! Form::label('last_name', trans('register.last_name.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-user fa-fw"></i>
            {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => trans('register.last_name.label'), 'required' => 'required']) !!}
            {!! Form::errorMessage('last_name') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('company_name')) ? ' has-error' : '' !!}">
        {!! Form::label('last_name', trans('register.company_name.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-user fa-fw"></i>
            {!! Form::text('company_name', old('company_name'), ['class' => 'form-control', 'placeholder' => trans('register.company_name.label'), 'required' => 'required']) !!}
            {!! Form::errorMessage('company_name') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('email')) ? ' has-error' : '' !!}">
        {!! Form::label('email', trans('register.email.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-envelope fa-fw"></i>
            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('register.email.label'), 'required' => 'required']) !!}
            {!! Form::errorMessage('email') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('password')) ? ' has-error' : '' !!}">
        {!! Form::label('password', trans('register.password.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-key fa-fw"></i>
            {!! Form::input('password', 'password', old('password'), ['class' => 'form-control', 'placeholder' => trans('register.password.label'), 'required' => 'required']) !!}
            {!! Form::errorMessage('password') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('password_confirmation')) ? ' has-error' : '' !!}">
        {!! Form::label('password_confirmation', trans('register.password_confirmation.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-key fa-fw"></i>
            {!! Form::input('password', 'password_confirmation', old('password_confirmation'), ['class' => 'form-control', 'placeholder' => trans('register.password_confirmation.label'), 'required' => 'required']) !!}
            {!! Form::errorMessage('password_confirmation') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('state')) ? ' has-error' : '' !!}">
        {!! Form::label('state', trans('register.state.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-globe fa-fw"></i>
            {!! Form::select('state', $states, old('state'), ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
            {!! Form::errorMessage('state') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('region')) ? ' has-error' : '' !!}">
        {!! Form::label('region', trans('register.region.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-map-marker fa-fw"></i>
            {!! Form::select('region', $regions, old('state'), ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
            {!! Form::errorMessage('region') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('cities')) ? ' has-error' : '' !!}">
        {!! Form::label('city', trans('register.city.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-map-pin fa-fw"></i>
            {!! Form::select('city', $cities, old('city'), ['class' => 'form-control', 'required' => 'required']) !!}
            {!! Form::errorMessage('city') !!}
        </div>
    </div>
    <div class="form-group fa-iconed{!! ($errors && $errors->has('mobile')) ? ' has-error' : '' !!}">
        {!! Form::label('mobile', trans('register.mobile.label'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
            <i class="fa fa-map-mobile fa-fw"></i>
            {!! Form::input('tel', 'mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => trans('register.mobile.label'), 'required' => 'required']) !!}
            {!! Form::errorMessage('mobile') !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="checkbox">
                <label for="accept_terms">
                    {!! Form::checkbox('accept_terms', 1, old('accept_terms', 1)) !!}
                    {!! trans('register.agree', ['url' => '/terms-and-conditions']) !!}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            {!! Form::submit(trans('register.submit'), ['class' => 'btn btn-primary btn-lg']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection
