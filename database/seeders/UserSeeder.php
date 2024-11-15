<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            //Para crear un usuario con sus credenciales
        $user = new User();
            $user->name = 'Santiago';
            $user->email = 'santiago-mh04@correo.com';
            $user->password = 'WinLotteryRiwi2023';
        $user->syncRoles('admin', 'client');
        $user->save();
            //Para crear un usuario con sus credenciales
        $user = new User();
            $user->name = 'Fabián';
            $user->email = 'fabiou-r@correo.com';
            $user->password = 'WinLotteryRiwi2023';
        $user->syncRoles('admin', 'client');
        $user->save();
            //Para crear un usuario con sus credenciales
        $user = new User();
            $user->name = 'Verónica';
            $user->email = 'veroini@correo.com';
            $user->password = 'WinLotteryRiwi2023';
        $user->syncRoles('admin', 'client');
        $user->save();
    }
}
