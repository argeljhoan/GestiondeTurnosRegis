<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     
    public function run()
    {

        $names=[
        'Sin Turno',
        'Con Turno',
        'Atendiendo',
        'Atendido',
        'No Gestiono',
        'Activo',
        'Inactivo'

        ];
        foreach ($names as $name) {
            Estado::create([
                'name' => $name
            ]);
        }
    }
}

