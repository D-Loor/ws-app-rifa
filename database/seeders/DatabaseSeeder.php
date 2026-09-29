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
                'rol' => 'Super Administrador',
                'estado' => '1',
                'descripcion' => 'Super administrador del sistema.',
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
                'usuario' => 'SuperAdmin',
                'correo' => 'admin@rifas.local',
                'password' => Hash::make('SuperAdmin365!'),
                'estado' => '1'
            ]
        ]);

    }
}
