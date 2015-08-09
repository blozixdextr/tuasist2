@extends('layouts.inside')

@section('content')
    <div class="page-header">
        <h1>{{ trans('profile.title') }}</h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('profile.user.panel.title') }}</div>
                <div class="panel-body">

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('profile.proof.panel.title') }}</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('profile.profile.panel.title') }}</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>


@endsection