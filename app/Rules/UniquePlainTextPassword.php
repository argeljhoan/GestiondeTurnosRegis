<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UniquePlainTextPassword implements Rule
{

    protected $userId;

    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    public function passes($attribute, $value)
    {
        $hashedPassword = Hash::make($value);

        $existingUser = User::where('id', '!=', $this->userId)
            ->where(function ($query) use ($hashedPassword, $value) {
                $query->where('password', $hashedPassword)
                    ->orWhere('password', $value);
            })
            ->exists();

        return !$existingUser;
    }

    public function message()
    {
        return 'La contraseña corresponde a otro usuario.';
    }
        
}