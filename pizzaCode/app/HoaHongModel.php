<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaHongModel extends Model
{
    protected $table = 'hoahong';
    protected $primaryKey = 'hh_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'hh_id',
        'id_khachhang',
        'id_cha',
        'tien_hoa_hong',
        'status',
        'danh_dau',
    ];
}
