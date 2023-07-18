<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Rosi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Reza',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $role = Role::create(['name' => 'User']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
        $user->assignRole('user');
    }
}
