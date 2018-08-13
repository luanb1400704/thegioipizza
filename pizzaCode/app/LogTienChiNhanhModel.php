<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogTienChiNhanhModel extends Model
{
    protected $table = 'logtienchinhanh';
    protected $primaryKey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_chinhanh',
        'sotien',
        'ngay_tra',
    ];
}
