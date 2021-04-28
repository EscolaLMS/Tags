<?php

namespace EscolaLms\Tags;

use EscolaLms\Core\Providers\Injectable;
use EscolaLms\Tags\Repository\Contracts\TagRepositoryContract;
use EscolaLms\Tags\Repository\TagRepository;
use EscolaLms\Tags\Services\Contracts\TagServiceContract;
use EscolaLms\Tags\Services\TagService;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Middlewares\RoleMiddleware;

class EscolaLmsTagsServiceProvider extends ServiceProvider
{
    use Injectable;

    private const CONTRACTS = [
        TagRepositoryContract::class => TagRepository::class,
        TagServiceContract::class => TagService::class
    ];

    public function register()
    {
        $this->injectContract(self::CONTRACTS);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadConfig();
        $this->loadMigrations();
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
    }

    private function loadConfig(): void
    {
        $this->publishes([
            __DIR__ . '/tag_model_map.php' => config_path('escolalms/tag_model_map.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__.'/tag_model_map.php',
            'tag_model_map'
        );
    }

    private function loadMigrations(): void
    {
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'escolalms');

        if (!config('escolalms.tags.ignore_migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }
}
