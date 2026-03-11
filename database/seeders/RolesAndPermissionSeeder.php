<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission; 
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // Create permissions
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'edit tasks']); 
        Permission::create(['name' => 'delete tasks']);
        Permission::create(['name' => 'view tasks']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']); 
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view users']);

        // Crate role admin and add permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
        
        // Create role editor and add permissions
        $editor = Role::create(['name' => 'editor']); 
        $editor->givePermissionTo(['create tasks', 'edit tasks', 'delete tasks', 'view tasks']);

        // Create role user and add permissions
        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo(['view tasks']);
    }
}
