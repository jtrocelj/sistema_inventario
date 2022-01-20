<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // User
        $empleado_permissions = $admin_permissions->filter(function($permission) {
            return substr($permission->name, 0, 3) != 'Rol' &&
                substr($permission->name, 0, 8) != 'Permisos' &&
                substr($permission->name, 0, 8) != 'Usuarios';
        });
        Role::findOrFail(2)->permissions()->sync($empleado_permissions);
    }
}
