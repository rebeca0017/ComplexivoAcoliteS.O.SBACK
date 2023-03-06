<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\TipoIdentificacion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Roles y Permisos
        $this->call(RoleSeeder::class);
        //usuario
        $this->call(UserSeeder::class);
        //Usuarios para empezar 
        User::factory(10)->create()->each(function($user){
            $user->assignRole('mecanico');
        });
    

        TipoIdentificacion::factory()->create(['nombre'=>'cedula']);
        TipoIdentificacion::factory()->create(['nombre'=>'pasaporte']);
        TipoIdentificacion::factory()->create(['nombre'=>'ruc']);
        

        Cliente::factory(5)->create();
    }
}