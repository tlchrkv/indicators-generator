<?php

declare(strict_types=1);

namespace App\Indicators;

use App\Indicators\Models\IndicatorReadStorage;
use App\Indicators\Infrastructure\Repositories\IndicatorPDORepository;

final class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Infrastructure/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/Presentation/routes.php');
    }

    public function register(): void
    {
        parent::register();

        $this->mergeConfigFrom(__DIR__ . '/Models/StringGenerator/config.php', 'string_generator');

        $this->app->bind(IndicatorReadStorage::class, IndicatorPDORepository::class);
    }
}
