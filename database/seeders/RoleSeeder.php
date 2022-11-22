<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() == 0){
            foreach (config('role.seeder.list') as $role) {
                $permission = [];
                if(config()->has('permission.seeder.role'.$role)) {
                    $permission = config('permisison.seeder.role'.$role);
                }else{
                    $permission = config('permisison.seeder.role.user');
                }

                Role::create([
                    'name'=> $role
                ])->syncPermissions($permission);
            }
        }
    }
}
