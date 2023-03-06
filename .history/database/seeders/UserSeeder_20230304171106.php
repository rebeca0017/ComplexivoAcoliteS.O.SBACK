<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alejandro',
            'email' => 'prueba@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'nombres'=>'dylan alejandro',
            'apellidos'=>'lucio',
            'remember_token' => Str::random(10),
            ])->assignRole('cliente');

            User::create([
                'name' => 'rebeca',
                'email' => 'rebeca@test.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'nombres'=>'felicita rebeca',
                'apellidos'=>'riofrio calderon',
                'remember_token' => Str::random(10),
                ])->assignRole('mecanico');
            
    }
}