@extends('layouts.inside')

@section('head-style')
    <link rel="stylesheet" href="/assets/libs/tel-input/css/intlTelInput.css">
    <link rel="stylesheet" href="/assets/app/css/views/for-registration.css">
    <style>
        #error-msg, #valid-msg {
            display: none;
            padding: 5px;
        }
        #registerFormWrap {
            margin-top: 0;
        }
    </style>
@endsection

@section('head-js')
    <script src="/assets/libs/tel-input/js/intlTelInput.min.js"></script>
@endsection

@section('body-js')
    <script>
        $(function() {

            var telInput = $("#mobile"),
                    errorMsg = $("#error-msg"),
                    validMsg = $("#valid-msg");
            telInput.intlTelInput({
                utilsScript: "/assets/libs/libphonenumber/utils.js",
                preferredCountries: ['es', 'gb', 'ru']
            });
            telInput.blur(function() {
                if ($.trim(telInput.val())) {
                    if (telInput.intlTelInput("isValidNumber")) {
                        validMsg.show();
                        errorMsg.hide();
                    } else {
                        telInput.addClass("error");
                        errorMsg.show();
                        validMsg.hide();
                    }
                }
            });
            telInput.keydown(function() {
                telInput.removeClass("error");
                errorMsg.hide();
                validMsg.hide();
            });

            $('#registerForm').submit(function(e){
                if (telInput.intlTelInput("isValidNumber")) {
                    var number = telInput.intlTelInput("getNumber");
                    telInput.intlTelInput("destroy");
                    telInput.val(number);
                    errorMsg.hide();
                    validMsg.hide();
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            });

            function switchUserType() {
                if ($('#userTypePersonal').is(':checked')) {
                    $('#personalInputsWrap').show();
                    $('#companyInputsWrap').hide();
                    $('#first_name').attr('required', 'required');
                    $('#last_name').attr('required', 'required');
                    $('#company_name').removeAttr('required');
                } else {
                    if ($('#userTypeCompany').is(':checked')) {
                        $('#personalInputsWrap').hide();
                        $('#companyInputsWrap').show();
                        $('#first_name').removeAttr('required');
                        $('#last_name').removeAttr('required');
                        $('#company_name').attr('required', 'required');
                    }
                }
            }

            switchUserType();

            $('#userTypePersonal, #userTypeCompany').change(switchUserType);

        });
    </script>
@endsection

@section('content')

            <div id="registerFormWrap" class="allPagesContent">
                <h1>{!! trans('register.title') !!}</h1>
                @include('includes.errors')
                {!! Form::open(['url' => '/register/tasker', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'registerForm']) !!}
                {!! Form::hidden('type', 'tasker') !!}
                <div class="form-group{!! ($errors && $errors->has('user_type')) ? ' has-error' : '' !!}">
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
                <div id="personalInputsWrap">
                    <div class="form-group fa-iconed{!! ($errors && $errors->has('first_name')) ? ' has-error' : '' !!}">
                        {!! Form::label('first_name', trans('register.first_name.label'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            <i class="fa fa-user fa-fw"></i>
                            {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => trans('register.first_name.placeholder'), 'required' => 'required']) !!}
                            {!! Form::errorMessage('first_name') !!}
                        </div>
                    </div>
                    <div class="form-group fa-iconed{!! ($errors && $errors->has('last_name')) ? ' has-error' : '' !!}">
                        {!! Form::label('last_name', trans('register.last_name.label'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            <i class="fa fa-user fa-fw"></i>
                            {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => trans('register.last_name.placeholder'), 'required' => 'required']) !!}
                            {!! Form::errorMessage('last_name') !!}
                        </div>
                    </div>
                </div>
                <div id="companyInputsWrap" style="display:none;">
                    <div class="form-group fa-iconed{!! ($errors && $errors->has('company_name')) ? ' has-error' : '' !!}">
                        {!! Form::label('company_name', trans('register.company_name.label'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            <i class="fa fa-user fa-fw"></i>
                            {!! Form::text('company_name', old('company_name'), ['class' => 'form-control', 'placeholder' => trans('register.company_name.placeholder'), 'required' => 'required']) !!}
                            {!! Form::errorMessage('company_name') !!}
                        </div>
                    </div>
                </div>
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
                <div class="form-group fa-iconed{!! ($errors && $errors->has('password_confirmation')) ? ' has-error' : '' !!}">
                    {!! Form::label('password_confirmation', trans('register.password_confirmation.label'), ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        <i class="fa fa-key fa-fw"></i>
                        {!! Form::input('password', 'password_confirmation', old('password_confirmation'), ['class' => 'form-control', 'placeholder' => trans('register.password_confirmation.placeholder'), 'required' => 'required']) !!}
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
                <div class="form-group {!! ($errors && $errors->has('mobile')) ? ' has-error' : '' !!}">
                    {!! Form::label('mobile', trans('register.mobile.label'), ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::input('tel', 'mobile', old('mobile'), ['style' => 'padding-left: 45px', 'class' => 'form-control', 'required' => 'required', 'id' => 'mobile']) !!}
                        <span id="valid-msg" class="bg-success text-success"><i class="fa fa-check"></i> {!! trans('register.mobile.valid') !!}</span>
                        <span id="error-msg" class="bg-danger text-danger"><i class="fa fa-exclamation-circle"></i> {!! trans('register.mobile.invalid') !!}</span>
                        {!! Form::errorMessage('mobile') !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="accept_terms">
                                {!! Form::checkbox('accept_terms', 1, old('accept_terms', false)) !!}
                                {!! trans('register.agree.label', ['url' => '/page/terms-and-conditions']) !!}
                                {!! Form::errorMessage('accept_terms') !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group regButtons">
                    <div class="col-sm-offset-3 col-sm-9">
                        {!! Form::submit(trans('register.submit'), ['class' => 'hvr-fade']) !!} or
                        <a href="/auth/facebook?type=tasker&user_type=personal" class="hvr-fade archiv">{!! trans('register.facebook.label') !!}</a>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>

@endsection