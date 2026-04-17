<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Admin;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $collection = collect([
            'Users',
            'Admin',
            'Role',
            'Permission',
            // ... // List all your Models you want to have Permissions for.
        ]);
        
        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Permission::create(['group' => $item, 'name' => 'view' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'edit' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'create' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'delete' . $item, 'guard_name' => 'admins']);
        });

        // Create a Super-Admin Role and assign all Permissions
        $role = Role::create(['name' => 'super-admin', 'guard_name' => 'admins']);
        $role1 = Role::create(['name' => 'Administrator', 'guard_name' => 'admins']);
        $role2 = Role::create(['name' => 'Redaktor', 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::all());

        // Give User Super-Admin Role
        $user = Admin::where('email', 'kamran.badalov@amiroff.az')->first(); // Change this to your email.
        $user->assignRole('super-admin');
    }
}