<?php


namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CitasExport implements FromView, ShouldAutoSize, WithHeadings
{ 
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $citas;
    
    public function  __construct($citas)
    {
        $this->citas = $citas;
    }
   
    public function view(): View
    {
        return view('Informes.Table', [
            'citas' => $this->citas
        ]);
    }






    public function headings(): array
    {
        return [
            'Id',
            'Doc',
            'Identificacion',
            'Nombre',
            'Apellido',
            'Fecha-Cita',
            'Hora-Cita',
            'Turno',
            'Fecha-Turno',
            'Tiempo de Atencion',
            'Estado',
            'Tramite',
        ];
    }

   
}
