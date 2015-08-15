<?php

$categoryRoots = [];
$categoryRoots[''] = '';
foreach ($categories as $c) {
    $categoryRoots[$c->id] = trans('categories.'.$c->title.'.title');
}

$locationRoots = [];
$locationRoots[''] = trans('task.create.location.placeholder');
foreach ($locations as $c) {
    $locationRoots[$c->id] = $c->title;
}


?>

@extends('layouts.inside')

@section('head-style')
    <link rel="stylesheet" href="/assets/app/css/views/for-application.css">
    <link rel="stylesheet" href="/assets/libs/tel-input/css/intlTelInput.css">
@endsection

@section('head-js')
    <script src="/assets/libs/tel-input/js/intlTelInput.min.js"></script>
    <script src="/assets/app/js/tel.js"></script>
@endsection

@section('pre-content')

    <div class="container-fluid need-cureer">
        <div class="row">
            <div>
                <p> &mdash; {{ trans('task.create.welcome.title') }}
                    @if ($category)
                        {{ trans('categories.'.$category->title.'.title') }}
                    @else
                        {{ trans('task.create.welcome.default') }}
                    @endif
                ?</p>
            <ul>
                <li class="need-cureer-1"><p><span>{{ trans('task.create.welcome.step1.title') }}</span><br>{!! trans('task.create.welcome.step1.subtitle') !!}</p></li>
                    <li class="need-cureer-2"><p><span>{{ trans('task.create.welcome.step2.title') }}</span><br>{!! trans('task.create.welcome.step2.subtitle') !!}</p></li>
                    <li class="need-cureer-3"><p><span>{{ trans('task.create.welcome.step3.title') }}</span><br>{!! trans('task.create.welcome.step3.subtitle') !!}</p></li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="col-lg-12 service-content">
        <div class="col-lg-8 col-lg-push-4 application-form">
            <div class="form-in">
                @include('includes.errors')
                {!! Form::open(['url' => '/task/store', 'method' => 'post', 'id' => 'taskCreateForm']) !!}
                    <h2>{{ trans('task.create.form_title') }}</h2>
                    <div class="choose-category">
                        <p class="beu">{{ trans('task.create.category.label') }}</p>
                        {!! Form::select('category', $categoryRoots, $category ? $category->id : old('category'), ['id' => 'category', 'class' => 'greyed', 'required' => 'required']) !!}
                        {!! Form::select('sub_category', [], null, ['id' => 'subCategory', 'class' => 'greyed', 'required' => 'required']) !!}
                    </div>
                    <div class="form-i-need">
                        <div class="choose-main">
                            {!! Form::label('p-i-need', trans('task.create.title.label'), ['class' => 'beu']) !!}
                            {!! Form::text('title', old('title'), ['placeholder' => trans('task.create.title.placeholder'), 'id' => 'p-i-need', 'required' => 'required']) !!}
                            <p class="beu">{{ trans('task.create.subtitle.label') }}</p>
                            {!! Form::textarea('subtitle', old('subtitle'), ['placeholder' => trans('task.create.subtitle.placeholder'), 'id' => 'subtitle',  'cols' => 30, 'rows' => 10, 'required' => 'required']) !!}
                        </div>
                        <div class="choose-file">
                            <a href="#" class="archiv" id="photoChoose">{{ trans('task.create.photo.label') }}</a>
                            <span><i>{!! trans('task.create.photo.description') !!}</i></span>
                            {!! Form::file('photo', ['accept' => 'image/*', 'id' => 'photo', 'style' => 'display: none']) !!}
                        </div>
                        <div class="point-date">
                            <p class="beu">{{ trans('task.create.event_date.label') }}</p>
                            {!! Form::input('date', 'event_date', old('event_date'), ['placeholder' => trans('task.create.event_date.placeholder'), 'id' => 'eventDate']) !!}
                            {!! Form::input('time', 'event_time', old('event_time'), ['placeholder' => trans('task.create.event_time.placeholder'), 'id' => 'eventTime']) !!}
                        </div>
                        <div class="point-addres">
                            <p class="beu">{{ trans('task.create.location.label') }}</p>
                            {!! Form::text('address', old('address'), ['placeholder' => trans('task.create.address.placeholder')]) !!}
                            {!! Form::select('location', $locationRoots, old('location'), ['id' => 'location', 'class' => 'greyed', 'required' => 'required']) !!}
                            <span><i>{!! trans('task.create.address.description') !!}</i></span>
                        </div>
                        <div class="point-price">
                            {!! Form::radio('is_priced', 0, old('is_priced') ? old('is_priced') : true, ['id' => 'isPricesNo']) !!}
                            <label for="isPricesNo">{{ trans('task.create.price.no') }}</label><br>
                            {!! Form::radio('is_priced', 1, old('is_priced') ? old('is_priced') : false, ['id' => 'isPricesYes']) !!}
                            <label for="isPricesYes">{{ trans('task.create.price.yes') }} {!! Form::text('price', old('price'), ['id' => 'price']) !!} &euro;</label>
                        </div>
                        <div class="point-contacts">
                            <p class="beu">{{ trans('task.create.contact.title') }}</p>
                            @if ($user)
                                {{ trans('task.create.contact.name') }}: <strong>{{ $user->name }}</strong><br>
                                {{ trans('task.create.contact.email') }}: <strong>{{ $user->email }}</strong><br>
                                @if ($user->profile->phone)
                                    {{ trans('task.create.contact.mobile') }}: <strong>{{ $user->profile->phone }}</strong>
                                @else
                                    <div class="row">
                                        <div class="col-xs-7">
                                            {!! Form::input('tel', 'mobile', old('mobile'), ['required' => 'required', 'id' => 'mobile']) !!}
                                        </div>
                                        <div class="col-xs-5">
                                            <span id="valid-msg" class="bg-success text-success"><i class="fa fa-check"></i> {!! trans('register.mobile.valid') !!}</span>
                                            <span id="error-msg" class="bg-danger text-danger"><i class="fa fa-exclamation-circle"></i> {!! trans('register.mobile.invalid') !!}</span>
                                        </div>
                                    </div>
                                @endif
                            @else
                                {!! Form::text('name', old('name'), ['placeholder' => trans('task.create.contact.name'), 'required' => 'required']) !!}
                                <br>
                                {!! Form::input('email', 'email', old('email'), ['placeholder' => trans('task.create.contact.email'), 'required' => 'required']) !!}
                                <br>
                                <div class="row">
                                    <div class="col-xs-7">
                                        {!! Form::input('tel', 'mobile', old('mobile'), ['required' => 'required', 'id' => 'mobile']) !!}
                                    </div>
                                    <div class="col-xs-5">
                                        <span id="valid-msg" class="bg-success text-success"><i class="fa fa-check"></i> {!! trans('register.mobile.valid') !!}</span>
                                        <span id="error-msg" class="bg-danger text-danger"><i class="fa fa-exclamation-circle"></i> {!! trans('register.mobile.invalid') !!}</span>
                                    </div>
                                </div>
                                <p class="form-abs"><i>{{ trans('task.create.contact.mobile_notice') }}</i></p>
                                <h5>{{ trans('auth.have_account') }} <a href="/auth/login">{{ trans('general.login') }}</a></h5>
                            @endif
                        </div>
                        <div class="point-add">
                            {!! Form::checkbox('is_sms', 1, old('is_sms', false), ['id' => 'point-add-1']) !!}
                            <label for="point-add-1">{{ trans('task.create.notify.sms') }}</label><br>
                            {!! Form::checkbox('is_email', 1, old('is_email', true), ['id' => 'point-add-2']) !!}
                            <label for="point-add-2">{{ trans('task.create.notify.email') }}</label>
                        </div>
                        <div class="point-addition">
                            <p class="beu">{{ trans('task.create.extra_requirements.title') }}</p>
                            {!! Form::checkbox('taskers_only', 1, old('taskers_only', false), ['id' => 'point-addition-2']) !!}
                            <label for="point-addition-2">{{ trans('task.create.extra_requirements.taskers_only') }}</label><br>
                            {!! Form::checkbox('no_comments', 1, old('no_comments', false), ['id' => 'point-addition-3']) !!}
                            <label for="point-addition-3">{{ trans('task.create.extra_requirements.no_comments') }}</label>
                        </div>
                        <div class="big-form-button">
                            <input type="submit" class="archiv" value="{{ trans('general.publish') }}" >
                        </div>
                        <div class="i-agree">
                            {!! Form::checkbox('agree', 1, old('agree', false), ['id' => 'i-agree-form', 'required' => 'required']) !!}
                            <label for="i-agree-form">{!! trans('register.agree.label', ['url' => '/page/terms-and-conditions']) !!}</label>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-4 col-lg-pull-8 tasksLeftService leftService">
            @include('includes.blocks.faqs')
            @include('includes.blocks.contacts-info')
        </div>
    </div>
