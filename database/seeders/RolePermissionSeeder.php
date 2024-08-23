<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage villages',
            'manage categories',
            'manage coordinators',
            'manage members'
        ];

        foreach($permissions as $perm){
            Permission::firstOrCreate([
                'name' => $perm
            ]);
        }

        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('20041992'),

            'name' => 'Ajier',
            'email' => 'ajier@email.com',
            'password' => bcrypt('20041992'),
        ]);

        $user->assignRole($adminRole);
    }
}
