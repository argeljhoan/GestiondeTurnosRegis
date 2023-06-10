<?php

namespace App\Http\Controllers\Turnos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Turno;
use App\Models\Tramite;
use App\Models\Modulo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CitasImport;

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
            ->paginate(10);



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

    public function citastabla($id)
    {


        $fechaActual = Carbon::now()->format('Y-m-d');
        $tramites = Modulo::where('user_id', $id)->with('modulo_tramite')->get();


        foreach ($tramites as $tramite) {

            $idtramites = $tramite->modulo_tramite;

            foreach ($idtramites as $idtramite) {

                $id = $idtramite->id_tramite;

                $citas = Cita::where('idTramite', $id)
                    ->where('fechaCita', $fechaActual)
                    ->with('tramite', 'turnos', 'estado')
                    ->paginate(10);
                return view('Turnos.Operadores', compact('citas'));
            }
        }
    }

    public function atencion($id, $cita)
    {

        $fechaActual = Carbon::now()->format('Y-m-d');
        $tramites = Modulo::where('user_id', $id)->with('modulo_tramite')->get();

        foreach ($tramites as $tramite) {

            $idtramites = $tramite->modulo_tramite;

            foreach ($idtramites as $idtramite) {

                $idt = $idtramite->id_tramite;

                $citas = Cita::where('idTramite', $idt)
                    ->where('fechaCita', $fechaActual)
                    ->where('idEstado', 2) // Agregar esta cláusula para filtrar por idEstado igual a 2
                    ->with('tramite', 'turnos', 'estado')
                    ->paginate(10);


                if ($cita == '0') {

                    $citasAtendiendo = Turno::where('idmodulo', $tramite->id)
                        ->whereHas('cita', function ($query) {
                            $query->where('idestado', 3);
                        })->with('cita')
                        ->get();

                    if (!$citasAtendiendo->isEmpty()) {
                        foreach ($citasAtendiendo as $atendiendo) {
                            $info = new Turno();
                            $info->id = $atendiendo->id;
                            $info->nombre = $atendiendo->cita->nombre;
                            $info->apellido = $atendiendo->cita->apellido;
                            $info->identificacion = $atendiendo->cita->identificacion;
                            $info->turno = $atendiendo->name;
                            $tiempos = Turno::where('idcita', $atendiendo->cita->id)->get();

                            foreach ($tiempos  as $tiempo) {

                                $info->tiempo = $tiempo->atencion;
                            }
                        }
                    } else {
                        $info = '';
                    }
                } elseif ($cita == '1') {

                    $info = '';
                } else {
                    $info = $cita;
                }


                return view('Turnos.Atencion', compact('citas', 'id', 'info'));
            }
        }
    }


    public function info(Cita $cita, $id)
    {
        $modulos = Modulo::where('user_id', $id)->get();


        foreach ($modulos as $modulo) {
            $cita->idestado = 3;
            $turnos = $cita->turnos;
            foreach ($turnos as $turno) {
                $turno->idmodulo = $modulo->id;
                $turno->atencion = '00:00:00';
                $turno->save();
                $cita->save();

                $info = new Turno();
                $info->id = $turno->id;
                $info->nombre = $cita->nombre;
                $info->apellido = $cita->apellido;
                $info->identificacion = $cita->identificacion;
                $info->turno = $turno->name;

                return $this->atencion($id, $info);
            }
        }
    }


    public function guardarTiempoTranscurrido(Request $request, Turno $turno)
    {

        $tiempo = Carbon::createFromTimestamp($request->tiempo_transcurrido);
        $tiempoFormateado = $tiempo->format('H:i:s');


        $turno->atencion = $tiempoFormateado;
        $turno->save();


        if ($request->accion == 'no_gestiono') {
            // Acción cuando se presiona el botón "No Gestiono"
            return view('Turnos.NoGestiono', compact('turno'));
        } elseif ($request->accion == 'finalizado') {
            // Acción cuando se presiona el botón "Finalizado"


            return view('Turnos.Finalizar', compact('turno'));
        }
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

        foreach ($citas as $cita) {

            $primerCaracter = $cita->tramite->name[0];
            $turno = Turno::whereRaw("SUBSTRING(name, 1, 1) = ?", $primerCaracter)->latest()->first();
            if ($turno) {
                $count = substr($turno->name, 1, 2);
                $codigo = $turno->name[0] . ($count + 1);
            } else {

                $codigo = $primerCaracter . '1';
            }

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

  
        $fechaActual = Carbon::now()->format('Y-m-d');
        $horaActual = Carbon::now()->subMinutes(6)->format('H:i:s');

        $citas = Cita::where('identificacion', $request->name)
            ->whereDate('fechaCita', $fechaActual)
            ->whereTime('hora', '>', $horaActual)
            ->with('tramite', 'turnos', 'estado')
            ->get();


        if ($citas->isNotEmpty()) {

            foreach ($citas as $cita) {

                if ($cita->estado->id == 1) {
                    $primerCaracter = $cita->tramite->name[0];
                    $turno = Turno::whereRaw("SUBSTRING(name, 1, 1) = ?", $primerCaracter)->latest()->first();

                    if ($turno) {
                        $count = substr($turno->name, 1, 2);
                        $cita->codigo = $turno->name[0] . ($count + 1);
                    } else {

                        $cita->codigo = $primerCaracter . '1';
                    }

                    $cita->impresion = $fechaActual;
                } else {
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

    public function cargar()
    {

        return view('Turnos.Cargar');
    }

    public function excel(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:xls,xlsx'
        ]);

        $archivo = $request->file('archivo');

        Excel::import(new CitasImport, $archivo);

        return redirect()->route('Turnos.Gestion')->with('success', 'Las Citas han sido cargados correctamente.');
    }


    public function visualizar()
    {
   
        $turnos = Turno::whereHas('cita', function ($query) {
                            $query->where('idestado', 3);
                        })->with('cita')
                        ->get();

return view('Turnos.Visualizar', compact('turnos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {

        if ($request->accion == 'no_gestiono') {
            $turno->cita->idestado = 5;
        } elseif ($request->accion == 'finalizado') {
            $turno->cita->idestado = 4;
        }

        $id = $turno->modulo->user_id;

        $turno->save();
        $turno->cita->save();

        $info = '1';
        Session::flash('success', 'Finalizado Correctamente');
        return $this->atencion($id, $info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function digital(){

    $fechaActual = Carbon::now()->format('d-M-y H:i:s');
    $tramites = Tramite::whereRaw('LOWER(name) LIKE ?', ['%digital%'])->get();


///
return view('Turnos.Digital', compact('fechaActual','tramites'));
}

public function digitalstore(Request $turno){

    $fechaActual = Carbon::now()->format('Y-m-d');
    $Hora = Carbon::now()->format('H:i:s');
   
    $citas = Cita::where('identificacion',$turno->name)->get();
    

    if ($citas->isNotEmpty()) {

        return $this->generar($turno);
    }else{

        $turnoasignado = Cita::create([
            'fechaCita' => $fechaActual,
            'hora' =>  $Hora,
            'nombre' =>  $turno->nombre,
            'apellido' => $turno->apellido,
            'documento' =>  $turno->doc,
            'identificacion' =>  $turno->name,
            'idTramite' =>  $turno->tramite,
            'idestado' =>  1,
        ]);
    
        return $this->generar($turno);

    }


   
  
}

}
