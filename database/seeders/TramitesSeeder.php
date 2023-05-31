<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tramite;
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
            'Registro de nacimiento',
           ' Registro de matrimonio',
            'Registro de defunción',
            'Expedición de copias de registro civil',
            'Suscripción del registro',
           ' Cancelación del registro',
            'Reconstrucción del registro',
           ' Novedades del registro',
            'Resoluciones del Registro Civil',
            'Tarjeta de identidad Primera vez',
            'Tarjeta de identidad Duplicado',
           ' Tarjeta de identidad Rectificación',
            'Tarjeta de identidad Renovación',
            'Cédula de seguridad física personalizada en policarbonato',
            'Cédula de ciudadanía digital',
           ' Cedula de ciudadanía digital primera vez',
            'Cedula de ciudadanía digital duplicado',
            'Cédula amarilla con hologramas Primera vez',
            'Cédula amarilla con hologramas Duplicado',
            'Cédula amarilla con hologramas Rectificación',
            'Cédula amarilla con hologramas Renovación',
            'Asignación de un nuevo número de cédula por cambio de sexo',
            'Certificados excepcionales y de nacionalidad',
            'Mecanismos de participación',
            'Inscripción de la cédula de ciudadanía',
            'Inscripción de candidatos',
            'Acreditación de testigos electorales'   
    // Agrega más nombres de trámites según sea necesario
];


foreach ($names as $name) {
    Tramite::create([
        'name' => $name
    ]);
}


    }
}
