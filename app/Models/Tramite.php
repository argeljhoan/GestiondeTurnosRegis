<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;
    protected $table = 'tramites';

    public function modulo_tramite()
    {
        return $this->hasMany(Modulo_Tramite::class);
    }


    
}
