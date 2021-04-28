<?php


namespace EscolaLms\Tags\Commands;


use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class TagsSeedCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'tag-permissions:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database with the permissions required to support the tags';

    public function handle() : void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::findOrCreate('delete tags', 'api');
        Permission::findOrCreate('create tags', 'api');
    }
}