<?php

namespace App\Imports;

use App\Models\Cita;
use App\Models\Tramite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use DateTime;
use Illuminate\Validation\Rule;

class CitasImport implements ToModel, WithHeadingRow
{

    private $tramites;
    private $fecha;

    public function __construct()
    {
        $this->tramites = Tramite::pluck('id', 'name');
    }

    public function model(array $row)
    {
        $this->fecha = $row['fecha'];
        
        $baseDate = new DateTime('1900-01-01');
        $daysToAdd = $row['fecha'];
        $convertedDate = date('Y-m-d', strtotime($baseDate->format('Y-m-d') . " +{$daysToAdd} days -2 days"));

        $numeroDecimal = $row['hora'];
        $hora = Carbon::createFromTime(floor($numeroDecimal * 24), 0, 0)->format('H:i:s');



       
        $tramite = isset($row['tramite']) ? strtolower($row['tramite']) : null;
        $idTramite = $tramite !== null && isset($this->tramites[$tramite]) ? $this->tramites[$tramite] : null;

        $citaExistente = Cita::where('fechaCita', $convertedDate)
            ->where('identificacion', $row['nuip'])
            ->first();

        if ($citaExistente) {
           // La cita ya existe, realizar acciones adicionales o mostrar un mensaje de error...
         //  return redirect()->back()->with('error', 'Ocurrió un error al importar el archivo de citas: Tienes Citas Repetidas el mismo dia ' );
        } else {
            return new Cita([
                'fechaCita' => $convertedDate,
                'hora' => $hora,
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

    public function rules(): array
    {
        return [
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'n_cita' => 'required|integer',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'doc' => 'required|string',
            'nuip' => [
                'required',
                'integer',
                Rule::unique('citas')->where(function ($query) {
                    $baseDate = new DateTime('1900-01-01');
                    $daysToAdd = $this->fecha;
                    $convertedDate = date('Y-m-d', strtotime($baseDate->format('Y-m-d') . " +{$daysToAdd} days -2 days"));
                    $query->where('fechaCita', $convertedDate);
                }),
            ],
            'tramite' => 'nullable|integer',
        ];
    }
}
