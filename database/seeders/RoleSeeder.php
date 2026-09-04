<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        if (!class_exists(Role::class)) {
            // Spatie not installed — skip role seeding.
            return;
        }

        $admin = Role::firstOrCreate(['name' => 'super-admin']);
        $staff = Role::firstOrCreate(['name' => 'it-staff']);
        $student = Role::firstOrCreate(['name' => 'student']);

        Permission::firstOrCreate(['name' => 'manage-tickets']);
        Permission::firstOrCreate(['name' => 'manage-equipments']);
        Permission::firstOrCreate(['name' => 'manage-payments']);
        Permission::firstOrCreate(['name' => 'view-reports']);

        $admin->givePermissionTo(Permission::all());
        $staff->givePermissionTo(['manage-tickets', 'view-reports']);
        $student->givePermissionTo(['manage-tickets', 'manage-payments']);

    }
}
