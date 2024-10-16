<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Define modules from your sidebar
        $modules = [
            'dashboard',
            'categories',
            'cities',
            'users',
            'admins',
            'roles',
            'features',
            'auctions',
            'contact-us',
            'settings',
        ];

        // Create permissions for each module (CRUD operations)
        foreach ($modules as $module) {
            Permission::create(['name' => "$module.view"]);
            Permission::create(['name' => "$module.create"]);
            Permission::create(['name' => "$module.edit"]);
            Permission::create(['name' => "$module.delete"]);
        }

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign all permissions to the 'admin' role
        $adminRole->syncPermissions(Permission::all());

        // Assign basic permissions to the 'user' role
        $userRole->syncPermissions([
            'dashboard.view',
            'categories.view',
            'auctions.view',
        ]);
    }
}
