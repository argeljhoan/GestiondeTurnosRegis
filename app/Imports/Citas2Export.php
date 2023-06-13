<?php

namespace App\Imports;

use App\Models\Cita;
use App\Models\Tramite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use DateTime;

class Citas2Export implements ToModel
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
       
        $numeroDecimal = $row['hora'];
        $hora = Carbon::createFromTime(floor($numeroDecimal), ($numeroDecimal % 1) * 60, 0)->format('H:i:s');
      
       // dd($hora);
        $tramite = isset($row['tramite']) ? strtolower($row['tramite']) : null;
       
        $idTramite = 0;
        if ($tramite !== null && isset($this->tramites[$tramite])) {
            $idTramite = $this->tramites[$tramite];
           
        }
        else{
            $idTramite = null;
        }

        $citaExistente = Cita::where('fechaCita', $convertedDate)
        ->where('identificacion', $row['nuip'])
        ->first();

        dd($citaExistente);
        // Imprime el valor para verificar
        //dd($idTramite);
        return new Cita([
            'fechaCita' => $convertedDate,
            'hora' =>  $hora,
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
