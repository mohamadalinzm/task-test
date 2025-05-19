<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = Role::query()->get();
        $permissions = Permission::query()->pluck('name');

        $permissionMapping = [
            'User' => ['.show','.store','.create','.index'],
            'Admin' => ['']
        ];

        $roles->each(function ($role) use ($permissions, $permissionMapping) {
            if (!isset($permissionMapping[$role->name])) {
                return;
            }

            $rolePermissions = $permissions->filter(function ($permission) use ($permissionMapping, $role) {
                return collect($permissionMapping[$role->name])->some(
                    fn ($prefix) => str_ends_with($permission, $prefix)
                );
            });

            $permissions = Permission::query()->whereIn('name', $rolePermissions)->get();

            $role->syncPermissions($permissions);
        });
    }
}
