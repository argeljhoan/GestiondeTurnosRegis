<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Modulo extends Model
{
    use HasFactory;

    protected $table = 'modulos';
  

    protected $fillable = 
    [
        'nameModulo',
        'user_id',
        'estadomodulo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function modulo_tramite()
    {
        return $this->hasMany(Modulo_Tramite::class,'id_modulo');
    }


    public function turnos()
{
    return $this->hasMany(Turno::class, 'idmodulo');
}

    protected function name():Attribute{

        return new Attribute(
    
            get:fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
            
        );
    
    }


}
