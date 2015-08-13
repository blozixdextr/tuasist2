@extends('layouts.inside')

@section('head-style')
    <link rel="stylesheet" href="/assets/app/css/views/for-application.css">
@endsection

@section('pre-content')

    <div class="container-fluid need-cureer">
        <div class="row">
            <div>
                <p> - Ищете курьера на день?</p>
                <ul>
                    <li class="need-cureer-1"><p><span>Заполните заявку</span><br>Мы быстро оповестим<br>исполнителей YouDo <br>о вашей заявке.</p></li>
                    <li class="need-cureer-2"><p><span>Получите предложения</span><br>Заинтересованные исполнители<br> предложат вам<br>свои услуги.</p></li>
                    <li class="need-cureer-3"><p><span>Выберите исполнителя</span><br>Выберите подходящее для вас<br>
                            предложение по цене или рейтингу<br> исполнителя.</p></li>
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
                    <h2>{{ trans('task.create.title') }}</h2>
                    <div class="choose-category">
                        <p class="beu">{{ trans('task.create.title') }}В категории</p>
                        <select name="" id="">
                            <option value="">Курьерские услуги</option>
                            <option value="">Курьерские услуги</option>
                            <option value="">Курьерские услуги</option>
                            <option value="">Курьерские услуги</option>
                            <option value="">Курьерские услуги</option>
                        </select>
                        <select name="" id="">
                            <option value="">Другая посылка</option>
                            <option value="">Другая посылка</option>
                            <option value="">Другая посылка</option>
                            <option value="">Другая посылка</option>
                            <option value="">Другая посылка</option>
                        </select>
                    </div>
                    <div class="form-i-need">
                        <div class="choose-main">
                            <label for="p-i-need" class="beu">Мне нужно</label>
                            <input type="text" id="p-i-need" placeholder="Нужен курьер на несколько доставок">
                            <p class="beu">Добавьте детали, чтобы исполнители лучше поняли вашу задачу</p>
                            <textarea placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, nulla!" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="choose-file">
                            <a href="" class="archiv">Выберите файл</a><br><div class="height30"></div>
                            <span><i>Наличие фото помогает исполнителям лучше оценить<br> вашу задачу и сформулировать свое предложение. </i></span>
                            <div class="clear"></div>
                        </div>
                        <div class="thing-weight">
                            <p class="beu">Вес посылки</p>
                            <a href="" class="weight-one weight-active">До 3 кг</a>
                            <a href="" class="weight-two" >От до 10 кг</a>
                            <a href="" class="weight-three" >Более 10 кг</a>
                        </div>
                        <div class="point-date">
                            <input type="text" placeholder="Укажите дату">
                            <input type="text" placeholder="Укажите время">
                        </div>
                        <div class="point-addres">
                            <input type="text" placeholder="Улица,дом, строение, корпус">
                            <input type="text"placeholder="Улица,дом, строение, корпус">
                            <a href="">Добавить еще один адрес</a>
                        </div>
                        <div class="point-documents">
                            <input type="checkbox">
                            <p>Исполнитель должен иметь документы для оформления расписки.</p>
                            <a href="">Посмотреть пример расписки </a>
                        </div>
                        <div class="point-price">
                            <input type="radio" id="radio-form-1">
                            <label for="radio-form-1">Пусть исполнители сами предложат цену</label><br>
                            <input type="radio" id="radio-form-2">
                            <label for="radio-form-1">Я готов заплатить за работу <input type="text"> &#8381; <a href="">Прайс-лист</a></label>

                            <p><i>Средняя цена задания в этой категории 640</i></p>
                        </div>
                        <div class="point-contacts">
                            <p class="beu">Ваши контакты</p>
                            <input type="text" placeholder="Имя"><br>
                            <input type="text" placeholder="E-mail"><br>
                            <input type="text" placeholder="Ваш телефон">
                            <p class="form-abs"><i>Указанный номер будет доступен выбранному исполнителю.</i></p>
                            <h5>Уже зарегистрированы? <a href="">Войдите</a></h5>
                        </div>
                        <div class="point-add">
                            <input type="checkbox" id="point-add-1">
                            <label for="point-add-1">Получать смс-уведомления о новых предложениях</label><br>
                            <input type="checkbox" id="point-add-2">
                            <label for="point-add-2">Получать email-уведомления о новых предложениях</label>
                        </div>
                        <div class="point-addition">
                            <p class="beu">Дополнительные условия</p>
                            <input type="checkbox" id="point-addition-1">
                            <label for="point-addition-1">В стоимость задания входят услуги погрузки/разгрузки</label><br>
                            <input type="checkbox" id="point-addition-2">
                            <label for="point-addition-2">Показывать мое задание только исполнителям </label><br>
                            <input type="checkbox" id="point-addition-3">
                            <label for="point-addition-3">Отключить комментарии у задания</label>
                        </div>
                        <div class="big-form-button">
                            <a href="" class="archiv">Опубликовать</a>
                        </div>
                        <div class="i-agree">
                            <input id="i-agree-form" type="checkbox">
                            <label for="i-agree-form">Я согласен с <a href="">Правилами сайта</a></label>
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