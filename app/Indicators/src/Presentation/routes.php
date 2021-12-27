<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'App\Indicators\Presentation\Api\v1',
        'prefix' => 'api/v1/indicators',
        'middleware' => 'json',
    ],
    static function (): void {
        Route::post('/', 'Generate\Controller@exec');
        Route::get('/{id:string}', 'Get\Controller@exec');
    }
);
