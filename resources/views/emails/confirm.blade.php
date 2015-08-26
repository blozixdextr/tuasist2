<h1>{!! trans('profile.my.confirm.email.body.title') !!}</h1>
<p>{!! trans('profile.my.confirm.email.body.greeting', ['user' => $user->username]) !!}</p>
<p>{!! trans('profile.my.confirm.email.body.text', ['url' => url('/profile/confirm/email/end/'.$token)]) !!}</p>