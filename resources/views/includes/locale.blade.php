<?php
    $locale = App::getLocale();
    $localeClasses = ['en' => '', 'ru' => '', 'es' => ''];
    if (isset($localeClasses[$locale])) {
        $localeClasses[$locale] = ' active';
    } else {
        $localeClasses[config('app.locale')] = ' active';
    }
?>

    <div id="localeSwitcher">
        <form action="/locale" method="post">
            <div class="checkbox">
                <label for="en_language">
                    <input name="language" type="radio" {!! $localeClasses['en'] != ' active' ? '' : 'checked="checked"' !!} value="en">
                    <a href="/locale/en" class="en{!! $localeClasses['en'] !!}"><img src="/assets/app/img/flags/us.png" alt=""><span> </span>en</a>
                </label>
            </div>
            <div class="checkbox">
                <label for="es_language">
                    <input name="language" type="radio" {!! $localeClasses['es'] != ' active' ? '' : 'checked="checked"' !!} value="es">
                    <a href="/locale/es" class="es{!! $localeClasses['es'] !!}"><img src="/assets/app/img/flags/es.png" alt=""><span> </span>es</a>
                </label>
            </div>
            <div class="checkbox">
                <label for="ru_language">
                    <input name="language" type="radio" {!! $localeClasses['ru'] != ' active' ? '' : 'checked="checked"' !!} value="ru">
                    <a href="/locale/ru" class="ru{!! $localeClasses['ru'] !!}"><img src="/assets/app/img/flags/ru.png" alt=""><span> </span>ru</a>
                </label>
            </div>
        </form>
    </div>

