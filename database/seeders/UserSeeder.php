<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    
    public function run()
    {
        $user=User::create([
            'name'=>'MC Consult Corp',
            'email'=>'MCConsultCorp@hotmail.com',
            'username'=>'admin',
            'password'=>bcrypt('963258741'),
        ]);
        $user->assignRole('ADMINISTRADOR');
    }
}
