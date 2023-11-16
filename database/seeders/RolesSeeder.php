<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $adminRole->givePermissionTo(['create-items', 'view-items', 'edit-items', 'delete-items', 'create-users', 'view-users', 'edit-users', 'delete-users']);

        $userRole->givePermissionTo(['create-items', 'view-items', 'edit-items', 'create-users', 'view-users', 'edit-users']);
    }
}
