<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data role_permission jika perlu
        DB::table('role_has_permissions')->delete();

        // Hubungkan izin-izin ke peran-rolan yang diinginkan
        $role = Role::findByName('Admin');
        $permissions = [
            // Daftar izin-izin lain yang ingin Anda hubungkan ke peran ini
        ];
        $role->syncPermissions($permissions);

        // Tampilkan pesan sukses jika selesai
        $this->command->info('Role-Permission seeder berhasil dijalankan.');
    }
}
