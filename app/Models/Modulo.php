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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


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


}
