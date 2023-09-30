<?php

return [


    'defaults' => [
        'guard' => 'student',
        'passwords' => 'students',
    ],



    'guards' => [
        'student' => [
            'driver' => 'session',
            'provider' => 'students',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins', 
        ],
    ],


    'providers' => [
        'students' => [
            'driver' => 'eloquent',
            'model' => App\Models\Student::class,
        ],


        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, 
        ],

    ],


    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'admin_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    
        'students' => [
            'provider' => 'students',
            'table' => 'student_password_reset_tokens', 
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
