<?php

namespace App\Imports;

use App\Models\Cita;
use App\Models\Tramite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use DateTime;
use DateInterval;

class CitasImport implements ToModel, WithHeadingRow
{

   private $tramites;
   public function __construct()
   {
   $this->tramites = Tramite::pluck('id','name');
   } 


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $baseDate = new DateTime('1900-01-01');
        $daysToAdd = $row['fecha'];
        $convertedDate = date('Y-m-d', strtotime($baseDate->format('Y-m-d') . " +{$daysToAdd} days -2 days"));

        $decimalTime = $row['hora'];
        $hours = floor($decimalTime * 24);
        $minutes = round(($decimalTime * 24 - $hours) * 60);
        $time = Carbon::createFromTime($hours, $minutes, 0)->format('H:i:s');



        $tramite = isset($row['tramite']) ? strtolower($row['tramite']) : null;
       
        $idTramite = 0;
        if ($tramite !== null && isset($this->tramites[$tramite])) {
            $idTramite = $this->tramites[$tramite];
           
        }
        else{
            $idTramite = null;
        }
        
        // Imprime el valor para verificar
        //dd($idTramite);
        return new Cita([
            'fechaCita' => $convertedDate,
            'hora' => $time,
            'numerocitas' => $row['n_cita'],
            'nombre' => $row['nombres'],
            'apellido' => $row['apellidos'],
            'documento' => $row['doc'],
            'identificacion' => $row['nuip'],
            'idTramite' => $idTramite,
            'idestado' => 1,
        ]);
    }
}
