<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Tramite extends Model
{
    use HasFactory;
    protected $table = 'tramites';

    public function modulo_tramite()
    {
        return $this->hasMany(Modulo_Tramite::class);
    }

    protected function name():Attribute{

        return new Attribute(
    
            get:fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
            
        );
    
    }

    protected $fillable = 
    [
        'name',
    ];
    
}
