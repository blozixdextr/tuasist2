<?php

return [
    'title' => 'My Profile',
    'fill' => [

    ],
    'dob' => [
        'label' => 'Date of Birth'
    ],
    'avatar' => [
        'label' => 'Set your photo',
        'warning' => 'Users with avatars are most trusted. Please use your actual photo not a funny cat.',
        'resize' => [
            'label' => 'Scale and move image'
        ]
    ],
    'sex' => [
        'label' => 'Your sex',
        'male' => 'male',
        'female' => 'female'
    ],
    'city' => [
        'label' => 'Set cities where you want to work'
    ],
    'about' => [
        'label' => 'Say some word about yourself',
        'placeholder' => 'like hobby, education etc'
    ],
    'category' => [
        'label' => 'Select some categories you want to work'
    ],
    'subscribe_period' => [
        'label' => 'Set subscription periods',
        'types' => [
            'asap' => 'as soon as possible',
            'hour' => 'every hour',
            'twice-day' => 'twice per day',
            'day' => 'every day',
            'two-days' => 'every two days'
        ]
    ],
    'my' => [
        'user' => [
            'title' => 'My info',

        ],
        'proof' => [
            'title' => 'Proofs and approvals',
            'description' => 'You must proof your identity to take tasks',
            'email' => 'Email address',
            'phone' => 'Mobile phone',
            'passport' => 'Passport scan (or any ID)',
            'facebook' => 'Facebook account',
            'status' => [
                'confirmed' => 'confirmed',
                'unconfirmed' => 'unconfirmed',
            ],
            'confirm' => 'confirm',
        ],
        'tasks' => [
            'title' => 'My tasks',

        ],
        'confirm' => [
            'email' => [
                'subject' => 'Confirm your address',
                'body' => [
                    'title' => 'Confirm your address',
                    'greeting' => 'Hello :username',
                    'text' => 'Please confirm <a href=":url">:url</a> your email address',
                ],
                'success' => 'You confirmed your email',
                'error' => 'Failed email confirmation',
                'title' => 'Confirm your mail',
                'description' => 'We sent your email, please follow instructions in it'
            ],
            'sms' => [
                'message' => 'tuasist.es verification code :token',
                'title' => 'Confirm your mobile number',
                'description' => 'Verification code has been sent to your mobile :mobile',
                'label' => 'Verification code',
                'success' => 'You confirmed your mobile',
                'error' => 'Wrong mobile confirmation',
                'fail' => 'Sms gate failed. Retry later',
            ]
        ]
    ]
];