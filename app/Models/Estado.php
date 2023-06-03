<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados';


    public function citas()
{
    return $this->hasMany(Cita::class, 'idestado');
}

protected function name():Attribute{

    return new Attribute(

        get:fn($value) => ucwords($value),
        set: fn($value) => strtolower($value)
        
    );

}

}