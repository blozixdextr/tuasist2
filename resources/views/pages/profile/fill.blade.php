@extends('layouts.inside')

@section('head-js')
    <script type="text/javascript" src="/assets/libs/jquery/jquery.cropit.js"></script>
@endsection

@section('body-js')
    <script>
        $(function() {
            $('#avatarEditor .image-editor').cropit();
            $('#avatarCrop').click(function(e) {
                e.preventDefault();
                if ($('#avatarEditor .cropit-image-preview').hasClass('cropit-image-loaded') == false) {
                    alert('Set photo!');
                    return false;
                }
                var imageData = $('#avatarEditor .image-editor').cropit('export');
                $('#avatarData').val(imageData);
                var img = $('<img class="avatar">').attr('src', imageData);
                $('#avatarWrap').append(img);
                $('#avatarWrap .image-editor').hide();
                return false;
            });

        });
    </script>
@endsection


@section('head-style')
    <style>
        #citiesList .radio label input[type=checkbox] {
            margin-top: 0;
        }
        #citiesList .checkbox {
            float: left;
            width: 150px;
            margin: 0 2px;
        }
        #citiesList .checkbox label {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 11px;
            line-height: 20px;
        }

        #avatarEditor .cropit-image-preview {
            background-color: #f8f8f8;
            background-size: cover;
            border: 1px solid #ccc;
            border-radius: 50px;
            margin-top: 7px;
            width: 100px;
            height: 100px;
            cursor: move;
        }

        #avatarWrap .avatar {
            border: 1px solid #ccc;
            border-radius: 50px;
            width: 100px;
            height: 100px;
        }

        #avatarEditor .cropit-image-background {
            opacity: .2;
            cursor: auto;
        }
        #avatarEditor .image-size-label {
            margin-top: 10px;
        }
        #avatarEditor input {
            display: block;
        }
        #avatarEditor button[type="submit"] {
            margin-top: 10px;
        }

        #avatarEditor .cropit-image-zoom-input.custom {
            width: 130px;
            margin: 4px 10px 0 10px;
            position: relative;
            float: left;
        }

        #avatarEditor .slider-wrapper i {
            float: left;
        }

        #avatarEditor .control-btns {
            text-align: center;
            margin: 5px 0 0 0;
            width: 102px;;
        }

        #avatarEditor .image-size-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        #avatarEditor .slider-wrapper .cropit-image-zoom-input.custom,.demos .demo-wrapper .slider-wrapper .cropit-image-zoom-input.custom{-webkit-appearance:none;-moz-appearance:none;appearance:none;height:5px;background:#eee;-webkit-border-radius:5px;border-radius:5px;outline:none;}
        #avatarEditor .slider-wrapper .cropit-image-zoom-input.custom::-moz-range-track,.demos .demo-wrapper .slider-wrapper .cropit-image-zoom-input.custom::-moz-range-track{-webkit-appearance:none;-moz-appearance:none;appearance:none;height:5px;background:#eee;-webkit-border-radius:5px;border-radius:5px;outline:none}
        #avatarEditor .slider-wrapper .cropit-image-zoom-input.custom::-webkit-slider-thumb,.demos .demo-wrapper .slider-wrapper .cropit-image-zoom-input.custom::-webkit-slider-thumb{-webkit-appearance:none;-moz-appearance:none;appearance:none;width:15px;height:15px;background:#888;-webkit-border-radius:50%;border-radius:50%;-webkit-transition:background 0.25s;-moz-transition:background 0.25s;-o-transition:background 0.25s;-ms-transition:background 0.25s;transition:background 0.25s;}
        #avatarEditor .slider-wrapper .cropit-image-zoom-input.custom::-webkit-slider-thumb:active,.demos .demo-wrapper .slider-wrapper .cropit-image-zoom-input.custom::-webkit-slider-thumb:active{background:#bbb}
        #avatarEditor .slider-wrapper .cropit-image-zoom-input.custom::-moz-range-thumb,.demos .demo-wrapper .slider-wrapper .cropit-image-zoom-input.custom::-moz-range-thumb{-webkit-appearance:none;-moz-appearance:none;appearance:none;width:15px;height:15px;background:#888;-webkit-border-radius:50%;border-radius:50%;-webkit-transition:background 0.25s;-moz-transition:background 0.25s;-o-transition:background 0.25s;-ms-transition:background 0.25s;transition:background 0.25s;}
        #avatarEditor .slider-wrapper .cropit-image-zoom-input.custom::-moz-range-thumb:active,.demos .demo-wrapper .slider-wrapper .cropit-image-zoom-input.custom::-moz-range-thumb:active{background:#bbb}

    </style>
