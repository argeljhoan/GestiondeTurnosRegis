<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modulo;
class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Modulo 1',
            'Modulo 2',
            'Modulo 3',
            'Modulo 4',
            'Modulo 5',
            'Modulo 6',
            'Modulo 7',
            'Modulo 8',
            'Modulo 9',
            'Modulo 10',
            'Modulo 11',
            'Modulo 12',
            'Modulo 13',
            'Modulo 14',
            'Modulo 15',
            'Modulo 16',
             
    // Agrega más nombres de trámites según sea necesario
];


foreach ($names as $name) {
    Modulo::create([
        'nameModulo' => $name
    ]);
}
    }
}
