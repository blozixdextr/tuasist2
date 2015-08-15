<?php

return [

    'create' => [
        'welcome' => [
            'title' => 'Looking for',
            'default' => 'tasker',
            'step1' => [
                'title' => 'Fill the form',
                'subtitle' => 'We will notify<br>out tasker about your need.',
            ],
            'step2' => [
                'title' => 'Review bids',
                'subtitle' => 'Taskers will introduce<br>their services and prices',
            ],
            'step3' => [
                'title' => 'Choose the tasker',
                'subtitle' => 'Choose reqiured service<br>according taskers price or rating',
            ],
        ],
        'form_title' => 'Fill your task',
        'category' => [
            'label' => 'In category',
        ],
        'title' => [
            'label' => 'I need',
            'placeholder' => 'what you need',
        ],
        'subtitle' => [
            'label' => 'Add some details os taskers can understand your task better',
            'placeholder' => 'Add some details os taskers can understand your task better',
        ],
        'photo' => [
            'label' => 'Choose photo',
            'description' => 'Foto helps tasker better understand<br> your task and requirements.',
        ],
        'event_date' => [
            'label' => 'Choose required date and time',
            'placeholder' => 'YYYY-MM-DD',
        ],
        'event_time' => [
            'label' => 'Choose required date and time',
            'placeholder' => 'HH:MM',
        ],
        'location' => [
            'label' => 'Choose your place',
            'placeholder' => 'your city',
        ],
        'address' => [
            'placeholder' => 'your address',
            'description' => 'Only selected tasker will see your address',
        ],
        'price' => [
            'no' => 'Let taskers bid any price',
            'yes' => 'For this task I am ready to pay ',
        ],
        'contact' => [
            'title' => 'You contacts',
            'name' => 'Your name',
            'email' => 'E-mail address',
            'mobile' => 'Your mobile phone number',
            'mobile_notice' => 'Only selected tasker will see your mobile address',
        ],
        'notify' => [
            'sms' => 'Send me SMS with new bids',
            'email' => 'Send me emails with new bids',
        ],
        'extra_requirements' => [
            'title' => 'Extra requirements',
            'taskers_only' => 'Show my task only for taskers',
            'no_comments' => 'Turn off comments fo this task',
        ]

    ],

];
