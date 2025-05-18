<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $routeNames = collect(Route::getRoutes())
            ->map(function ($route) {
                return $route->getName();
            })
            ->filter(function ($name) {
                return $name && (str_starts_with($name, 'api.') || str_starts_with($name, 'web.'));
            })
            ->values();

        $routeNames->each(function ($routeName) {
            Permission::firstOrCreate([
                'name' => $routeName,
            ]);
        });
    }
}
