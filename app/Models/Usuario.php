<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; 

    protected $fillable = [
        'id',
        'name',
        'email',
        'pagamento',
    ];
    function getAuthIdentifierName()
    {
        return 'id';
    }
    function getAuthIdentifier()
    {
        return $this->id;
    }
    function getAuthPassword()
    {
        return $this->password;
    }
    function getRememberToken()
    {
        
    }
    function setRememberToken($value)
    {

    }
    function getRememberTokenName()
    {

    }
}
