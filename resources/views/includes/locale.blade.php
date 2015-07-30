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
    <a href="/locale/en" class="en{!! $localeClasses['en'] !!}">english</a>
    <a href="/locale/es" class="es{!! $localeClasses['es'] !!}">spanish</a>
    <a href="/locale/ru" class="ru{!! $localeClasses['ru'] !!}">русский</a>
</div>
