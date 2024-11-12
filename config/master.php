<?php
/**
 * Main Master Configuration
 *
 * @package Main Master Configuration
 * @version 1.0.0
 * @license MIT
 */
return [
    'app'=>[
        'profile'=>[
            'name'=>'Text Search',
            'short_name'=>'TS',
            'description'=>'Text Search is a automatic CRUD generator for Laravel 11',
            'keywords'=>'Text Search, Laravel, CRUD',
            'author'=>'Text Search', // Your name or company
            'version'=>'1.0.1', // major.minor.patch
            'laravel'=>'11.0', // Laravel version
        ],
        'root'=>[
            'backend'=>'App/Http/Controllers/Backend', // path to backend controller
            'frontend'=>'App/Http/Controllers/Frontend', // path to frontend controller
            'model'=>'App/Models', // path to model
            'view'=>'views/backend' // path to backend view
        ],
        'url'=>[
            'backend'=>'admin', // url for backend
            'frontend'=>'web', // url for frontend
        ],
        'view'=>[
            'backend'=>'backend', // path to backend view
            'frontend'=>'frontend', // path to frontend view
        ],
        'web'=>[
            'template'=>'eduadmin', // template for frontend view (default: eduadmin)
            'icon'=>'',
            'logo_light'=>'/images/logo-main-master.png',
            'logo_dark'=>'/images/logo-main-master.png',
            'favicon'=>'/images/favicon.ico',
            'background'=>'/images/auth-bg/bg-1.jpg',
            'header_animation'=>'on', // turn on/off header animation
        ],
        'level'=>[
            'read', 'create', 'update', 'delete' // level of access for user role and permission module
        ]
    ],
    'content'=>[
        'announcement'=>[
            'status'=>[
                'very_important'=>'Very important',
                'important'=>'Important',
                'regular'=>'Normal',
            ],
            'color'=>[
                'very_important'=>'danger',
                'important'=>'warning',
                'regular'=>'info',
            ],
        ]
    ]
];
