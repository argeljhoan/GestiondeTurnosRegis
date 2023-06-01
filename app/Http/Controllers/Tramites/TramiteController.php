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
        $tramites = Tramite::paginate();

        return view('Tramites.Gestion', compact('tramites'));
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

        
        $tramite = Tramite::create([
            'name' => $request->name,
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
        $tramite->delete();
         return redirect()->route('Tramites.Gestion');
    }
}
