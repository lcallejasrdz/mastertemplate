<?php

$singular_eng_ucfirst = "User";
$singular_eng_lcfirst = "user";
$plural_eng_ucfirst = "Users";
$plural_eng_lcfirst = "users";

$singular_esp_ucfirst = "Usuario";
$singular_esp_lcfirst = "usuario";
$plural_esp_ucfirst = "Usuarios";
$plural_esp_lcfirst = "usuarios";

return [
    // Controller
    'controller'            => [
        'model'                 => $singular_eng_ucfirst,
        'select'                => [
            'id',
            'first_name',
            'last_name',
            'email',
            'created_at',
        ],
        'word'                  => $plural_esp_ucfirst,
    ],
    // Sidebar
    'sidebar'               => [
        'route_title_singular'  => $singular_esp_ucfirst,
        'route_title_plural'    => $plural_esp_ucfirst,
        'route_font_awesome'    => 'users',
    ],
];
