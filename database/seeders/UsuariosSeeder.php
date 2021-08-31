<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$usuario = new User();

        $usuario->name = "Jonathan Bailon";
        $usuario->email = "jona@tecnobase.mx";
        $usuario->password = bcrypt("00000000");

        $usuario->save();

        $usuario2 = new User();

        $usuario2->name = "Alfonso Tamayo Melgarejo";
        $usuario2->email = "alfonso@udlondres.com";
        $usuario2->password = bcrypt("123456");

        $usuario2->save();*/
        User::create([
            'name'      => 'Jonathan Bailon Segura',
            'email'     => 'jona@tecnobase.mx',
            'password'  => bcrypt('00000000'),
            'areas_id'   => 1
        ])->assignRole('Admin');

        User::create([
            'name'      => 'Alfonso Tamayo Melgarejo',
            'email'     => 'alfonso@udlondres.com',
            'password'  => bcrypt('123456'),
            'areas_id'   => 1
        ])->assignRole("Admin");

        User::create([
            'name'      => 'Usuario proyecto',
            'email'     => 'usuario@prueba.com',
            'password'  => bcrypt('123456')
        ])->assignRole("Normal");

        User::create([
            'name'      => 'Usuario Jefe Area',
            'email'     => 'area@prueba.com',
            'password'  => bcrypt('123456')
        ])->assignRole("Jefe Area");

        User::create([
            'name'      => 'Usuario Finanzas',
            'email'     => 'finanzas@prueba.com',
            'password'  => bcrypt('123456')
        ])->assignRole("Finanzas");

        User::create([
            'name'      => 'Usuario de dirección',
            'email'     => 'director@prueba.com',
            'password'  => bcrypt('123456')
        ])->assignRole("Direccion");

    }
}
