<?php

namespace App\Http\Controllers\Informe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\CitasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Cita;
use App\Models\Tramite;
use App\Models\Estado;
use App\Models\Modulo;
use App\Models\Turno;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Session;
class InformeController extends Controller
{
   
    public function index($num)
    {



       
$fechaActual = Carbon::now()->format('Y-m-d');
        $citas = Cita::whereDate('fechaCita', $fechaActual)
        ->with('tramite', 'turnos', 'estado')
        ->paginate(10);


        if($num == '2'){

            $resultados =Estado::all();

        }elseif($num =='3'){

            $resultados =Tramite::all();

        }elseif($num =='4'){
            $resultados =Modulo::all();

        }else{
            return view('Informes.Reportes',compact('citas','num'));

        }

    return view('Informes.Reportes',compact('citas','resultados','num'));
    }

 
    public function export(Request $request)
    {
        $data = json_decode($request->input('citas'));
        $citas = [];
        
        foreach ($data->data as $citaData) {
        
        
            $cita = Cita::with('tramite', 'estado','turnos')->find($citaData->id);
            if ($cita) {

                if (!empty($cita->turnos)) {
                   
                  foreach($cita->turnos as $atencion){

                    
                    $segundos =$atencion->atencion;

                    $horas = floor($segundos / 3600);
                    $minutos = floor(($segundos % 3600) / 60);
                    $segundos = $segundos % 60;
        
                    $tiempo = sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);
                   /// echo "-", $tiempo;
                
                $atencion->time = $tiempo;
                //echo '//',$variable;
                // $atencion->save();
              
                }
               
               
            }

                $citas[] = $cita;
                
            }
        }
       

        // Aquí tendrás acceso a todas las citas con los métodos tramite y estado
    
    return Excel::download(new CitasExport($citas), 'ReportesCitas.xlsx');

    }

    

    public function buscarRango(Request $request)
    {
        // 

        $fechaInicio = $request->input('fechaInicio');
        $fechaFinal = $request->input('fechaFinal');
    
        // Convertir las fechas a objetos de la clase DateTime
        $fechaInicio = new DateTime($fechaInicio);
        $fechaFinal = new DateTime($fechaFinal);
    
        // Comparar las fechas
        if ($fechaInicio > $fechaFinal) {
            
            $Inicio = $fechaFinal;
            $Final = $fechaInicio;
            
        } elseif ($fechaInicio < $fechaFinal) {
           
            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        } else {

            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        
        }
        $num ='1';

        $citas = Cita::whereBetween('fechaCita', [$Inicio, $Final])->paginate(10);
        Session::flash('success', 'Busqueda Exitosa');
        return view('Informes.Reportes', compact('citas','num'));
      //  return Excel::download(new CitasExport(), 'ReportesCitas.xlsx');
    }


    public function  buscarestado(Request $request){


        
        $fechaInicio = $request->input('fechaInicio');
        $fechaFinal = $request->input('fechaFinal');
    
        // Convertir las fechas a objetos de la clase DateTime
        $fechaInicio = new DateTime($fechaInicio);
        $fechaFinal = new DateTime($fechaFinal);
    
        // Comparar las fechas
        if ($fechaInicio > $fechaFinal) {
            
            $Inicio = $fechaFinal;
            $Final = $fechaInicio;
            
        } elseif ($fechaInicio < $fechaFinal) {
           
            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        } else {

            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        
        }



        $citas = Cita::where('idestado',$request->estado)
        ->whereBetween('fechaCita', [$Inicio, $Final])->paginate(10);

        $num ='2';

        $resultados =Estado::all();

        Session::flash('success', 'Busqueda Exitosa');
        return view('Informes.Reportes', compact('citas','num','resultados'));

    }


    public function  buscartramite(Request $request){


        $fechaInicio = $request->input('fechaInicio');
        $fechaFinal = $request->input('fechaFinal');
    
        // Convertir las fechas a objetos de la clase DateTime
        $fechaInicio = new DateTime($fechaInicio);
        $fechaFinal = new DateTime($fechaFinal);
    
        // Comparar las fechas
        if ($fechaInicio > $fechaFinal) {
            
            $Inicio = $fechaFinal;
            $Final = $fechaInicio;
            
        } elseif ($fechaInicio < $fechaFinal) {
           
            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        } else {

            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        
        }


        $citas = Cita::where('idTramite',$request->tramite)
        ->whereBetween('fechaCita', [$Inicio, $Final])->paginate(10);

        $num ='3';

        $resultados =Tramite::all();

        Session::flash('success', 'Busqueda Exitosa');
        return view('Informes.Reportes', compact('citas','num','resultados'));


        
    }

    public function  buscarmodulo(Request $request){

        $fechaInicio = $request->input('fechaInicio');
        $fechaFinal = $request->input('fechaFinal');
    
        // Convertir las fechas a objetos de la clase DateTime
        $fechaInicio = new DateTime($fechaInicio);
        $fechaFinal = new DateTime($fechaFinal);
    
        // Comparar las fechas
        if ($fechaInicio > $fechaFinal) {
            
            $Inicio = $fechaFinal;
            $Final = $fechaInicio;
            
        } elseif ($fechaInicio < $fechaFinal) {
           
            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        } else {

            $Inicio = $fechaInicio;
            $Final = $fechaFinal;
        
        }



        $citas = Cita::whereHas('turnos', function ($query) use ($request) {
            $query->where('idmodulo', $request->modulo);
        })
        ->whereBetween('fechaCita', [$Inicio, $Final])
        ->paginate(10);

        $num ='4';

        $resultados =Modulo::all();

        Session::flash('success', 'Busqueda Exitosa');
        return view('Informes.Reportes', compact('citas','num','resultados'));

    }


}
