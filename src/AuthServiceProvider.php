<?php


namespace EscolaLms\Tags;

use EscolaLms\Tags\Models\Tag;
use EscolaLms\Tags\Policies\TagPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Tag::class => TagPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}