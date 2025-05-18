<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'User'
        ];

        foreach ($roles as $role)
        {
            Role::query()->create(['name' => $role]);
        };
    }
}
