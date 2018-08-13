<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TienChiNhanhModel extends Model
{
    protected $table = 'tienchinhanh';
    protected $primaryKey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_chinhanh',
        'id_loaibanh',
        'id_banh',
        'id_gia',
        'sl_mua',
        'status',
        'sotien'
    ];
}
