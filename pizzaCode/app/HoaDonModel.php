<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonModel extends Model
{
    protected $table = 'hoadon';
    protected $primaryKey = 'hd_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'hd_id',
        'id_nhan_vien_lap_hh',
        'id_khachhang',
        'tong_tien_hoa_don',
        'status',
        'id_phan_cap',
    ];
}
