<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Misc

        // USER MODEL
        $userPermission1 = Permission::create(['name' => 'عرض المزاد']);
        $userPermission2 = Permission::create(['name' => 'انشاء مزاد']);
        $userPermission3 = Permission::create(['name' => 'تعديل مزاد']);
        $userPermission3 = Permission::create(['name' => 'حذف مزاد']);


        // ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'انشاء صلاحية']);
        $rolePermission2 = Permission::create(['name' => 'عرض الصلاحيات']);
        $rolePermission3 = Permission::create(['name' => 'تعديل الصلاحية']);
        $rolePermission4 = Permission::create(['name' => 'حذف الصلاحية']);

        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'عرض البرمشن']);
        $permission2 = Permission::create(['name' => 'انشاء برمشن']);
        $permission3 = Permission::create(['name' => 'تعديل برمشن']);
        $permission4 = Permission::create(['name' => 'حذف برمشن']);



        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'عرض المشرفين']);
        $permission2 = Permission::create(['name' => 'انشاء مشرف']);
        $permission3 = Permission::create(['name' => 'تعديل مشرف']);
        $permission4 = Permission::create(['name' => 'حذف مشرف']);





        // ADMINS
        $countryPermission1 = Permission::create(['name' => 'عرض الدول']);
        $countryPermission2 = Permission::create(['name' => 'تعديل الدولة']);
        $countryPermission2 = Permission::create(['name' => 'انشاء الدولة']);
        $countryPermission2 = Permission::create(['name' => 'حذف الدولة']);
        // CREATE ROLES
        // ADMINS
        $attributesPermission1 = Permission::create(['name' => 'عرض المميزات']);
        $attributesPermission2 = Permission::create(['name' => 'تعديل ميزة']);
        $attributesPermission2 = Permission::create(['name' => 'انشاء ميزة']);
        $attributesPermission2 = Permission::create(['name' => 'حذف ميزة']);
        // CREATE ROLES
        // ADMINS
        $attributevaluesPermission1 = Permission::create(['name' => 'عرض ليست المميزات']);
        $attributevaluesPermission2 = Permission::create(['name' => 'تعديل ليست المميزات']);
        $attributevaluesPermission2 = Permission::create(['name' => 'انشاء ليست المميزات']);
        $attributevaluesPermission2 = Permission::create(['name' => 'حذف ليست المميزات']);
        // CREATE ROLES

        // ADMINS
        $statePermission1 = Permission::create(['name' => 'عرض المحافظة']);
        $statePermission2 = Permission::create(['name' => 'تعديل المحافظة']);
        $statePermission2 = Permission::create(['name' => 'انشاء المحافظة']);
        $statePermission2 = Permission::create(['name' => 'حذف المحافظة']);
        // ADMINS
        $cityPermission1 = Permission::create(['name' => 'عرض المدن']);
        $cityPermission2 = Permission::create(['name' => 'تعديل المدينة']);
        $cityPermission2 = Permission::create(['name' => 'انشاء المدينة']);
        $cityPermission2 = Permission::create(['name' => 'حذف المدينة']);
        // CREATE ROLES

        $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,

            $userPermission1,
            $countryPermission1,
            $countryPermission2,
            $statePermission1,
            $statePermission2,
            $cityPermission1,
            $cityPermission2,
            $attributevaluesPermission2,
            $attributevaluesPermission1,
            $attributesPermission2,
            $attributesPermission1


        ]);
        $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,

            $userPermission1,
        ]);
        $moderatorRole = Role::create(['name' => 'moderator'])->syncPermissions([
            $userPermission2,
            $rolePermission2,
            $permission2,
        ]);

        // CREATE ADMINS & USERS
        User::create([
            'name' => 'super admin',
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($adminRole);

        User::create([
            'name' => 'moderator',
            'email' => 'moderator@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($moderatorRole);


    }
}
