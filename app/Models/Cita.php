<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cita extends Model
{
    use HasFactory;
    protected $table = 'citas';


    protected $fillable = [
        'fechaCita',
        'hora',
        'numerocitas',
        'nombre',
        'apellido',
        'documento',
        'identificacion',
        'idTramite',
        'idestado',
        

    ];




    public function turnos()
{
    return $this->hasMany(Turno::class, 'idcita');
}

public function tramite()
{
    return $this->belongsTo(Tramite::class,'idTramite');
}

public function estado()
{
    return $this->belongsTo(Estado::class,'idestado');
}

protected function nombre():Attribute{

    return new Attribute(

        get:fn($value) => ucwords($value),
        set: fn($value) => strtolower($value)
        
    );

}

protected function apellido():Attribute{

    return new Attribute(

        get:fn($value) => ucwords($value),
        set: fn($value) => strtolower($value)
        
    );

}

}
