<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Turno;
use App\Models\Modulo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 

     */

public function Inicio(){

    return view('SuperAdmin.Inicio');

}

    public function index()
    {


        $atendidos = Cita::where('idestado', 4)->get();

        $cedulasatendidos = Cita::where('idestado', 4)->whereHas('tramite',function($query){
        
            $query->whereRaw('LOWER(name) LIKE ?', ['%digital%']);

        })->get();


        $turnosActuales = Turno::whereHas('cita', function ($query) {
            $query->where('idestado', 3);
        })->with('cita')->get();


        $turnosProximos = Turno::whereHas('cita', function ($query) {
            $query->where('idestado', 2);
        })->with('cita')->get();

       


        $modulos = Modulo::whereHas('turnos', function ($query) {
            $query->whereHas('cita', function ($query) {
                $query->where('idestado', 4);
            });
        })->with(['turnos' => function ($query) {
            $query->whereHas('cita', function ($query) {
                $query->where('idestado', 4);
            });
        }])->get();


        foreach ($modulos as $modulo) {
            $turnos = $modulo->turnos;

            $sumAtencion = 0;
            $countTurnos = count($turnos);
            $modulo->persona = $countTurnos;

            foreach ($turnos as $turno) {
                $sumAtencion += $turno->atencion;
            }

            if ($countTurnos > 0) {
                $promedio = $sumAtencion / $countTurnos;

                // Guardar el promedio en cada turno del módulo


                $segundo = $modulo->promedio = $promedio;

                $horas = floor($segundo  / 3600);
                $minutos = floor(($segundo  % 3600) / 60);
                $segundos = $segundo  % 60;
                $tiempo = sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);

                $modulo->promedio = $tiempo;
            }
        }

        $count = 0;
        $cedulas =0;

        foreach ($atendidos as $atendido) {
            $count++;
        }

        foreach ($cedulasatendidos as $cedula) {
            $cedulas++;
            
        }
        
        $atendido = $count;



        return view('SuperAdmin.superAdminIndex', compact('atendido','turnosActuales','modulos','turnosProximos','cedulas'));
    }
}
