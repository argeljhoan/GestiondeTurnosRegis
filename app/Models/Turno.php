<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Turno extends Model
{
    use HasFactory;
    protected $table = 'turnos';

    protected $fillable = [
        'name',
        'idcita',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    protected function name():Attribute{

        return new Attribute(
    
            get:fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
            
        );
    
    }
}
