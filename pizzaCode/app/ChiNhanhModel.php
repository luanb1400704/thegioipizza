<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiNhanhModel extends Model
{
    protected $table = 'chinhanh';
    protected $primaryKey = 'id_chinhanh';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id_chinhanh',
        'ten_chinhanh',
        'diachi_chinhanh',
        'created_by',
    ];
}
