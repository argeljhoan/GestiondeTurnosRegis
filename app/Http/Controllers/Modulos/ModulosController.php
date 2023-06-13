<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModulo;
use App\Http\Requests\UpdateModulo;
use Illuminate\Http\Request;
use App\Models\Modulo;
use App\Models\User;
use App\Models\Tramite;
use App\Models\Modulo_Tramite;
use Illuminate\Support\Facades\Session;

class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $moduloTramites = Modulo_Tramite::with('modulo', 'tramite')->get();

        $modulosData = [];

        foreach ($moduloTramites as $moduloTramite) {
            $moduloId = $moduloTramite->modulo->id;
            $user_id = $moduloTramite->modulo->user_id;
            $operador = User::find($user_id);
            
            // Verificar si el operador existe
            if ($operador) {
                // El operador existe, asignar el nombre
                $operadorName = $operador->name;
            } else {
                // El operador no existe, asignar un valor por defecto
                $operadorName = 'Sin operador';
            }
            // Verificar si el módulo ya existe en $modulosData
            if (isset($modulosData[$moduloId])) {
                // El módulo ya existe, agregar el trámite a la lista de trámites del módulo
                $modulosData[$moduloId]['tramites'][] = $moduloTramite->tramite->name;
            } else {
                // El módulo no existe, crear una nueva entrada en $modulosData
                $modulosData[$moduloId] = [
                    'id' => $moduloTramite->modulo->id,
                    'modulo' => $moduloTramite->modulo->nameModulo,
                    'tramites' => [$moduloTramite->tramite->name],
                    'User' => $operadorName,
                ];
            }
        }

        //return $modulosData;
         return view('Modulos.Gestion', compact('modulosData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tramites = Tramite::all();
        return view('Modulos.Registro', compact('tramites'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModulo $request)
    {

        $nombreSinEspacios = trim($request->name);
        $tramites = $request->tramites;
        $modulo = Modulo::create([
            'nameModulo' => $nombreSinEspacios,

        ]);

        if ($modulo) {
            $ultimoModulo = Modulo::latest()->first();

            //  $modulotramite = new Modulo_Tramite();
            foreach ($tramites as $tramite) {

                $modulotramite = Modulo_Tramite::create([
                    'id_modulo' => $ultimoModulo->id,
                    'id_tramite' => $tramite,
                ]);
            }
            Session::flash('success', 'Registro exitoso');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $moduloData)
    {
        $modulosData = [];
        $tramitestodos = Tramite::all();
        $moduloTramites = Modulo_Tramite::with('modulo', 'tramite')
            ->where('id_modulo', $moduloData->id)
            ->get();

        foreach ($moduloTramites as $moduloTramite) {
            $moduloId = $moduloTramite->modulo->id;

            if (isset($modulosData[$moduloId])) {
                $modulosData[$moduloId]['tramites'][] = $moduloTramite->tramite->name;
            } else {
                $modulosData[$moduloId] = [
                    'id' => $moduloTramite->modulo->id,
                    'modulo' => $moduloTramite->modulo->nameModulo,
                    'tramites' => [$moduloTramite->tramite->name],
                    // Agregar clave "tramitestodos" con el valor de $tramites
                ];
            }
        }


        return view('Modulos.Editar', compact('modulosData', 'tramitestodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModulo $request, Modulo $modulo)
    {
        $moduloTramites = Modulo_Tramite::where('id_modulo', $modulo->id)->get();
        $tramitesRequest = $request->tramites;

        $length = $moduloTramites->count();
        $lengthRequest = count($tramitesRequest);

        if ($lengthRequest > $length) {
            foreach ($tramitesRequest as $index => $requestTramite) {
                if ($index < $length) {
                    $moduloTramites[$index]->id_tramite = $requestTramite;
                    $moduloTramites[$index]->save();
                } else {
                    Modulo_Tramite::create([
                        'id_modulo' => $modulo->id,
                        'id_tramite' => $requestTramite,
                    ]);
                }
            }
        } else {
            foreach ($moduloTramites as $index => $tramiteModulo) {
                if ($index < $lengthRequest) {
                    $tramiteModulo->id_tramite = $tramitesRequest[$index];
                    $tramiteModulo->save();
                } else {
                    $tramiteModulo->delete();
                }
            }
        }

        Session::flash('success', 'Actualizado correctamente');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function eliminando(Modulo $modulo)
    {

        $operador = User::find($modulo->user_id);

        if ($operador != null) {

            $modulo->name = $operador->name;

            // El operador fue encontrado, realiza las acciones necesarias aquí
        } else {
            $modulo->name = 'Sin Operador';
        }
        return view('Modulos.Eliminar', compact('modulo'));
    }
    public function destroy(Modulo $modulo)
    {
        $operador = User::find($modulo->user_id);

        if ($operador != null) {
           
            $operador->delete();
            $modulo->delete();

            // El operador fue encontrado, realiza las acciones necesarias aquí
        } else {
            
            $modulo->delete();
        }

        return redirect()->route('Modulos.Gestion');
        
    }
}
