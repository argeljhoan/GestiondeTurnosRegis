<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo_Tramite extends Model
{
    use HasFactory;
    protected $table = 'modulos_tramites';


    protected $fillable = [
        'id_modulo',
        'id_tramite',
        
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }

    public function tramite()
    {
        return $this->belongsTo(Tramite::class, 'id_tramite');
    }



}
