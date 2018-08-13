<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogHoaHongModel extends Model
{
    protected $table = 'loghoahong';
    protected $primaryKey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_khachhang',
        'so_tien_da_tra',
        'ngay_tra',
        'id_chinhanh',
        'id_nhan_vien_tra',
    ];
}
