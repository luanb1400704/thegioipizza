<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanCapModel extends Model
{
    protected $table = 'phancap';
    protected $primaryKey = 'pc_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'pc_id',
        'pc_ten',
        'pc_socap',
        'pc_tile',
        'status'
    ];
}
