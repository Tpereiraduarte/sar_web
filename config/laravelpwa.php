<?php
return [
    'name' => 'LaravelPWA',
    'manifest' => [
        'name' => env('APP_NAME', 'Sistema de Analise de Riscos'),
        'short_name' => 'SarWeb',
        'start_url' => 'http://127.0.0.1:8000/sar_web/public',
        'background_color' => '#ffffff',
        'theme_color' => '#306666',
        'display' => 'standalone',
        'orientation'=> 'any',
        'icons' => [
            '72x72' => '/imagens/icons/icon-72x72.png',
        ],
        'splash' => [
            '640x1136' => '/imagens/icons/splash-640x1136.png',
        ],
        'custom' => []
    ]
];