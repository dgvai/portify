<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Portify',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>PORTIFY</b>',
    'logo_img' => 'storage/app/icons/portify.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Portify',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => true,

    'dashboard_url' => 'dashboard',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password.request',

    'password_email_url' => 'password.email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'Portfolio',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-user',
            'submenu' => [
                [
                    'text' => 'Basic Data',
                    'icon' => 'fas fa-fw fa-file-word',
                    'route' => 'portfolio.basic'
                ],
                [
                    'text' => 'Services',
                    'icon' => 'fas fa-fw fa-star',
                    'route' => 'portfolio.services'
                ],
                [
                    'text' => 'Skills',
                    'icon' => 'fas fa-fw fa-percentage',
                    'route' => 'portfolio.skills'
                ],
                [
                    'text' => 'Projects',
                    'icon' => 'fas fa-fw fa-paper-plane',
                    'route' => 'portfolio.projects'
                ],
                [
                    'text' => 'Resume',
                    'icon' => 'fas fa-fw fa-file-pdf',
                    'route' => 'portfolio.resume'
                ],
            ]
        ],
        [
            'text' => 'Inbox',
            'icon' => 'fas fa-fw fa-inbox',
            'route' => 'inbox'
        ],
        [
            'text' => 'Settings',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-cogs',
            'submenu' => [
                [
                    'text' => 'Site Settings',
                    'icon' => 'fas fa-fw fa-hammer',
                    'route' => 'settings.site'
                ],
                [
                    'text' => 'Content Settings',
                    'icon' => 'fas fa-fw fa-wrench',
                    'route' => 'settings.content'
                ],
                [
                    'text' => 'App Settings',
                    'icon' => 'fas fa-fw fa-tools',
                    'route' => 'settings.app'
                ],
                [
                    'text' => 'User Settings',
                    'icon' => 'fas fa-fw fa-user-cog',
                    'route' => 'settings.user'
                ],
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@9',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-flat-top.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        [
            'name' => 'Lazy',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js',
                ],
            ],
        ],
        [
            'name' => 'AdminLTE-Components-DG',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/select2/css/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/select2/css/select2-bootstrap4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/select2/js/select2.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/bs-custom-file-input/bs-custom-file-input.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/moment/moment.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/summernote/summernote-bs4.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/summernote/summernote-bs4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/bs-select/css/bootstrap-select.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/bs-select/js/bootstrap-select.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/bootstrap-tags-input/bootstrap-tagsinput.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/bootstrap-tags-input/bootstrap-tagsinput.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/daterangepicker/daterangepicker.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/daterangepicker/daterangepicker.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/plugins/bootstrap-slider/css/bootstrap-slider.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/plugins/bootstrap-slider/js/bootstrap-slider.min.js',
                ],
            ],
        ],
        [
            'name' => 'Main',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/main.js'
                ]
            ]
        ],
    ],
];
