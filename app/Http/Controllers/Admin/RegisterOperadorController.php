<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class RegisterOperadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::whereNull('user_id')->get();
        return view('SuperAdmin.RegistroOperadores',compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
    
        $usuario = Modulo::where('user_id', $user->id)->first();
        $user ->modulo = $usuario->nameModulo;
       
      return view('SuperAdmin.EditarOperadores',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
          // Obtener los correos electrónicos diferentes al correo del usuario actual
    $otherEmails = User::where('id', '!=', $user->id)
    ->pluck('email')
    ->toArray();

// Verificar si el correo del nuevo registro coincide con alguno de los correos obtenidos
if (in_array($request->email, $otherEmails)) {
Session::flash('error', 'El email ya está registrado');
return redirect()->back()->withInput();
}

// Verificar si la contraseña del nuevo registro coincide con alguna de las contraseñas obtenidas
$otherPasswords = User::where('id', '!=', $user->id)
        ->pluck('password')
        ->toArray();

foreach ($otherPasswords as $password) {
if (Hash::check($request->password, $password)) {
Session::flash('error', 'La contraseña corresponde a otro usuario');
return redirect()->back()->withInput();
}
}

// Resto del código...

if ($request->password == $request->password_confirmation) {
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->save(); 
    Session::flash('success', 'Actualizo Correctamente');
    return redirect()->back();
} else {
    Session::flash('error', 'Las contraseñas no coinciden');
    return redirect()->back()->withInput();
}
              
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
