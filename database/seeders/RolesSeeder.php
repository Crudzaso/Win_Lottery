<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            //Roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleClient = Role::create(['name' => 'client']);
            //Permisos
        $permissionShow = Permission::create(['name' => 'show.raffles'])->syncRoles([$roleAdmin, $roleClient]);
        $permissionCreate = Permission::create(['name' => 'create.raffles'])->assignRole($roleAdmin);
        $permissionUpdate = Permission::create(['name' => 'update.raffles'])->assignRole($roleAdmin);
        $permissionDelete = Permission::create(['name' => 'delete.raffles'])->assignRole($roleAdmin);

        $permissionShowGambling = Permission::create(['name' => 'show.gamblingRaffles'])->assignRole($roleClient);
        $permissionEnroll = Permission::create(['name' => 'enroll.raffles'])->assignRole($roleClient);
        $permissionPay = Permission::create(['name' => 'pay.raffles'])->assignRole($roleClient);
    }
}
