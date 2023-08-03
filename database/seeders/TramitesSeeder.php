<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tramite;
use App\Models\Estado;
class TramitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'T.I. - Primera Vez',
            'C.C. - Rectificación',
            'C.C. - Duplicado',
            'T.I. - Renovación',
            'C.C. - Digital'
        ];
    
        $estado = Estado::find(6);
    
        foreach ($names as $name) {
            Tramite::create([
                'name' => $name,
                'tramiteestado' => $estado->id,
            ]);
        }
    }
}
