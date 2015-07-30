<?php
Form::macro('errorMessage', function($field){
    $errors = Session::get('errors');
    if($errors && $errors->has($field)) {
        $msg = $errors->first($field);
        return '<div class="error-message text-danger">'.$msg.'</div>';
    }
    return '';
});