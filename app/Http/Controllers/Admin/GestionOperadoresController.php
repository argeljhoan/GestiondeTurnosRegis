<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Modulo;
use App\Models\Model_has_role;
use Spatie\Permission\Models\Role;

class GestionOperadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $usuarios = User::whereHas('roles', function ($query) {
            $query->where('id', 3);
        })->with('modulos')->get(['id','name', 'email']);
        return view('SuperAdmin.GestionOperadores',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.RegistroOperadores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $moduloId = $request->modulo;
        if ($moduloId == 'Seleccione un modulo') {
            return redirect()->back()->with('error', 'Por favor, seleccione un módulo válido');
        }
        
        // Validar que el email no esté registrado en la base de datos
        $existingUserEmail = User::where('email', $request->email)->first();
        if ($existingUserEmail) {
            return redirect()->back()->with('error', 'El email ya está registrado');
        }
        
        // Validar que la contraseña no esté en uso
        $existingUserPassword = User::where('password', bcrypt($request->password))->first();
        if ($existingUserPassword) {
            return redirect()->back()->with('error', 'La contraseña ya está en uso');
        }
        
        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        // Asignar un módulo al usuario
        $modulo = Modulo::find($moduloId);
        $model= new Model_has_role();
        $nombreRol = 'Operador';
        $roles = Role::where('name', $nombreRol)->get();
        if ($modulo) {
            $modulo->user_id = $user->id;
            $modulo->save();
        
        $user->assignRole('Operador');
            
    }
     return redirect()->route('admin.Gestion');

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
