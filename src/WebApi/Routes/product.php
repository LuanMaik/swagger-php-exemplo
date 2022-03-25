<?php

return [
    [
        'method' => 'GET',
        'path' => '/products',
        'handler' => [\App\WebApi\Controllers\ProductController::class, 'list']
    ],
    [
        'method' => 'GET',
        'path' => '/product/{id}',
        'handler' => [\App\WebApi\Controllers\ProductController::class, 'findById']
    ]
];