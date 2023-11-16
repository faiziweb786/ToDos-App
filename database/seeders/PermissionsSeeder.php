<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Permission = Permission::create(['name' => 'create-items']);
        $Permission = Permission::create(['name' => 'view-items']);
        $Permission = Permission::create(['name' => 'edit-items']);
        $Permission = Permission::create(['name' => 'delete-items']);

        $Permission = Permission::create(['name' => 'create-users']);
        $Permission = Permission::create(['name' => 'view-users']);
        $permission = Permission::create(['name' => 'edit-users']);
        $Permission = Permission::create(['name' => 'delete-users']);

    }
}
