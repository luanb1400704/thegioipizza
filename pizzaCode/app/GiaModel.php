<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaModel extends Model
{
    protected $table = 'gia';
    protected $primaryKey = 'g_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'g_id',
        'b_id',
        'l_id',
        'g_tien',
    ];
}
