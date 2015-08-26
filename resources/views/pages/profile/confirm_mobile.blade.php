@extends('layouts.inside')

@section('content')
    <h1>{{ trans('profile.my.confirm.sms.title') }}</h1>
    <p>{{ trans('profile.my.confirm.sms.description', ['mobile' => $mobile]) }}</p>
    {!! Form::open(['url' => '/profile/confirm/mobile/end', 'action' => 'post', 'class' => 'form-inline']) !!}
    <div class="form-group">
        {!! Form::label(trans('profile.my.confirm.sms.label')) !!}
        {!! Form::text('token', '', ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit(trans('general.save'), ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
    {!! Form::errorMessage('token') !!}
@endsection