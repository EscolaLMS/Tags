<?php

namespace EscolaLms\Tags\Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class TagsPermissionSeeder extends Seeder
{
    public function run()
    {
        // create permissions
        $admin = Role::findOrCreate('admin', 'api');
        $tutor = Role::findOrCreate('tutor', 'api');

        Permission::findOrCreate('update tags', 'api');
        Permission::findOrCreate('delete tags', 'api');
        Permission::findOrCreate('create tags', 'api');

        $admin->givePermissionTo(['update tags', 'delete tags', 'create tags']);
        $tutor->givePermissionTo(['update tags', 'delete tags', 'create tags']);
    }
}