@endsection

@section('pre-footer')
    @include('includes.blocks.pre-footer-links')
@endsection

@section('body-js')
    <script>
        $(function(){

            $('#category').change(function(){
                var selected = $('#category option:selected');
                var categoryId = selected.attr('value');
                if (categoryId == '') {
                    return;
                }
                $('#subCategory option').remove();
                $('#subCategory').append('<option value="' + categoryId + '">{{ trans('general.other') }}</option>');
                $.getJSON('/category/sub/' + categoryId, function(data){
                    //console.log(data);
                    for (var i in data) {
                        var t = data[i];
                        $('#subCategory').append('<option value="' + t.id + '">' + t.title + '</option>');
                    }
                })
            });

            $('#photoChoose').click(function(e){
                e.preventDefault();
                $('#photo').click();
            });

            $('#isPricesYes, #isPricesNo').change(function(){
                if ($('#isPricesYes').is(':checked')) {
                    $('#price').attr('required', 'required');
                    $('#price').removeAttr('disabled');
                } else {
                    $('#price').removeAttr('required');
                    $('#price').attr('disabled', 'disabled');
                }
            });

            $('#category').change();
            $('#isPricesYes').change();


            telInputGenerator($('#mobile'), $('#taskCreateForm'), $('#error-msg'), $('#valid-msg'));

        });

    </script>
@endsection