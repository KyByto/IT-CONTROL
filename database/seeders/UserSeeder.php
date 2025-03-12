<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::firstOrCreate(
            ['email' => 'admin@itcontrol.com'], // Condition de recherche
            [

                'name' => 'Admin',
                'password' => bcrypt('itcontrol'),
            ]
        );


        User::factory(50)->create();
    }
}
