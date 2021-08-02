<?php

namespace EscolaLms\Tags;

use EscolaLms\Core\Providers\Injectable;
use EscolaLms\Tags\Repository\Contracts\TagRepositoryContract;
use EscolaLms\Tags\Repository\TagRepository;
use EscolaLms\Tags\Services\Contracts\TagServiceContract;
use EscolaLms\Tags\Services\TagService;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Middlewares\RoleMiddleware;

/**
 * SWAGGER_VERSION
 */
class EscolaLmsTagsServiceProvider extends ServiceProvider
{
    use Injectable;

    public $singletons = [
        TagRepositoryContract::class => TagRepository::class,
        TagServiceContract::class => TagService::class
    ];

    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrations();
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
    }


    private function loadMigrations(): void
    {
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'escolalms');


        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
