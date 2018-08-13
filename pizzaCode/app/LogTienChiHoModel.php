<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogTienChiHoModel extends Model
{
    protected $table = 'log_tien_chi_ho';
    protected $primaryKey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_chinhanh',
        'sotien',
        'ngay_tra',
    ];
}
