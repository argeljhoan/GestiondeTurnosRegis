<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie\Permission\Models\Role;
class Model_has_role extends Model
{
    use HasFactory;

    protected $table = 'model_has_roles';


    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
