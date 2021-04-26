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
        $this->mergeConfigFrom(
            __DIR__.'/../config/tag_model_map.php',
            'tag_model_map'
        );
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
    }
}
