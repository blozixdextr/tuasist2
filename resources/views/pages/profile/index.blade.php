@extends('layouts.inside')

@section('content')
    <div class="page-header">
        <h1>{{ trans('profile.title') }}</h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('profile.my.user.title') }}</div>
                <div class="panel-body">
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('profile.my.tasks.title') }}</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('profile.my.proof.title') }}</div>
                <div class="panel-body">
                    <p>{{ trans('profile.my.proof.description') }}</p>
                    <p>
                        {{ trans('profile.my.proof.email') }} {{ $user->email }}
                        @if ($user->profile->confirmed_email)
                            <span class="text-success">{{ trans('profile.my.proof.status.confirmed') }}</span>
                        @else
                            <span class="text-danger">{{ trans('profile.my.proof.status.unconfirmed') }}</span>
                            <a href="/profile/confirm/email" class="btn btn-success btn-xs">{{ trans('profile.my.proof.confirm') }}</a>
                        @endif
                    </p>
                    <p>
                        {{ trans('profile.my.proof.phone') }}
                        @if ($user->profile->phone)
                            {{ $user->profile->phone }}
                            @if ($user->profile->confirmed_mobile)
                                <span class="text-success">{{ trans('profile.my.proof.status.confirmed') }}</span>
                            @else
                                <span class="text-danger">{{ trans('profile.my.proof.status.unconfirmed') }}</span>
                                <a href="/profile/confirm/mobile" class="btn btn-success btn-xs">{{ trans('profile.my.proof.confirm') }}</a>
                            @endif
                        @else
                            {!! Form::open(['url' => '/profile/confirm/mobile', 'action' => 'post', 'class' => 'form-inline']) !!}
                                <div class="form-group">
                                    {!! Form::label(trans('profile.my.proof.phone')) !!}
                                    {!! Form::text('mobile', $user->profile->phone, ['class' => 'form-control', 'placeholder' => trans('profile.my.proof.phone')]) !!}
                                </div>
                                {!! Form::submit(trans('general.save'), ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        @endif
                    </p>
                    <p>
                        {{ trans('profile.my.proof.passport') }}
                        @if ($user->profile->confirmed_passport)
                            <span class="text-success">{{ trans('profile.my.proof.status.confirmed') }}</span>
                        @else
                            <span class="text-danger">{{ trans('profile.my.proof.status.unconfirmed') }}</span>
                            {!! Form::open(['url' => '/profile/confirm/passport', 'action' => 'post', 'class' => 'form-inline', 'file' => true]) !!}
                                <div class="form-group">
                                    {!! Form::label(trans('profile.my.proof.passport')) !!}
                                    {!! Form::file('passport', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                                </div>
                                {!! Form::submit(trans('general.save'), ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        @endif
                    </p>
                    <p>
                        {{ trans('profile.my.proof.facebook') }}
                        {{ $user->profile->facebook }}
                        @if ($user->profile->confirmed_facebook)
                            <span class="text-success">{{ trans('profile.my.proof.status.confirmed') }}</span>
                        @else
                            <span class="text-danger">{{ trans('profile.my.proof.status.unconfirmed') }}</span>
                        <a href="/profile/confirm/facebook" class="btn btn-success btn-xs">{{ trans('profile.my.proof.confirm') }}</a>
                    @endif
                    </p>

                </div>
            </div>
        </div>
    </div>


@endsection