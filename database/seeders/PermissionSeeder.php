<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Permission::count() == 0) {
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            foreach (config('permission.seeder.list') as $permission) {
                Permission::create([
                    'name' => $permission
                ]);
            };
        }
    }
}
