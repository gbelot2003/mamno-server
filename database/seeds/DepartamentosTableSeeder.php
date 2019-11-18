<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->delete();
        \App\Departamentos::create([
            'departamento' => 'Atlántida'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Colón'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Comayagua'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Copán'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Cortés'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Choluteca'
        ]);
        \App\Departamentos::create([
            'departamento' => 'El Paraíso'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Francisco Morazán'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Gracias a Dios'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Intibucá'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Islas de la Bahía'
        ]);
        \App\Departamentos::create([
            'departamento' => 'La Paz'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Lempira'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Ocotepeque'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Olancho'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Santa Bárbara'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Valle'
        ]);
        \App\Departamentos::create([
            'departamento' => 'Yoro'
        ]);    }
}
