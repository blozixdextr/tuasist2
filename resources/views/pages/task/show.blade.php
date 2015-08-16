@extends('layouts.inside')

@section('head-style')
    <link rel="stylesheet" href="/assets/app/css/views/for-quest.css">
@endsection

@section('head-js')

@endsection

@section('pre-content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 about-service">
                <div>
                    {!! trans('task.show.welcome') !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 service-content">

            <div class="col-lg-8 col-lg-push-4 qwest-content">
                <div class="col-lg-12 allPagesContent">
                    <div class="row">
                        <div class="col-lg-12 quest-info">
                            <p class="categoryNameService">
                                {{ $task->title }}
                                @if ($task->price > 0)
                                    <span class="commentServicePrice">{{ number_format($task->price, 2) }} &euro;</span>
                                @endif
                            </p>
                            <p class="makerOnline">
                                <span>{{ trans('task.status.'.$task->status) }}</span>
                                <span>{{ $task->views()->count() }} {{ trans_choice('task.views', $task->views()->count()) }}</span>
                                <span>{{ trans('task.created') }} {{ $task->created_at->diffForHumans() }}</span>
                                <span>{{ trans('categories.'.$task->category->title.'.title') }}</span>
                            </p>
                            <ul>
                                <li>
                                    <div class="quest-info-left">
                                        <p>{{ trans('task.show.where') }}:</p>
                                    </div>
                                    <div class="quest-info-right">
                                        <p>{{ trans($task->location->title) }}</p>
                                    </div>
                                    <div class="clear"></div>
                                </li>

                                <li>
                                    <div class="quest-info-left">
                                        <p>{{ trans('task.show.when') }}:</p>
                                    </div>
                                    <div class="quest-info-right">
                                        <p>{{ $task->event_date->format('d m Y') }}, {{ $task->event_time }}</p>
                                    </div>
                                    <div class="clear"></div>
                                </li>

                                <li>
                                    <div class="quest-info-left">
                                        <p>{{ trans('task.show.need') }}:</p>
                                    </div>
                                    <div class="quest-info-right">
                                        @if ($task->photo)
                                            <img src="{{ \App\Models\Mappers\TaskMapper::getImageSrc($task) }}" alt="{{ $task->title }}" class="img-responsive">
                                        @endif
                                        <p>{{ nl2br($task->title) }}</p>
                                    </div>
                                    <div class="clear"></div>
                                </li>
                            </ul>
                            <div class="want-such-quest">
                                <p>{{ trans('task.show.want_the_same') }}</p>
                                <div class="want-quest-button">
                                    <a href="/task/create/{{ $task->category_id }}" class="archiv">{{ trans('task.show.create_the_same') }}</a>
                                    <a target="_blank" href="http://twitter.com/share?text={{ $task->title }}&url={{ url('task/show/'.$task->id) }}&hashtags=tuasist" class="want-link">{{ trans('task.show.share_link') }}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6">
                    <div class="row">
                        <div class="col-lg-12 quest-info">
                            <div class="quests-hide">
                                <p class="qwests-hid">Предложения исполнителей скрыты</p>
                                <p>Предложения видны только заказчику.</p>
                            </div>
                            <div class="quests-comments">
                                <p class="qwests-hid">Комментарии</p>
                                <p>Писать комментарии и оставлять предложения к заданиям могут только<br> <a href="">пользователи с подтвержденным аккаунтом.</a></p>
                                <ul>
                                    <li>
                                        <div class="quest-person-photo-little">
                                            <img src="img/tiny-photo.jpg" alt="">
                                        </div>
                                        <div class="quest-person-info-little">
                                            <p><a href="/">Руслан С.</a> <span>8 ч. 28 мин. назад</span></p>
                                            <p class="quest-person-comment">Вечером или сейчас надо?</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quest-person-photo-little">
                                            <img src="img/tiny-photo.jpg" alt="">
                                        </div>
                                        <div class="quest-person-info-little">
                                            <p><a href="/">Руслан С.</a> <span>8 ч. 28 мин. назад</span></p>
                                            <p class="quest-person-comment">Вечером или сейчас надо?</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quest-person-photo-little">
                                            <img src="img/tiny-photo.jpg" alt="">
                                        </div>
                                        <div class="quest-person-info-little">
                                            <p><a href="/">Руслан С.</a> <span>8 ч. 28 мин. назад</span></p>
                                            <p class="quest-person-comment">Вечером или сейчас надо?</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-lg-pull-8 col-md-6 tasksLeftService leftService">
                <div class="row">
                    <div class="col-lg-12 quest-person">
                        <p>{{ trans('task.show.client') }}</p>
                        <div class="quest-person-photo"><img class="img-circle" src="{{ \App\Models\Mappers\UserMapper::getAvatarSrc($task->user->profile) }}" alt=""></div>
                        <div class="quest-person-info">
                            <a href="/user/{{ $task->user->id }}" class="makerFullName">{{ $task->user->name }}</a>
                            @if ($task->user->profile->location)
                                <p class="quest-city">{{ $task->user->profile->city->title }}</p>
                            @endif
                            <p class="quest-otziv">no reviews</p>
                        </div>
                    </div>

                    @include('includes.blocks.faqs')
                    @include('includes.blocks.contacts-info')

                    <div class="wantWork how-servis-works col-lg-12">
                        <a href="/">{!! trans('task.show.how_works') !!}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('pre-footer')
    @include('includes.blocks.pre-footer-links')
@endsection