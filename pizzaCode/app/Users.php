<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'type',
        'name',
        'email',
        'phone',
        'password',
        'active',
        'remember_token',
    ];
}
