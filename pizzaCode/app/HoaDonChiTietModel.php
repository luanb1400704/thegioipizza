<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonChiTietModel extends Model
{
    protected $table = 'hoadonchitiet';
    protected $primaryKey = 'hdct_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'hdct_id', 'hd_id', 'g_id', 'so_luong_mua', 'b_id', 'l_id', 'g_tien', 'thanh_tien'
    ];
}
