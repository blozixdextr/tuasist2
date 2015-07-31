@extends('layouts.index')

@section('content')
   <h1>{{ trans('register.title') }}</h1>
   <div class="row">
      <div class="col-sm-6">
         <h2>{{ trans('register.tasker.title') }}</h2>
         {{ trans('register.tasker.description') }}
         <a href="/register/tasker">{{ trans('register.tasker.label') }}</a>
      </div>
      <div class="col-sm-6">
         <h2>{{ trans('register.client.title') }}</h2>
         {{ trans('register.client.description') }}
         <a href="/register/client">{{ trans('register.client.label') }}</a>
      </div>
   </div>


@endsection