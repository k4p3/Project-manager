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
            'descripcion' => "Solo se guardaron los datos generales",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('estatus')->insert([
            'nombre' => "Iniciado",
            'descripcion' => "Se agrego la documentación mínima",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('estatus')->insert([
            'nombre' => "Verificado",
            'descripcion' => "Se asigno aprobo un presupuesto",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('estatus')->insert([
            'nombre' => "Aprobado",
            'descripcion' => "El proyecto fue aprobado",
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
