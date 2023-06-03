<?php

namespace App\Http\Controllers\Turnos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Turno;
use App\Models\Tramite;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $fechaActual = Carbon::now()->format('d-M-y');
        $fechaFormateada = strtolower($fechaActual);

        $citas = Cita::whereRaw("DATE_FORMAT(fechacita, '%d-%b-%y') = ?", [$fechaActual])
            ->with('tramite', 'turnos', 'estado')
            ->paginate(10);;



        return view('Turnos.Gestion', compact('citas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Turnos.Registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cita $cita)
    {
        $fechaActual = Carbon::now()->format('d-M-y H:i:s');
        $citas = Cita::where('identificacion', $cita->identificacion)
        ->with('tramite', 'turnos', 'estado')
        ->get();

        foreach( $citas as $cita){

        $primerCaracter = $cita->tramite->name[0];
        $turno = Turno::whereRaw("SUBSTRING(name, 1, 1) = ?", $primerCaracter)->latest()->first();
        $count = substr($turno->name, 1, 2);
        $codigo = $turno->name[0] . ($count + 1);
        $cita->idestado = 2;
        $cita->save();
        
        $turnoasignado = Turno::create([
            'name' => $codigo,
            'idcita' =>  $cita->id,
        ]);
    }
    
        Session::flash('success', 'Turno Asignado Correctamente');
        return redirect()->route('Turnos.Registrar');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $citas = Cita::where('identificacion', $request->name)
            ->with('tramite', 'turnos', 'estado')
            ->paginate(10);

        foreach ($citas as $cita) {

            if ($cita) {

                Session::flash('success', 'Busqueda Exitosa');
                return view('Turnos.Gestion', compact('citas'));
            }
        }

        Session::flash('error', 'No tiene cita asignada');
        return redirect()->route('Turnos.Gestion');
    }


    public function generar(Request $request)
{
    $fechaActual = Carbon::now()->format('d-M-y H:i:s');

    $citas = Cita::where('identificacion', $request->name)
        ->with('tramite', 'turnos', 'estado')
        ->get();

    if ($citas->isNotEmpty()) {


        foreach ($citas as $cita) {

           if($cita->estado->id == 1 ){
            $primerCaracter = $cita->tramite->name[0];
            $turno = Turno::whereRaw("SUBSTRING(name, 1, 1) = ?", $primerCaracter)->latest()->first();

            if ($turno) {
                $count = substr($turno->name, 1, 2);
                $cita->codigo = $turno->name[0] . ($count + 1);
            } else {
                $cita->codigo = $primerCaracter . '1';
            }

            $cita->impresion = $fechaActual;
           }else{
            Session::flash('success', 'Ya tiene Un Turno Asignado');
            return redirect()->route('Turnos.Registrar');

           }

        }
        Session::flash('success', 'Búsqueda Exitosa');
        return view('Turnos.Generar', compact('citas'));
    } else {
        Session::flash('error', 'No tiene cita asignada');
        return redirect()->route('Turnos.Registrar');
    }
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
