<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            [
                'rol' => 'Administrador',
                'estado' => '1',
                'descripcion' => 'Administrador del sistema.',
            ],
            [
                'rol' => 'Vendedor',
                'estado' => '1',
                'descripcion' => 'Vendedor de Tickets.'
            ]
        ]);
        
        DB::table('usuarios')->insert([
            [
                'rol_id' => 1,
                'usuario' => 'Janeth',
                'correo' => 'janethsolorsano021@gmail.com',
                'password' =>  Hash::make('janeth365.'),
                'estado' => '1'
            ],
            [
                'rol_id' => 2,
                'usuario' => 'Leidy',
                'correo' => 'leidygarcia2205@gmail.com',
                'password' =>  Hash::make('leidygarcia365.'),
                'estado' => '1'
            ],
            [
                'rol_id' => 2,
                'usuario' => 'Francheska',
                'correo' => 'melanibasurto04@gmail.com',
                'password' =>  Hash::make('Melani365.'),
                'estado' => '1'
            ]            
        ]);

    }
}