@endsection

@section('content')
    <div id="registerFormWrap" style="max-width: 600px; margin: 0 auto">
        <h1>{!! trans('register.title') !!}</h1>
    @include('includes.errors')
    {!! Form::open(['url' => '/profile/fill', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'registerFillForm', 'files' => true]) !!}
        <div id="avatarEditor" class="form-group{!! ($errors && $errors->has('avatar')) ? ' has-error' : '' !!}">
            {!! Form::label('avatar', trans('profile.avatar.label'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9" id="avatarWrap">

                <div class="image-editor">
                    <div class="col-sm-4" id="avatarPreview">
                        <div class="cropit-image-preview"></div>
                        <div class="control-btns">
                            <a href="#" id="avatarCrop" class="btn btn-xs btn-success"><i class="fa fa-check fa-fw"></i> {{ trans('general.accept') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-8" id="avatarControls">
                        <p>{!! trans('profile.avatar.warning') !!}</p>
                        <input name="avatar-source" type="file" class="cropit-image-input">
                        <div class="image-size-label">{!! trans('profile.avatar.resize.label') !!}</div>
                        <div class="slider-wrapper">
                            <i class="fa fa-picture-o"></i>
                            <input type="range" class="cropit-image-zoom-input custom" min="0" max="1" step="0.01">
                            <i class="fa fa-picture-o fa-lg"></i>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <input type="hidden" name="avatar" id="avatarData" class="hidden-image-data" />

                {!! Form::errorMessage('avatar') !!}

            </div>
        </div>

        <div class="form-group fa-iconed{!! ($errors && $errors->has('dob')) ? ' has-error' : '' !!}">
            {!! Form::label('dob', trans('profile.dob.label'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                <i class="fa fa-calendar fa-fw"></i>
                {!! Form::input('date', 'dob', old('dob'), ['class' => 'form-control', 'required' => 'required', 'max' => \Carbon\Carbon::now()->subYears(15)->format('Y-m-d')]) !!}
                {!! Form::errorMessage('dob') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('sex', trans('profile.sex.label'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                <div class="radio">
                    <label for="sexMale" style="margin-right: 20px">
                        {!! Form::radio('sex', 'male', old('sex', 'male') == 'male' ? true : false, ['id' => 'sexMale']) !!}
                        {!! trans('profile.sex.male') !!}
                    </label>
                    <label for="sexFemale">
                        {!! Form::radio('sex', 'female', old('sex', 'male') == 'female' ? true : false, ['id' => 'sexFemale']) !!}
                        {!! trans('profile.sex.female') !!}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group{!! ($errors && $errors->has('about')) ? ' has-error' : '' !!}">
            {!! Form::label('about', trans('profile.about.label'), ['class' => 'control-label']) !!}
            {!! Form::textarea('about', old('about'), ['class' => 'form-control', 'placeholder' => trans('profile.about.placeholder'), 'style' => 'width:100%; height:100px']) !!}
            {!! Form::errorMessage('about') !!}
        </div>
        <div class="form-group">
            {!! Form::label('category', trans('profile.category.label'), ['class' => 'control-label']) !!}
            <div class="panel panel-default">
                @foreach($categories as $c)
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category[]', $c->id, old('category') ? in_array($c->id, old('category')) : false) !!}
                            {{ trans('categories.'.$c->title.'.title') }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group" id="citiesList">
            {!! Form::label('city', trans('profile.city.label'), ['class' => 'control-label']) !!}
            <div class="panel panel-default">
                @foreach($cities as $c)
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('city[]', $c->id, old('city', $user->location) ? in_array($c->id, old('city', $user->location)) : false) !!}
                            {{ $c->title }}
                        </label>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('subscribe_period', trans('profile.subscribe_period.label'), ['class' => 'control-label']) !!}
            <div class="panel panel-default">
                @foreach($subscribePeriods as $c)
                    <div class="radio">
                        <label>
                            {!! Form::radio('subscribe_period', $c, old('subscribe_period') ? $c == old('subscribe_period') : false) !!}
                            {{ trans('profile.subscribe_period.types.'.$c) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit(trans('general.save'), ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
        </div>

    {!! Form::close() !!}
    </div>
@endsection