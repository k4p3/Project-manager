<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('estatus')->insert([
            'nombre' => "Registrado",
            'descripcion' => "Proyecto registrado por usuario solicitante",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('estatus')->insert([
            'nombre' => "Iniciado",
            'descripcion' => "Se ha aprobado por un jefe de Area",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('estatus')->insert([
            'nombre' => "Presupuestado",
            'descripcion' => "El Departamento de finanzas ha asignado un presupuesto",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('estatus')->insert([
            'nombre' => "Aprobado",
            'descripcion' => "El proyecto fue aprobado por la dirección",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('estatus')->insert([
            'nombre' => "Rechazado",
            'descripcion' => "El proyecto fue rechazado",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
