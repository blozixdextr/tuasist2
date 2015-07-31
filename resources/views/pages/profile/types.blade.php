@extends('layouts.user')

@section('content')
    <div id="registerFormWrap" style="max-width: 600px; margin: 0 auto">
        <h1>{!! trans('register.title') !!}</h1>
        @include('includes.errors')
        {!! Form::open(['url' => '/profile/types', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'registerForm']) !!}

        @if (!$user->type)
            <div class="form-group">
                {!! Form::label('type', trans('register.type.label'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    <div class="radio">
                        <label for="typeTasker" style="margin-right: 20px">
                            {!! Form::radio('type', 'tasker', old('type', 'tasker') == 'tasker' ? true : false, ['id' => 'typeTasker']) !!}
                            {!! trans('register.type.tasker') !!}
                        </label>
                        <label for="typeClient">
                            {!! Form::radio('type', 'client', old('type', 'tasker') == 'client' ? true : false, ['id' => 'typeClient']) !!}
                            {!! trans('register.type.client') !!}
                        </label>
                    </div>
                </div>
            </div>
        @endif

        @if (!$profile->type)
            <div class="form-group">
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
        @endif


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit(trans('general.save'), ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection