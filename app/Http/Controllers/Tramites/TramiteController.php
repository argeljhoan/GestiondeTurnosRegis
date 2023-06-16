<?php

namespace App\Http\Controllers\Tramites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tramite;
use Illuminate\Support\Facades\Session;
class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramites = Tramite::where('tramiteestado',6)->paginate();

        return view('Tramites.Gestion', compact('tramites'));
    }

    public function inhabilitado(){

        $tramites = Tramite::where('tramiteestado',7)->get();

        $num = 2;
        return view('Modulos.Habilitar', compact('tramites','num'));

      
    }

    public function habilitar(Request $request){

        $tramites = Tramite::where('id',$request->tramite)->first();
        $tramites->tramiteestado=6;
        $tramites->save();
        $num =2;
        Session::flash('success', 'Tramite Habilitado Exitosamente');
        return $this->inhabilitado($num);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tramites.Registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tramites = Tramite::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->name) . '%'])->first();

      
        $tramite = Tramite::create([
            'name' => $request->name,
            'tramiteestado' => 6,
        ]);
        Session::flash('success', 'Registro exitoso');
        return redirect()->back();
    
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
    public function edit(Tramite $tramite)
    {
        return view('Tramites.Editar',compact('tramite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tramite $tramite)


    {
        
        $tramite->update($request->all());

        Session::flash('success', 'Actualizo Correctamente');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function eliminando(Tramite $tramite){

        return view('Tramites.Eliminar',compact('tramite'));
    }

    public function destroy(Tramite $tramite)
    {
        $tramite->tramiteestado=7;
        $tramite->save();

       return redirect()->route('Tramites.Gestion');
    }
}
