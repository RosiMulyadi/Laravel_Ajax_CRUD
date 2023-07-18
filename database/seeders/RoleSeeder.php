<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $role = Role::create([
            'name' => 'User',
            'guard_name' => 'web',
        ]);
    }
}
